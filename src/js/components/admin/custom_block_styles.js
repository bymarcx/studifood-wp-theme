wp.domReady( () => {

    wp.blocks.registerBlockStyle( 'advanced-bootstrap-blocks/container', [
        {
            name: 'default',
            label: 'Default',
            isDefault: true,
        },
        {
            name: 'bymarc',
            label: 'Bymarc',
        }
    ]);

} );