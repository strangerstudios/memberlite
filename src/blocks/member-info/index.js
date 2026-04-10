import './editor.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import metadata from './block.json';

function Edit( { attributes, setAttributes } ) {
	const { showWelcomeMessage } = attributes;
	const blockProps = useBlockProps( {
		className: 'memberlite-member-info-placeholder',
	} );

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Member Info Settings', 'memberlite' ) }>
					<ToggleControl
						label={ __( 'Show Welcome Message', 'memberlite' ) }
						help={ __(
							'Show "Welcome, [name]" for logged-in users.',
							'memberlite'
						) }
						checked={ showWelcomeMessage }
						onChange={ ( value ) =>
							setAttributes( { showWelcomeMessage: value } )
						}
					/>
				</PanelBody>
			</InspectorControls>
			<div { ...blockProps }>
				<strong>{ __( 'Member Info', 'memberlite' ) }</strong>
			</div>
		</>
	);
}

registerBlockType( metadata.name, {
	edit: Edit,
	save: () => null,
} );
