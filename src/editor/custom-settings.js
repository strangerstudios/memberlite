import { __, sprintf } from '@wordpress/i18n';
import { registerPlugin } from '@wordpress/plugins';
import { PluginDocumentSettingPanel } from '@wordpress/editor';
import { MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import {
	Button,
	ToggleControl,
	SelectControl,
	ExternalLink,
	Notice,
	RadioControl,
	Spinner,
	__experimentalHStack as HStack,
	__experimentalVStack as VStack,
} from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { useEntityProp } from '@wordpress/core-data';

const textDomain = 'memberlite';

/**
 * Layout thumbnail: header, content (with a sidebar for sidebar layouts) and footer bars.
 * Matches the Customizer layout picker in css/customizer.css.
 */
const LayoutThumb = ( { layout, isDefault } ) => {
	const sidebar = layout === 'sidebar-right' || layout === 'sidebar-left';
	const sidePadding = { narrow: 18, 'full-width': 0 }[ layout ] ?? 6;
	const bar = ( style ) => <span style={ { display: 'block', ...style } } />;

	return (
		<span
			aria-hidden="true"
			style={ {
				display: 'flex',
				flexDirection: 'column',
				width: 72,
				height: 52,
				boxSizing: 'border-box',
				border: `1px ${ isDefault ? 'dashed' : 'solid' } #a7aaad`,
				borderRadius: 2,
				overflow: 'hidden',
				background: '#fff',
				opacity: isDefault ? 0.55 : 1,
			} }
		>
			{ bar( { height: 7, background: '#a7aaad' } ) }
			<span style={ { display: 'flex', flex: 1, gap: 4, padding: `5px ${ sidePadding }px`, flexDirection: layout === 'sidebar-left' ? 'row-reverse' : 'row' } }>
				{ bar( { flex: 1, background: '#b9d3ee' } ) }
				{ sidebar && bar( { width: 18, background: '#dcdcde' } ) }
			</span>
			{ bar( { height: 5, background: '#dcdcde' } ) }
		</span>
	);
};

/**
 * Layout panel: the page structure override and, for sidebar layouts, the sidebar widget areas.
 * Shown on posts, pages and CPTs with Customizer layout settings.
 */
const MemberliteLayoutSettings = () => {
	const { postType, template } = useSelect(
		( select ) => ( {
			postType: select( 'core/editor' ).getCurrentPostType(),
			template: select( 'core/editor' ).getEditedPostAttribute( 'template' ),
		} ),
		[]
	);

	// Always call hooks before any conditional return (Rules of Hooks).
	const [ meta, setMeta ] = useEntityProp( 'postType', postType, 'meta' );

	const data = window.memberliteEditorData?.layout;
	if ( ! data || ! meta ) {
		return null;
	}

	// A page template controls the layout, so the picker only shows on the default template.
	// Mirrors memberlite_is_layout_template().
	const hasTemplate  = ! data.isPostsPage && !! template && ( template in data.templateNames || ( postType === 'page' && template in data.legacyTemplates ) );
	const templateName = hasTemplate ? data.templateNames[ template ] || template : '';
	const savedLayout  = meta._memberlite_layout || '';
	const selected     = savedLayout || 'default';
	let resolved       = selected === 'default' ? data.default : selected;
	if ( hasTemplate ) {
		// Mirrors memberlite_get_template_layout().
		resolved = postType === 'page' ? data.legacyTemplates[ template ] || 'sidebar-right' : data.default;
	}
	const hasSidebar   = resolved === 'sidebar-right' || resolved === 'sidebar-left';
	const defaultLabel = data.layoutLabels[ data.default ];

	const customSidebar    = meta._memberlite_custom_sidebar || '';
	const hasCustomSidebar = customSidebar && customSidebar !== 'memberlite_sidebar_blank';

	const options = [ { value: 'default', label: __( 'Default', textDomain ) }, ...data.choices ];

	let help;
	if ( selected === 'default' && data.isFrontPage ) {
		help = __( 'Your homepage uses Contained unless you pick a layout for it.', textDomain );
	} else if ( selected === 'default' ) {
		/* translators: 1: where the default applies, e.g. "Pages". 2: layout name, e.g. "Narrow". */
		help = sprintf( __( 'Uses the Customizer default for %1$s: %2$s.', textDomain ), data.contextLabel, defaultLabel );
	} else {
		/* translators: 1: where the default applies, e.g. "Pages". 2: layout name, e.g. "Narrow". */
		help = sprintf( __( 'Overrides the Customizer default for %1$s (%2$s).', textDomain ), data.contextLabel, defaultLabel );
	}

	return (
		<PluginDocumentSettingPanel
			name="memberlite-layout-settings"
			title={ __( 'Layout', textDomain ) }
			className="memberlite-layout-settings"
		>
			<VStack spacing={ 4 }>
				{ hasTemplate ? (
					<p style={ { margin: 0, fontSize: 12, color: '#757575' } }>
						{ sprintf(
							/* translators: %s: page template name, e.g. "Landing Page". */
							__( 'The %s template controls the layout. Switch to the default template to choose one.', textDomain ),
							templateName
						) }
					</p>
				) : (
					<>
						<div
							role="radiogroup"
							aria-label={ __( 'Layout', textDomain ) }
							style={ { display: 'grid', gridTemplateColumns: 'repeat(3, minmax(0, 1fr))', gap: 8 } }
						>
							{ options.map( ( option ) => {
								const isSelected = option.value === selected;
								return (
									<Button
										key={ option.value }
										role="radio"
										aria-checked={ isSelected }
										onClick={ () => setMeta( { ...meta, _memberlite_layout: option.value === 'default' ? '' : option.value } ) }
										style={ {
											display: 'flex',
											flexDirection: 'column',
											alignItems: 'center',
											gap: 6,
											height: 'auto',
											padding: '8px 2px',
											border: `2px solid ${ isSelected ? 'var(--wp-admin-theme-color, #3858e9)' : '#e0e0e0' }`,
											borderRadius: 4,
											fontSize: 12,
											fontWeight: isSelected ? 600 : 400,
											lineHeight: 1.3,
											whiteSpace: 'normal',
											textAlign: 'center',
										} }
									>
										<LayoutThumb layout={ option.value === 'default' ? data.default : option.value } isDefault={ option.value === 'default' } />
										{ option.label }
									</Button>
								);
							} ) }
						</div>
						<p style={ { margin: 0, fontSize: 12, color: '#757575' } }>{ help }</p>
						<ExternalLink href={ data.customizerUrl }>
							{ __( 'Change the default in the Customizer', textDomain ) }
						</ExternalLink>
					</>
				) }
				{ hasSidebar && (
					<VStack spacing={ 2 }>
						<SelectControl
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							label={ __( 'Custom Sidebar', textDomain ) }
							value={ hasCustomSidebar ? customSidebar : 'memberlite_sidebar_blank' }
							options={ data.sidebars }
							help={ data.defaultSidebarName
								/* translators: %s: sidebar name, e.g. "Pages". */
								? sprintf( __( 'The default sidebar is %s.', textDomain ), data.defaultSidebarName )
								: __( 'The default sidebar is hidden.', textDomain ) }
							onChange={ ( value ) => {
								setMeta( { ...meta, _memberlite_custom_sidebar: value } );
							} }
						/>
						{ hasCustomSidebar && data.defaultSidebarName && (
							<SelectControl
								__nextHasNoMarginBottom
								__next40pxDefaultSize
								label={ __( 'Default Sidebar Behavior', textDomain ) }
								value={ meta._memberlite_default_sidebar || 'default_sidebar_above' }
								options={ [
									{ value: 'default_sidebar_above', label: __( 'Show Default Sidebar Above', textDomain ) },
									{ value: 'default_sidebar_below', label: __( 'Show Default Sidebar Below', textDomain ) },
									{ value: 'default_sidebar_hide', label: __( 'Hide Default Sidebar', textDomain ) },
								] }
								onChange={ ( value ) => {
									setMeta( { ...meta, _memberlite_default_sidebar: value } );
								} }
							/>
						) }
						<ExternalLink href={ data.manageSidebarsUrl }>
							{ __( 'Manage Custom Sidebars', textDomain ) }
						</ExternalLink>
						{ postType === 'page' && (
							<ToggleControl
								__nextHasNoMarginBottom
								label={ __( 'Hide Page Children Menu in Sidebar', textDomain ) }
								checked={ data.hideChildrenLocked || !! meta._memberlite_hide_children }
								disabled={ data.hideChildrenLocked }
								help={ data.hideChildrenLocked ? __( 'The Membership Account page and its children do not display this menu.', textDomain ) : undefined }
								onChange={ ( value ) => {
									setMeta( { ...meta, _memberlite_hide_children: value } );
								} }
							/>
						) }
					</VStack>
				) }
			</VStack>
		</PluginDocumentSettingPanel>
	);
};

/**
 * Banner Image picker. Reads and writes the same meta as the classic Banner Image meta box.
 */
const BannerImageControl = ( { imageId, onChange } ) => {
	// Same lookup as core's Featured Image panel, so a deleted or missing attachment stops loading.
	const { media, isRequesting } = useSelect(
		( select ) => {
			if ( ! imageId ) {
				return { media: null, isRequesting: false };
			}

			const args = [ 'postType', 'attachment', imageId, { context: 'view' } ];
			return {
				media: select( 'core' ).getEntityRecord( ...args ),
				isRequesting: ! select( 'core' ).hasFinishedResolution( 'getEntityRecord', args ),
			};
		},
		[ imageId ]
	);

	const label          = __( 'Banner Image', textDomain );
	const preview        = media?.media_details?.sizes?.medium?.source_url || media?.source_url;
	const isMissingMedia = !! imageId && ! isRequesting && ! preview;

	return (
		<MediaUploadCheck
			fallback={
				<p style={ { margin: 0, fontSize: 12, color: '#757575' } }>
					{ __( 'To edit the Banner Image, you need permission to upload media.', textDomain ) }
				</p>
			}
		>
			<MediaUpload
				title={ label }
				allowedTypes={ [ 'image' ] }
				value={ imageId || undefined }
				onSelect={ ( image ) => onChange( image.id ) }
				render={ ( { open } ) => (
					<VStack spacing={ 2 }>
						{ isMissingMedia && (
							<Notice status="warning" isDismissible={ false }>
								{ __( 'Could not load the Banner Image. It may have been deleted. Replace or remove it.', textDomain ) }
							</Notice>
						) }
						{ !! imageId && ! isMissingMedia && (
							<Button
								onClick={ open }
								aria-label={ __( 'Replace Banner Image', textDomain ) }
								style={ { display: 'block', width: '100%', height: 'auto', padding: 0 } }
							>
								{ preview ? (
									<img src={ preview } alt="" style={ { display: 'block', width: '100%', height: 'auto' } } />
								) : (
									<Spinner />
								) }
							</Button>
						) }
						{ ! imageId && (
							<Button
								__next40pxDefaultSize
								variant="secondary"
								onClick={ open }
								style={ { justifyContent: 'center', width: '100%' } }
							>
								{ __( 'Set Banner Image', textDomain ) }
							</Button>
						) }
						{ !! imageId && (
							<HStack justify="flex-start">
								<Button __next40pxDefaultSize variant="secondary" onClick={ open }>
									{ __( 'Replace', textDomain ) }
								</Button>
								<Button __next40pxDefaultSize variant="tertiary" isDestructive onClick={ () => onChange( null ) }>
									{ __( 'Remove', textDomain ) }
								</Button>
							</HStack>
						) }
					</VStack>
				) }
			/>
		</MediaUploadCheck>
	);
};

/**
 * Banner Image panel. Shown on every post type with a Banner Image.
 */
const MemberliteBannerImageSettings = () => {
	const postType = useSelect(
		( select ) => select( 'core/editor' ).getCurrentPostType(),
		[]
	);

	// Always call hooks before any conditional return (Rules of Hooks).
	const [ meta, setMeta ] = useEntityProp( 'postType', postType, 'meta' );

	const metaKey = window.memberliteEditorData?.bannerImageMetaKey;
	if ( ! metaKey || ! meta ) {
		return null;
	}

	return (
		<PluginDocumentSettingPanel
			name="memberlite-banner-image"
			title={ __( 'Banner Image', textDomain ) }
			className="memberlite-banner-image"
		>
			<BannerImageControl
				imageId={ meta[ metaKey ] }
				onChange={ ( value ) => {
					setMeta( { ...meta, [ metaKey ]: value } );
				} }
			/>
		</PluginDocumentSettingPanel>
	);
};

/**
 * Template Settings panel: header and footer visibility and variation overrides.
 * Shown on pages, and on header variation posts for the sticky toggle.
 */
const MemberliteTemplateSettings = () => {
	const postType = useSelect(
		( select ) => select( 'core/editor' ).getCurrentPostType(),
		[]
	);

	// Always call hooks before any conditional return (Rules of Hooks).
	const [ meta, setMeta ] = useEntityProp( 'postType', postType, 'meta' );

	if ( postType !== 'page' && postType !== 'memberlite_header' ) {
		return null;
	}

	const isPage   = postType === 'page';
	const isHeader = postType === 'memberlite_header';

	const hideHeaderValue     = meta?._memberlite_hide_header || false;
	const hideFooterValue     = meta?._memberlite_hide_footer || false;
	const headerOverrideValue = meta?._memberlite_header_override ?? '';
	const headerOptions       = window.memberliteEditorData.headerVariations;
	const footerOverrideValue = meta?._memberlite_footer_override ?? '';
	const footerOptions       = window.memberliteEditorData.footerVariations;

	const stickyValue = meta?._memberlite_header_sticky || false;

	return (
		<PluginDocumentSettingPanel
			name="memberlite-template-settings"
			title={__('Template Settings', textDomain)}
			className="memberlite-template-settings"
		>
			{ isPage && (
				<VStack spacing={ 4 }>
					<ToggleControl
						__nextHasNoMarginBottom
						label={__('Hide Header', textDomain)}
						checked={ hideHeaderValue }
						onChange={ ( value ) => {
							setMeta( { ...meta, _memberlite_hide_header: value } );
						} }
					/>
					{ ! hideHeaderValue && (
						<VStack spacing={ 2 }>
							<SelectControl
								__nextHasNoMarginBottom
								__next40pxDefaultSize
								label={ __( 'Override Header Variation', textDomain ) }
								value={ headerOverrideValue }
								options={ headerOptions }
								onChange={ ( value ) => {
									setMeta( { ...meta, _memberlite_header_override: value } );
								} }
							/>
							<ExternalLink href={ window.memberliteEditorData.manageHeadersUrl }>
								{ __( 'Edit Header Variations', textDomain ) }
							</ExternalLink>
						</VStack>
					)}
					<ToggleControl
						__nextHasNoMarginBottom
						label={__('Hide Footer', textDomain)}
						checked={ hideFooterValue }
						onChange={ ( value ) => {
							setMeta( { ...meta, _memberlite_hide_footer: value } );
						} }
					/>
					{ ! hideFooterValue && (
						<VStack spacing={ 2 }>
							<SelectControl
								__nextHasNoMarginBottom
								__next40pxDefaultSize
								label={ __( 'Override Footer Variation', textDomain ) }
								value={ footerOverrideValue }
								options={ footerOptions }
								onChange={ ( value ) => {
									setMeta( { ...meta, _memberlite_footer_override: value } );
								} }
							/>
							<ExternalLink href={ window.memberliteEditorData.manageFootersUrl }>
								{ __( 'Edit Footer Variations', textDomain ) }
							</ExternalLink>
						</VStack>
					)}
				</VStack>
			)}
			{ isHeader && (
				<ToggleControl
					__nextHasNoMarginBottom
					label={__('Sticky Header', textDomain)}
					checked={ stickyValue }
					onChange={ ( value ) => {
						setMeta( { ...meta, _memberlite_header_sticky: value } );
					} }
				/>
			)}
		</PluginDocumentSettingPanel>
	);
};

/**
 * Page Settings panel: masthead banner options and prev/next navigation.
 * Pages only.
 */
const MemberlitePageSettings = () => {
	const postType = useSelect(
		( select ) => select( 'core/editor' ).getCurrentPostType(),
		[]
	);

	// Always call hooks before any conditional return (Rules of Hooks).
	const [ meta, setMeta ] = useEntityProp( 'postType', postType, 'meta' );

	if ( postType !== 'page' ) {
		return null;
	}

	const showPrevNextGlobally        = window.memberliteEditorData.showPrevNextSinglePages;
	const showPageBreadcrumbsGlobally = window.memberliteEditorData.showPageBreadcrumbs; // Check if breadcrumbs are enabled from customizer.

	const showBannerValue      = meta?._memberlite_banner_show ?? true; // Banner shows by default; `??` (not `||`) so an explicit `false` isn't overridden.
	const hideTitleValue       = meta?._memberlite_banner_hide_title || false;
	const hideBreadcrumbsValue = meta?._memberlite_banner_hide_breadcrumbs || false; // Setting only shows if breadcrumbs are enabled & banner is showing.
	const textAlignmentValue   = meta?._memberlite_banner_text_alignment ?? 'default';
	const hidePageNavValue     = meta?._memberlite_hide_page_nav || false;

	return (
		<PluginDocumentSettingPanel
			name="memberlite-page-settings"
			title={__('Page Settings', textDomain)}
			className="memberlite-page-settings"
		>
			<VStack spacing={ 4 }>
				<ToggleControl
					__nextHasNoMarginBottom
					label={__('Show Masthead Banner', textDomain)}
					checked={ showBannerValue }
					onChange={ ( value ) => {
						setMeta( { ...meta, _memberlite_banner_show: value } );
					} }
				/>
				{ showBannerValue && (
					<>
						<ToggleControl
							__nextHasNoMarginBottom
							label={__('Hide Page Title', textDomain)}
							checked={ hideTitleValue }
							onChange={ ( value ) => {
								setMeta( { ...meta, _memberlite_banner_hide_title: value } );
							} }
						/>
						{ showPageBreadcrumbsGlobally && (
							<ToggleControl
								__nextHasNoMarginBottom
								label={__('Hide Page Breadcrumbs', textDomain)}
								checked={ hideBreadcrumbsValue }
								onChange={ ( value ) => {
									setMeta( { ...meta, _memberlite_banner_hide_breadcrumbs: value } );
								} }
							/>
						)}
						<RadioControl
							label={__('Masthead Text Alignment', textDomain)}
							help={__('Choose the text alignment for the content inside the masthead banner.', textDomain)}
							selected={ textAlignmentValue }
							options={ [
								{ label: __('Left', textDomain), value: 'default' },
								{ label: __('Center', textDomain), value: 'centered' },
							] }
							onChange={ ( value ) => {
								setMeta( { ...meta, _memberlite_banner_text_alignment: value } );
							} }
						/>
					</>
				)}
				{ showPrevNextGlobally && (
					<ToggleControl
						__nextHasNoMarginBottom
						label={__('Hide Prev/Next Page Navigation', textDomain)}
						checked={ hidePageNavValue }
						onChange={ ( value ) => {
							setMeta( { ...meta, _memberlite_hide_page_nav: value } );
						} }
					/>
				)}
			</VStack>
		</PluginDocumentSettingPanel>
	);
};

registerPlugin( 'memberlite-layout-settings', {
	render: MemberliteLayoutSettings,
} );

registerPlugin( 'memberlite-template-settings', {
	render: MemberliteTemplateSettings,
} );

registerPlugin( 'memberlite-banner-image', {
	render: MemberliteBannerImageSettings,
} );

registerPlugin( 'memberlite-page-settings', {
	render: MemberlitePageSettings,
} );
