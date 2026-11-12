/**
 * Texture control for Group, Columns, Column, and Cover blocks.
 *
 * Adds a Texture panel to the block's Styles tab. The panel reads and writes
 * memberlite-texture-* classes in the block's className, the same classes documented
 * in DESIGN.md, so markup written by hand and markup made with this control
 * are identical. Texture styles live in build/css/textures.css.
 */

import { __ } from '@wordpress/i18n';
import { addFilter } from '@wordpress/hooks';
import { createHigherOrderComponent } from '@wordpress/compose';
import { InspectorControls } from '@wordpress/block-editor';
import {
	Button,
	__experimentalToolsPanel as ToolsPanel,
	__experimentalToolsPanelItem as ToolsPanelItem,
	__experimentalToggleGroupControl as ToggleGroupControl,
	__experimentalToggleGroupControlOption as ToggleGroupControlOption,
} from '@wordpress/components';

const textDomain = 'memberlite';

const TEXTURE_BLOCKS = [ 'core/group', 'core/columns', 'core/column', 'core/cover' ];

// Inspector group the Texture panel renders in.
const PANEL_GROUP = 'styles';

const TEXTURES = [
	{ slug: 'grain', label: __( 'Grain', textDomain ) },
	{ slug: 'paper', label: __( 'Paper', textDomain ) },
	{ slug: 'dots', label: __( 'Dots', textDomain ) },
	{ slug: 'grid', label: __( 'Grid', textDomain ) },
	{ slug: 'lines', label: __( 'Lines', textDomain ) },
	{ slug: 'waves', label: __( 'Waves', textDomain ) },
];

const INTENSITIES = [
	{ value: 'subtle', label: __( 'Subtle', textDomain ) },
	{ value: 'default', label: __( 'Default', textDomain ) },
	{ value: 'bold', label: __( 'Bold', textDomain ) },
];

const TEXTURE_SLUGS = TEXTURES.map( ( texture ) => texture.slug );

const TEXTURE_CLASSES = [
	...TEXTURE_SLUGS.map( ( slug ) => `memberlite-texture-${ slug }` ),
	'memberlite-texture-subtle',
	'memberlite-texture-bold',
];

/**
 * Read the texture and intensity from a className string.
 *
 * @param {string} className Block className attribute.
 * @return {{texture: string, intensity: string}} Texture slug ('' for none) and intensity.
 */
function parseTextureClasses( className = '' ) {
	const tokens = className.split( /\s+/ );
	const texture = TEXTURE_SLUGS.find( ( slug ) => tokens.includes( `memberlite-texture-${ slug }` ) ) || '';
	let intensity = 'default';
	if ( tokens.includes( 'memberlite-texture-subtle' ) ) {
		intensity = 'subtle';
	} else if ( tokens.includes( 'memberlite-texture-bold' ) ) {
		intensity = 'bold';
	}
	return { texture, intensity };
}

/**
 * Replace the texture classes in a className string.
 *
 * @param {string} className Block className attribute.
 * @param {string} texture   Texture slug, or '' for none.
 * @param {string} intensity 'subtle', 'default', or 'bold'.
 * @return {string|undefined} New className, or undefined when empty.
 */
function applyTextureClasses( className = '', texture, intensity ) {
	const tokens = className.split( /\s+/ ).filter( ( token ) => token && ! TEXTURE_CLASSES.includes( token ) );
	if ( texture ) {
		tokens.push( `memberlite-texture-${ texture }` );
		if ( 'default' !== intensity ) {
			tokens.push( `memberlite-texture-${ intensity }` );
		}
	}
	return tokens.length ? tokens.join( ' ' ) : undefined;
}

const swatchGridStyle = {
	display: 'grid',
	gridTemplateColumns: 'repeat(4, 1fr)',
	gap: '8px',
};

/**
 * One texture swatch. The preview span carries the real texture classes.
 */
