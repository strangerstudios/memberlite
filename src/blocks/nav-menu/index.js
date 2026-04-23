import './editor.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import ServerSideRender from '@wordpress/server-side-render';
import metadata from './block.json';
import { useState, useEffect } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';

const FALLBACK_MENU_LOCATIONS = [
	{ label: __( 'Primary', 'memberlite' ), value: 'location:primary' },
	{ label: __( 'Member (logged in)', 'memberlite' ), value: 'location:member' },
	{ label: __( 'Member (logged out)', 'memberlite' ), value: 'location:member-logged-out' },
	{ label: __( 'Footer', 'memberlite' ), value: 'location:footer' },
];

function Edit( { attributes, setAttributes } ) {
	const { selectedMenu } = attributes;
	const blockProps = useBlockProps();
	const [ locations, setLocations ] = useState( [] );
	const [ menus, setMenus ] = useState( [] );
	const [ isLoading, setIsLoading ] = useState( true );
	const [ error, setError ] = useState( '' );
	// From wp_localize_script...
	const navMenusAddOnActive = active_pmpro_plugins.nav_menu_plugin_active ?? false;

	useEffect( () => {
		const labels = window.memberliteBlockData?.menuLocationLabels || {};

		if ( ! navMenusAddOnActive ) {
			Promise.all( [
				apiFetch( { path: '/wp/v2/menus' } ),
			] )
				.then( ( [ fetchedMenus ] ) => {
					const menuOptions = fetchedMenus.map( ( menu ) => ( {
						label: menu.name,
						value: `menu:${ menu.id }`,
					} ) );

					setMenus( menuOptions );
					setIsLoading( false );
				} )
				.catch( ( err ) => {
					console.error( 'Failed to fetch menus:', err );
					setError( __( 'Could not load menus. Showing defaults.', 'memberlite' ) );
					setIsLoading( false );
				} );
		} else {
			Promise.all( [
				apiFetch( { path: '/wp/v2/menu-locations' } ),
				apiFetch( { path: '/wp/v2/menus' } ),
			] )
				.then( ( [ fetchedLocations, fetchedMenus ] ) => {
					const locationOptions = Object.entries( fetchedLocations ).map( ( [ slug, location ] ) => ( {
						label: location.description || labels[ slug ] || slug,
						value: `location:${ slug }`,
					} ) );

					const menuOptions = fetchedMenus.map( ( menu ) => ( {
						label: menu.name,
						value: `menu:${ menu.id }`,
					} ) );

					setLocations( locationOptions.length ? locationOptions : FALLBACK_MENU_LOCATIONS );
					setMenus( menuOptions );
					setIsLoading( false );
				} )
				.catch( ( err ) => {
					console.error( 'Failed to fetch menus or locations:', err );
					setLocations( FALLBACK_MENU_LOCATIONS );
					setError( __( 'Could not load menus. Showing defaults.', 'memberlite' ) );
					setIsLoading( false );
				} );
		}
	}, [] );

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Menu Settings', 'memberlite' ) }>
					<div className="memberlite-menu-select">
						<label
							className="components-base-control__label"
							htmlFor="memberlite-menu-location-select"
						>
							{ __( 'Select Menu', 'memberlite' ) }
						</label>
						{ isLoading ? (
							<p>{ __( 'Loading…', 'memberlite' ) }</p>
						) : (
							<>
								<select
									id="memberlite-menu-location-select"
									className="components-select-control__input"
									value={ selectedMenu }
									onChange={ ( e ) => setAttributes( { selectedMenu: e.target.value } ) }
								>
									<option value="">{ __( '-- No Menu Selected --', 'memberlite' ) }</option>
									{ menus.length > 0 && (
										<optgroup label={ __( 'By Menu', 'memberlite' ) }>
											{ menus.map( ( opt ) => (
												<option key={ opt.value } value={ opt.value }>
													{ opt.label }
												</option>
											) ) }
										</optgroup>
									) }
									{ navMenusAddOnActive && (
										<optgroup label={ __( 'By Location', 'memberlite' ) }>
											{ locations.map( ( opt ) => (
												<option key={ opt.value } value={ opt.value }>
													{ opt.label }
												</option>
											) ) }
										</optgroup>
									) }
								</select>
								{ menus.length === 0 && ! error && (
									<p className="components-base-control__help">
										{ __( 'No menus found. Create one under Appearance → Menus.', 'memberlite' ) }
									</p>
								) }
								{ error && (
									<p className="components-base-control__help" style={ { color: 'red' } }>
										{ error }
									</p>
								) }
							</>
						) }
					</div>
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
