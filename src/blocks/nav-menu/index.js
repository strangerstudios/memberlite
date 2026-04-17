import './editor.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import ServerSideRender from '@wordpress/server-side-render';
import metadata from './block.json';

const MENU_LOCATIONS = [
	{ label: __( 'Primary', 'memberlite' ), value: 'primary' },
	{ label: __( 'Member (logged in)', 'memberlite' ), value: 'member' },
	{ label: __( 'Member (logged out)', 'memberlite' ), value: 'member-logged-out' },
	{ label: __( 'Footer', 'memberlite' ), value: 'footer' },
];

function Edit( { attributes, setAttributes } ) {
	const { menuLocation } = attributes;
	const blockProps = useBlockProps();

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Menu Settings', 'memberlite' ) }>
					<SelectControl
						label={ __( 'Menu Location', 'memberlite' ) }
						value={ menuLocation }
						options={ MENU_LOCATIONS }
						onChange={ ( value ) =>
							setAttributes( { menuLocation: value } )
						}
					/>
				</PanelBody>
			</InspectorControls>
			<div { ...blockProps }>
				<ServerSideRender
					block="memberlite/nav-menu"
					attributes={ attributes }
				/>
			</div>
		</>
	);
}

registerBlockType( metadata.name, {
	icon: {
		background: '#FFFFFF',
		foreground: '#00a59d',
		src: 'menu',
	},
	edit: Edit,
	save: () => null,
} );
