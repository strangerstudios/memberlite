import './editor.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import ServerSideRender from '@wordpress/server-side-render';
import metadata from './block.json';
import { useState, useEffect } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';

const FALLBACK_MENU_LOCATIONS  = [
	{ label: __( 'Primary', 'memberlite' ), value: 'primary' },
	{ label: __( 'Member (logged in)', 'memberlite' ), value: 'member' },
	{ label: __( 'Member (logged out)', 'memberlite' ), value: 'member-logged-out' },
	{ label: __( 'Footer', 'memberlite' ), value: 'footer' },
];

function Edit( { attributes, setAttributes } ) {
	const { menuLocation } = attributes;
	const blockProps = useBlockProps();
	const [ menuLocations, setMenuLocations ] = useState( [
		{
			label: __( 'Loading menu locations…', 'memberlite' ),
			value: '',
		},
	] );
	const [ isLoading, setIsLoading ] = useState( true );
	const [ menuLocationsError, setMenuLocationsError ] = useState( '' );

	useEffect( () => {
		apiFetch( { path: '/wp/v2/menu-locations' } )
			.then( ( locations ) => {
				const options = Object.entries( locations ).map( ( [value, location ] ) => ( {
					label: location.description,
					value: value,
				} ) );

				setMenuLocations(
					options.length
						? options
						: FALLBACK_MENU_LOCATIONS
				);

				setMenuLocationsError( '' );
				setIsLoading( false );
			} )
			.catch( ( err ) => {
				console.error( 'Failed to fetch menu locations:', err );

				setMenuLocations( FALLBACK_MENU_LOCATIONS );
				setMenuLocationsError(
					__( 'Menu locations could not be loaded. Showing defaults.', 'memberlite' )
				);
				setIsLoading( false );
			} );
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
