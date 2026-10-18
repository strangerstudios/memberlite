import {__} from '@wordpress/i18n';
import { registerPlugin } from '@wordpress/plugins';
import { PluginDocumentSettingPanel } from '@wordpress/editor';
import {
	ToggleControl,
	SelectControl,
	ExternalLink,
	RadioControl,
	__experimentalVStack as VStack,
} from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { useEntityProp } from '@wordpress/core-data';

const textDomain = 'memberlite';

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
							__nextHasNoMarginBottom
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

registerPlugin( 'memberlite-template-settings', {
	render: MemberliteTemplateSettings,
} );

registerPlugin( 'memberlite-page-settings', {
	render: MemberlitePageSettings,
} );
