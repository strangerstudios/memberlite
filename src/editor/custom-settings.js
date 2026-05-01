import {__} from '@wordpress/i18n';
import { registerPlugin } from '@wordpress/plugins';
import { PluginDocumentSettingPanel } from '@wordpress/editor';
import { ToggleControl, SelectControl, ExternalLink } from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { useEntityProp } from '@wordpress/core-data';
import PMProIcon from './pmpro-icon';

const MemberliteCustomSettings = () => {
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

	const hideHeaderValue    = meta?._memberlite_hide_header || false;
	const hideFooterValue    = meta?._memberlite_hide_footer || false;
	const hidePageNavValue   = meta?._memberlite_hide_page_nav || false;
	const footerOverrideValue = meta?._memberlite_footer_override ?? '';
	const footerOptions      = window.memberliteEditorData.footerVariations;
	const showPrevNextGlobally = window.memberliteEditorData.showPrevNextSinglePages;

	const stickyValue = meta?._memberlite_header_sticky || false;

	const textDomain = 'memberlite';

	return (
		<PluginDocumentSettingPanel
			name="memberlite-custom-settings"
			title={__('Template Settings', textDomain)}
			className="memberlite-custom-settings"
			icon={ PMProIcon }
		>
			{ isPage && (
				<>
					<ToggleControl
						label={__('Hide Header', textDomain)}
						checked={ hideHeaderValue }
						onChange={ ( value ) => {
							setMeta( { ...meta, _memberlite_hide_header: value } );
						} }
					/>
					<div style={{ marginTop: '24px' }} />
					<ToggleControl
						label={__('Hide Footer', textDomain)}
						checked={ hideFooterValue }
						onChange={ ( value ) => {
							setMeta( { ...meta, _memberlite_hide_footer: value } );
						} }
					/>
					{ showPrevNextGlobally && (
						<>
							<div style={{ marginTop: '24px' }} />
							<ToggleControl
								label={__('Hide Prev/Next Page Navigation', textDomain)}
								checked={ hidePageNavValue }
								onChange={ ( value ) => {
									setMeta( { ...meta, _memberlite_hide_page_nav: value } );
								} }
							/>
						</>
					)}
					{ ! hideFooterValue && (
						<>
							<div style={{ marginTop: '24px' }} />
							<SelectControl
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
						</>
					)}
				</>
			)}
			{ isHeader && (
				<ToggleControl
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

registerPlugin( 'memberlite-custom-settings', {
	render: MemberliteCustomSettings,
} );
