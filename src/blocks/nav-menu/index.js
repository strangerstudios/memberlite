import './editor.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import ServerSideRender from '@wordpress/server-side-render';
import metadata from './block.json';
import { useState, useEffect } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';

function Edit( { attributes, setAttributes } ) {
	const { menuLocation } = attributes;
	const blockProps = useBlockProps();
	const [ menuLocations, setMenuLocations ] = useState( [] );

	useEffect( () => {
		apiFetch( { path: '/wp/v2/menu-locations' } )
			.then( ( locations ) => {
				const options = Object.entries( locations ).map( ( [value, location ] ) => ( {
					label: location.description,
					value: value,
				} ) );
				setMenuLocations( options );
			})
			.catch( ( err ) =>
				console.error( 'Failed to fetch menu locations:', err )
			);
	}, [] );

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Menu Settings', 'memberlite' ) }>
					<SelectControl
						label={ __( 'Menu Location', 'memberlite' ) }
						value={ menuLocation }
						options={ menuLocations }
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
	edit: Edit,
	save: () => null,
} );
