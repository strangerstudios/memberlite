import {__} from '@wordpress/i18n';
import { registerPlugin } from '@wordpress/plugins';
import { PluginDocumentSettingPanel } from '@wordpress/editor';
import { ToggleControl } from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { useEntityProp } from '@wordpress/core-data';

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

	const textDomain = 'memberlite';

	return (
		<PluginDocumentSettingPanel
			name="memberlite-custom-settings"
			title={__('Template Settings', textDomain)}
		>
			<ToggleControl
				label={__('Hide Header', textDomain)}
				checked={ hideHeaderValue }
				onChange={ ( value ) => {
					setMeta( { ...meta, _memberlite_hide_header: value } );
				} }
			/>
			<ToggleControl
				label={__('Hide Footer', textDomain)}
				checked={ hideFooterValue }
				onChange={ ( value ) => {
					setMeta( { ...meta, _memberlite_hide_footer: value } );
				} }
			/>
		</PluginDocumentSettingPanel>
	);
};

registerPlugin( 'memberlite-custom-settings', {
	render: MemberliteCustomSettings,
} );
