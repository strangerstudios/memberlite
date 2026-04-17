import {__} from '@wordpress/i18n';
import { registerPlugin } from '@wordpress/plugins';
import { PluginDocumentSettingPanel } from '@wordpress/editor';
import { ToggleControl, SelectControl, ExternalLink } from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { useEntityProp } from '@wordpress/core-data';
import PMProIcon from "./pmpro-icon";

const MemberliteCustomSettings = () => {
	const postType = useSelect(
		( select ) => select( 'core/editor' ).getCurrentPostType(),
		[]
	);

	// Return null for non-page post types
	if ( postType !== 'page' ) {
		return null;
	}

	const [ meta, setMeta ] = useEntityProp( 'postType', postType, 'meta' );

	const hideHeaderValue = meta?._memberlite_hide_header || false;
	const hideFooterValue = meta?._memberlite_hide_footer || false;
	const hidePageNavValue = meta?._memberlite_hide_page_nav || false;
	const footerOverrideValue = meta?._memberlite_footer_override ?? ''; // '' = inherit from theme settings (no per-page override)
	// footerVariations is a pre-ordered array of {value, label} objects from PHP.
	const footerOptions = window.memberliteEditorData.footerVariations;

	// Check if the theme mod to show prev/next globally on pages is set to true
	const showPrevNextGlobally = window.memberliteEditorData.showPrevNextSinglePages;

	const textDomain = 'memberlite';

	return (
		<PluginDocumentSettingPanel
			name="memberlite-custom-settings"
			title={__('Template Settings', textDomain)}
			className="memberlite-custom-settings"
			icon={ PMProIcon }
		>
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
						{ __( 'Manage Footers', textDomain ) }
					</ExternalLink>
				</>
			)}
		</PluginDocumentSettingPanel>
	);
};

registerPlugin( 'memberlite-custom-settings', {
	render: MemberliteCustomSettings,
} );
