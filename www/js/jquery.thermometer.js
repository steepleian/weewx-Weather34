/* global jQuery */
(function($) {

	var Thermometer = {

		/** 
		 *  Set the value to show in the thermometer. If the value
		 *  is outside the maxmimum or minimum range it shall be clipped.
		 */
		setValue: function( value ) {
			if( value >= this.options.maxValue ) {
				this.valueToAttain = this.options.maxValue;
			} else if( value <= this.options.minValue ) {
				this.valueToAttain = this.options.minValue;
			} else {
				this.valueToAttain = value;
			}

			this._update();
		},

		/**
		 * Set the text colour
		 */
		setTextColour: function( newColour ) {
			this._updateTextColour( newColour );
		},
		
		/**
		 * Set the tick colour
		 */
		setTickColour: function( newColour ) {
			this._updateTickColour( newColour );
		},
		
		/**
		 * Set the text at the top of the scale
		 */
		setTopText: function( newText ) {
			this.topText.find('tspan').text(newText);
		},

		/**
		 * Set the text at the bottom of the scale
		 */
		setBottomText: function( newText ) {
			this.bottomText.find('tspan').text(newText);
		},

		/**
		 * Set the colour of the liquid in the thermometer. This must
		 * be of the form #ffffff. The shortened form and the rgb() form
		 * are not supported.
		 */
		setLiquidColour: function( newColour ) {

			this.options.liquidColour = newColour;
			this._updateLiquidColour();
		},

		/**
		 * Returns the liquid colour. If this is controlled by a colour
		 * function, then it returns the colour for the current value.
		 */
		getLiquidColour: function() {
			if( $.isFunction( this.options.liquidColour ) ) {
				return this.options.liquidColour( this.currentValue );
			} else {
				return this.options.liquidColour;
			}
		},

		_updateLiquidColour: function() {
			var liquidColour = this.getLiquidColour();

			var variables = [];
			variables["colour"] = liquidColour;
			variables["darkColour"] = this._blendColors( liquidColour, "#000000", 0.1 );
			variables["veryDarkColour"] = this._blendColors( liquidColour, '#000000', 0.2 );
		
			this._formatDataAttribute( this.neckLiquid, "style", variables );
			this._formatDataAttribute( this.liquidTop, "style", variables );
			this._formatDataAttribute( this.bowlLiquid, "style", variables );
			this._formatDataAttribute( this.bowlGlass, "style", variables );
			this._formatDataAttribute( this.neckGlass, "style", variables );
		},

		_updateTextColour: function( newColour ) {
			this.options.textColour = newColour;
			var variables = { textColour: this.options.textColour };
			this._formatDataAttribute( this.topText, "style", variables );
			this._formatDataAttribute( this.bottomText, "style", variables );
		},
		
		_updateTickColour: function( newColour ) {
			this.options.tickColour = newColour;
			var variables = { tickColour: this.options.tickColour };
			var self = this;
			this.ticks.find('rect').each( function(indx,tick) {
				self._formatDataAttribute( tick, "style", variables );
			} );
		},
		
		_setupSVGLinks: function(svg) {
			// Replace all ids in the SVG with fixtureId_id
			var id = this.fixtureId;
			svg.find('g[id], g [id]').each( function(indx,obj) {
				$(obj).attr('id', id + "_" + $(obj).attr('id') );
			});
			
			// This is all a bit magic, but these numbers come
			// from the SVG itself and so this will only work with
			// a specific SVG file.
			this.liquidBottomY = 346;
			this.liquidTopY = 25;
			this.neckBottomY = 573;
			this.neckTopY = 250;
			this.neckMinSize = 30;
			this.svgHeight = 1052;
			this.leftOffset = 300;
			this.topOffset = 150;
			this.liquidTop = svg.find('#'+id+'_LiquidTop path'); 
this.neckLiquid = svg.find('#'+id+'_NeckLiquid path'); 
this.bowlLiquid = svg.find('#'+id+'_BowlLiquid path'); 
this.topText = svg.find('#'+id+'_TopText'); 
this.bottomText = svg.find('#'+id+'_BottomText'); 
this.bowlGlass = svg.find('#'+id+'_BowlGlass'); 
this.neckGlass = svg.find('#'+id+'_NeckGlass'); 
this.ticks = svg.find('#'+id+'_Ticks'); 
		},

		_create: function() {
			var self = this;
			var div = $('<div/>');
			this.div = div;
			this.element.append( div );
			this.fixtureId = this.element.attr('id');

			div.load( this.options.pathToSVG, null, function() {
				// Scale the SVG to the options provided.
				var svg = $(this).find("svg");
				self._setupSVGLinks(svg);
				
				svg[0].setAttribute( "preserveAspectRatio", "xMinYMin meet" );
				svg[0].setAttribute( "viewBox", self.leftOffset+" "+self.topOffset+" 744 600" );

				svg.attr("width",  self.options.width );
				svg.attr("height", self.options.height );

				// Setup the SVG to the given options
				self.currentValue = self.options.startValue;
				self.setValue( self.options.startValue );
				self.setTopText( self.options.topText );
				self.setBottomText( self.options.bottomText );
				self.setLiquidColour( self.options.liquidColour );
				self.setTextColour( self.options.textColour );
				self.setTickColour( self.options.tickColour );
				
				if( self.options.onLoad ) {
					self.options.onLoad();
				}
			} );
		},

		_update: function() { 
            var self = this; 
            var valueProperty = {val: this.currentValue}; 
            $(valueProperty).animate( {val: this.valueToAttain}, { 
                duration: this.options.animationSpeed, 
                step: function() { 
                 self.currentValue = this.val; 
                 self._updateViewToValue(this.val); 
                     
                } 
            } ); 
        }, 

		_updateViewToValue: function( value ) {

			// Allow the liquid colour to be controlled by a function based on value
			if( $.isFunction( this.options.liquidColour ) ) {
				this._updateLiquidColour();
			}


			var variables = [];
			variables["liquidY"] = this.liquidBottomY - (value - this.options.minValue) * (this.liquidBottomY - this.liquidTopY) / (this.options.maxValue - this.options.minValue);
			variables["neckPosition"] = (value - this.options.minValue) * (this.neckBottomY - this.neckTopY) / (this.options.maxValue - this.options.minValue) + this.neckMinSize;
			variables["boxPosition"] = this.neckBottomY - variables["neckPosition"];

			// Move the oval representing the top of the liquid
			this._formatDataAttribute( this.liquidTop, "transform", variables );

			// Stretch the box representing the liquid in the neck
			this._formatDataAttribute( this.neckLiquid, "d", variables );

			// Call the valueChanged callback.
			if( this.options.valueChanged ) {
				this.options.valueChanged( value );
			}
		},

		_formatDataAttribute: function( object, attribute, variables ) {
			var formatString = $(object).attr("data-"+attribute);
			for( var v in variables ) {
				formatString = formatString.replace( new RegExp("%%"+v+"%%", "g"), variables[v] );
			}
			$(object).attr(attribute,formatString);
		},

		// http://stackoverflow.com/questions/5560248/programmatically-lighten-or-darken-a-hex-color-or-rgb-and-blend-colors
		_blendColors: function(c0, c1, p) {
			var f=parseInt(c0.slice(1),16),t=parseInt(c1.slice(1),16),R1=f>>16,G1=f>>8&0x00FF,B1=f&0x0000FF,R2=t>>16,G2=t>>8&0x00FF,B2=t&0x0000FF;
			return "#"+(0x1000000+(Math.round((R2-R1)*p)+R1)*0x10000+(Math.round((G2-G1)*p)+G1)*0x100+(Math.round((B2-B1)*p)+B1)).toString(16).slice(1);
		},


		// Default options
		options: {
			height: 700,
			minValue: 0,
			maxValue: 8,
			startValue: 15,
			topText: 50,
			bottomText: -30,
			textColour: 'silver',
			tickColour: 'silver',
			liquidColour: "#ff0000",
			animationSpeed: 1000,
			pathToSVG: "img/thermo-bottom.svg",
			valueChanged: undefined,
			onLoad: undefined
		}
	};

	$.widget( "dd.thermometer", Thermometer );

})(jQuery);