const TextureSwatch = ( { slug, label, isSelected, onClick } ) => (
	<Button
		label={ label }
		showTooltip
		aria-pressed={ isSelected }
		onClick={ onClick }
		style={ {
			display: 'flex',
			flexDirection: 'column',
			alignItems: 'stretch',
			gap: '4px',
			height: 'auto',
			padding: '4px',
			border: 0,
			borderRadius: '4px',
			boxShadow: isSelected
				? '0 0 0 2px var(--wp-admin-theme-color)'
				: '0 0 0 1px #ddd',
			background: '#fff',
			color: '#1e1e1e',
		} }
	>
		<span
			aria-hidden="true"
			className={ slug ? `memberlite-texture-swatch memberlite-texture-${ slug }` : 'memberlite-texture-swatch' }
			style={ {
				'--memberlite-texture-intensity': 2.5,
				display: 'block',
				height: '40px',
				borderRadius: '2px',
				overflow: 'hidden',
				background: slug
					? '#f6f7f7'
					: 'linear-gradient(to top right, #f6f7f7 calc(50% - 1px), #cc1818 50%, #f6f7f7 calc(50% + 1px))',
			} }
		/>
		<span style={ { fontSize: '11px', textAlign: 'center' } }>{ label }</span>
	</Button>
);

/**
 * Texture panel for a block's Styles tab.
 */
const TexturePanel = ( { attributes, setAttributes, clientId } ) => {
	const { texture, intensity } = parseTextureClasses( attributes.className );

	const update = ( nextTexture, nextIntensity ) => {
		setAttributes( { className: applyTextureClasses( attributes.className, nextTexture, nextIntensity ) } );
	};

	return (
		<InspectorControls group={ PANEL_GROUP }>
			<ToolsPanel
				label={ __( 'Texture', textDomain ) }
				resetAll={ () => update( '', 'default' ) }
				panelId={ clientId }
			>
				<ToolsPanelItem
					label={ __( 'Texture', textDomain ) }
					hasValue={ () => !! texture }
					onDeselect={ () => update( '', 'default' ) }
					isShownByDefault
					panelId={ clientId }
				>
					<div style={ swatchGridStyle } role="group" aria-label={ __( 'Texture', textDomain ) }>
						<TextureSwatch
							slug=""
							label={ __( 'None', textDomain ) }
							isSelected={ ! texture }
							onClick={ () => update( '', 'default' ) }
						/>
						{ TEXTURES.map( ( option ) => (
							<TextureSwatch
								key={ option.slug }
								slug={ option.slug }
								label={ option.label }
								isSelected={ texture === option.slug }
								onClick={ () => update( option.slug, intensity ) }
							/>
						) ) }
					</div>
				</ToolsPanelItem>
				{ texture && (
					<ToolsPanelItem
						label={ __( 'Intensity', textDomain ) }
						hasValue={ () => 'default' !== intensity }
						onDeselect={ () => update( texture, 'default' ) }
						isShownByDefault
						panelId={ clientId }
					>
						<ToggleGroupControl
							label={ __( 'Intensity', textDomain ) }
							value={ intensity }
							onChange={ ( value ) => update( texture, value ) }
							isBlock
							__next40pxDefaultSize
							__nextHasNoMarginBottom
						>
							{ INTENSITIES.map( ( option ) => (
								<ToggleGroupControlOption key={ option.value } value={ option.value } label={ option.label } />
							) ) }
						</ToggleGroupControl>
					</ToolsPanelItem>
				) }
			</ToolsPanel>
		</InspectorControls>
	);
};

addFilter(
	'editor.BlockEdit',
	'memberlite/texture-control',
	createHigherOrderComponent(
		( BlockEdit ) => ( props ) => {
			if ( ! TEXTURE_BLOCKS.includes( props.name ) || ! props.isSelected ) {
				return <BlockEdit { ...props } />;
			}
			return (
				<>
					<BlockEdit { ...props } />
					<TexturePanel { ...props } />
				</>
			);
		},
		'withMemberliteTextureControl'
	)
);
