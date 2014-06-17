(function(){
    // This function allows us to register our theme in the client-side script.
    // We use the same id as the one defined in plugin.php and say explicitly 
    // which theme is its parent ('default'). This argument is optional.
    dw.theme.register('mojo', 'default', {
        colors: {
            // The palette options defined the colors available within each chart.
            palette: ["#FF9900", "#FFFF00","#33FF00", "#FE99FE", "#FF0000", "#0099FF", "#6633FF"],
            secondary: ["edd400", "f57900", "#c17d11", "#73d216", "#3465a4", "#75507b", "#cc0000"],
            context: '#aaa',
            axis: '#fff',
            // Default color use for positive values
            positive: '#FF9900',
            // Default color use for negative values
            negative: '#FE99FE',
            background: '#00008B'
        },
        // Grid options
        horizontalGrid: { stroke: '#fff' },
        verticalGrid:   { stroke: '#fff' },
        // Here is a way to add an option for a specific visualization 
        columnChart: {
            cutGridLines: true
        },
        frameStrokeOnTop: true,
        vpadding: 10
    });
}).call(this);
