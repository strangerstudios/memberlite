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

	const [ meta, setMeta ] = useEntityProp( 'postType', postType, 'meta' );

	const yourCustomValue = meta?._memberlite_hide_header_footer || false;

	return (
		<PluginDocumentSettingPanel
			name="memberlite-custom-settings"
			title="Template Settings"
		>
			<ToggleControl
				label="Hide header and footer?"
				checked={ yourCustomValue }
				onChange={ ( value ) => {
					setMeta( { ...meta, _memberlite_hide_header_footer: value } );
				} }
			/>
		</PluginDocumentSettingPanel>
	);
};

registerPlugin( 'memberlite-custom-settings', {
	render: MemberliteCustomSettings,
} );
