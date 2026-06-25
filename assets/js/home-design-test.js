/**
 * Lightweight, dependency-free continuous product carousel.
 */
( function () {
	'use strict';

	var root = document.querySelector( '.infometry-home-test' );
	var track = root ? root.querySelector( '#infometry-product-carousel' ) : null;
	if ( ! track || window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches ) {
		return;
	}

	var originals = Array.prototype.slice.call( track.querySelectorAll( '.infometry-product-card' ) );
	if ( originals.length < 2 ) {
		return;
	}

	originals.forEach( function ( card ) {
		var clone = card.cloneNode( true );
		var cardStyles = window.getComputedStyle( card );
		[ '--product-accent', '--product-accent-2', '--product-tint' ].forEach( function ( property ) {
			clone.style.setProperty( property, cardStyles.getPropertyValue( property ).trim() );
		} );
		clone.setAttribute( 'aria-hidden', 'true' );
		clone.querySelectorAll( 'a, button, input, select, textarea' ).forEach( function ( control ) {
			control.setAttribute( 'tabindex', '-1' );
		} );
		track.appendChild( clone );
	} );

	var speed = 18;
	var position = 0;
	var previousTime = 0;
	var frame = null;
	var paused = false;
	var loopWidth = 0;

	function measure() {
		var firstOriginal = track.querySelector( '.infometry-product-card' );
		var firstClone = track.querySelector( '.infometry-product-card[aria-hidden="true"]' );
		loopWidth = firstOriginal && firstClone ? firstClone.offsetLeft - firstOriginal.offsetLeft : 0;
		position = loopWidth ? track.scrollLeft % loopWidth : 0;
	}

	function animate( time ) {
		if ( ! previousTime ) {
			previousTime = time;
		}
		if ( ! paused && loopWidth ) {
			position += speed * Math.min( time - previousTime, 50 ) / 1000;
			if ( position >= loopWidth ) {
				position -= loopWidth;
			}
			track.scrollLeft = position;
		}
		previousTime = time;
		frame = window.requestAnimationFrame( animate );
	}

	function pause() {
		paused = true;
		position = track.scrollLeft;
	}

	function resume() {
		paused = false;
		previousTime = 0;
	}

	track.addEventListener( 'focusin', pause );
	track.addEventListener( 'focusout', resume );
	track.addEventListener( 'mouseenter', pause );
	track.addEventListener( 'mouseleave', resume );
	track.addEventListener( 'touchstart', pause, { passive: true } );
	track.addEventListener( 'touchend', resume, { passive: true } );
	track.addEventListener( 'click', function ( event ) {
		var card = event.target.closest( '.infometry-product-card' );
		var link = card ? card.querySelector( 'a[href]' ) : null;
		if ( ! link || event.target.closest( 'a, button, input, select, textarea' ) ) {
			return;
		}
		if ( event.metaKey || event.ctrlKey ) {
			window.open( link.href, '_blank' );
			return;
		}
		window.location.href = link.href;
	} );
	track.addEventListener( 'scroll', function () {
		if ( paused ) {
			position = track.scrollLeft;
		}
	}, { passive: true } );
	window.addEventListener( 'resize', measure, { passive: true } );
	document.addEventListener( 'visibilitychange', function () {
		if ( document.hidden ) {
			pause();
		} else {
			resume();
		}
	} );

	measure();
	frame = window.requestAnimationFrame( animate );
}() );

/**
 * Animate the impact figures once they enter the viewport.
 */
( function () {
	'use strict';

	var counters = Array.prototype.slice.call( document.querySelectorAll( '.infometry-home-test .infometry-counter' ) );
	if ( ! counters.length ) {
		return;
	}

	function finish( counter ) {
		counter.textContent = counter.getAttribute( 'data-counter-target' ) + ( counter.getAttribute( 'data-counter-suffix' ) || '' );
	}

	function animateCounter( counter ) {
		if ( counter.getAttribute( 'data-counted' ) === 'true' ) {
			return;
		}
		counter.setAttribute( 'data-counted', 'true' );
		var target = parseInt( counter.getAttribute( 'data-counter-target' ), 10 ) || 0;
		var suffix = counter.getAttribute( 'data-counter-suffix' ) || '';
		var startTime = 0;
		var duration = 1600;

		function tick( time ) {
			if ( ! startTime ) {
				startTime = time;
			}
			var progress = Math.min( ( time - startTime ) / duration, 1 );
			var eased = 1 - Math.pow( 1 - progress, 3 );
			counter.textContent = Math.round( target * eased ) + suffix;
			if ( progress < 1 ) {
				window.requestAnimationFrame( tick );
			}
		}
		window.requestAnimationFrame( tick );
	}

	if ( window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches || ! ( 'IntersectionObserver' in window ) ) {
		counters.forEach( finish );
		return;
	}

	var observer = new IntersectionObserver( function ( entries ) {
		entries.forEach( function ( entry ) {
			if ( entry.isIntersecting ) {
				counters.forEach( animateCounter );
				observer.disconnect();
			}
		} );
	}, { threshold: 0.35 } );
	observer.observe( document.querySelector( '#infometry-impact' ) );
}() );

/**
 * Continuous customer-logo carousel; pauses while hovered or focused.
 */
( function () {
	'use strict';

	var track = document.querySelector( '.infometry-home-test #infometry-customer-carousel' );
	if ( ! track || window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches ) {
		return;
	}
	var originals = Array.prototype.slice.call( track.querySelectorAll( '.infometry-customer-logo' ) );
	if ( originals.length < 2 ) {
		return;
	}
	originals.forEach( function ( item ) {
		var clone = item.cloneNode( true );
		clone.setAttribute( 'aria-hidden', 'true' );
		clone.setAttribute( 'tabindex', '-1' );
		track.appendChild( clone );
	} );

	var speed = 24;
	var position = 0;
	var previousTime = 0;
	var paused = false;
	var loopWidth = 0;
	var initialized = false;

	function measure() {
		var firstOriginal = track.querySelector( '.infometry-customer-logo' );
		var firstClone = track.querySelector( '.infometry-customer-logo[aria-hidden="true"]' );
		loopWidth = firstOriginal && firstClone ? firstClone.offsetLeft - firstOriginal.offsetLeft : 0;
		if ( loopWidth && ! initialized ) {
			position = loopWidth;
			track.scrollLeft = position;
			initialized = true;
		}
	}
	function animate( time ) {
		if ( ! previousTime ) {
			previousTime = time;
		}
		if ( ! paused && loopWidth ) {
			position -= speed * Math.min( time - previousTime, 50 ) / 1000;
			if ( position <= 0 ) {
				position += loopWidth;
			}
			track.scrollLeft = position;
		}
		previousTime = time;
		window.requestAnimationFrame( animate );
	}
	function pause() {
		paused = true;
		position = track.scrollLeft;
	}
	function resume() {
		paused = false;
		previousTime = 0;
	}

	track.addEventListener( 'focusin', pause );
	track.addEventListener( 'focusout', resume );
	track.addEventListener( 'mouseenter', pause );
	track.addEventListener( 'mouseleave', resume );
	track.addEventListener( 'touchstart', pause, { passive: true } );
	track.addEventListener( 'touchend', resume, { passive: true } );
	track.addEventListener( 'scroll', function () {
		if ( paused ) {
			position = track.scrollLeft;
		}
	}, { passive: true } );
	window.addEventListener( 'resize', measure, { passive: true } );
	measure();
	window.addEventListener( 'load', measure, { once: true } );
	window.setTimeout( function () {
		measure();
		resume();
	}, 250 );
	window.requestAnimationFrame( animate );
}() );

/**
 * Continuous capabilities carousel moving opposite to the product carousel.
 */
( function () {
	'use strict';

	var root = document.querySelector( '.infometry-home-test' );
	var track = root ? root.querySelector( '#infometry-capability-carousel' ) : null;
	if ( ! track || window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches ) {
		return;
	}

	var originals = Array.prototype.slice.call( track.querySelectorAll( '.infometry-capability-item' ) );
	if ( originals.length < 2 ) {
		return;
	}

	originals.forEach( function ( item ) {
		var clone = item.cloneNode( true );
		clone.setAttribute( 'aria-hidden', 'true' );
		track.appendChild( clone );
	} );

	var speed = 20;
	var position = 0;
	var previousTime = 0;
	var paused = false;
	var loopWidth = 0;
	var initialized = false;

	function measure() {
		var firstOriginal = track.querySelector( '.infometry-capability-item' );
		var firstClone = track.querySelector( '.infometry-capability-item[aria-hidden="true"]' );
		loopWidth = firstOriginal && firstClone ? firstClone.offsetLeft - firstOriginal.offsetLeft : 0;
		if ( loopWidth && ! initialized ) {
			position = loopWidth;
			track.scrollLeft = position;
			initialized = true;
		}
	}

	function animate( time ) {
		if ( ! previousTime ) {
			previousTime = time;
		}
		if ( ! paused && loopWidth ) {
			position -= speed * Math.min( time - previousTime, 50 ) / 1000;
			if ( position <= 0 ) {
				position += loopWidth;
			}
			track.scrollLeft = position;
		}
		previousTime = time;
		window.requestAnimationFrame( animate );
	}

	function pause() {
		paused = true;
		position = track.scrollLeft;
	}

	function resume() {
		paused = false;
		previousTime = 0;
	}

	track.addEventListener( 'focusin', pause );
	track.addEventListener( 'focusout', resume );
	track.addEventListener( 'mouseenter', pause );
	track.addEventListener( 'mouseleave', resume );
	track.addEventListener( 'touchstart', pause, { passive: true } );
	track.addEventListener( 'touchend', resume, { passive: true } );
	track.addEventListener( 'scroll', function () {
		if ( paused ) {
			position = track.scrollLeft;
		}
	}, { passive: true } );
	window.addEventListener( 'resize', measure, { passive: true } );

	measure();
	window.addEventListener( 'load', measure, { once: true } );
	window.setTimeout( function () {
		measure();
		resume();
	}, 250 );
	window.requestAnimationFrame( animate );
}() );

/**
 * Continuous industry carousel moving opposite to the capabilities carousel.
 */
( function () {
	'use strict';

	var root = document.querySelector( '.infometry-home-test' );
	var track = root ? root.querySelector( '#infometry-industry-carousel' ) : null;
	if ( ! track || window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches ) {
		return;
	}

	var originals = Array.prototype.slice.call( track.querySelectorAll( '.infometry-industry-item' ) );
	if ( originals.length < 2 ) {
		return;
	}

	originals.forEach( function ( item ) {
		var clone = item.cloneNode( true );
		var itemStyle = window.getComputedStyle( item );
		[ '--industry-accent', '--industry-accent-2', '--industry-tint' ].forEach( function ( property ) {
			clone.style.setProperty( property, itemStyle.getPropertyValue( property ).trim() );
		} );
		clone.setAttribute( 'aria-hidden', 'true' );
		clone.querySelectorAll( 'a, button, input, select, textarea' ).forEach( function ( control ) {
			control.setAttribute( 'tabindex', '-1' );
		} );
		track.appendChild( clone );
	} );

	var speed = 18;
	var position = 0;
	var previousTime = 0;
	var paused = false;
	var loopWidth = 0;

	function measure() {
		var firstOriginal = track.querySelector( '.infometry-industry-item' );
		var firstClone = track.querySelector( '.infometry-industry-item[aria-hidden="true"]' );
		loopWidth = firstOriginal && firstClone ? firstClone.offsetLeft - firstOriginal.offsetLeft : 0;
		position = loopWidth ? track.scrollLeft % loopWidth : 0;
	}

	function animate( time ) {
		if ( ! previousTime ) {
			previousTime = time;
		}
		if ( ! paused && loopWidth ) {
			position += speed * Math.min( time - previousTime, 50 ) / 1000;
			if ( position >= loopWidth ) {
				position -= loopWidth;
			}
			track.scrollLeft = position;
		}
		previousTime = time;
		window.requestAnimationFrame( animate );
	}

	function pause() {
		paused = true;
		position = track.scrollLeft;
	}

	function resume() {
		paused = false;
		previousTime = 0;
	}

	track.addEventListener( 'focusin', pause );
	track.addEventListener( 'focusout', resume );
	track.addEventListener( 'mouseenter', pause );
	track.addEventListener( 'mouseleave', resume );
	track.addEventListener( 'touchstart', pause, { passive: true } );
	track.addEventListener( 'touchend', resume, { passive: true } );
	track.addEventListener( 'scroll', function () {
		if ( paused ) {
			position = track.scrollLeft;
		}
	}, { passive: true } );
	window.addEventListener( 'resize', measure, { passive: true } );

	measure();
	window.addEventListener( 'load', measure, { once: true } );
	window.setTimeout( function () {
		measure();
		resume();
	}, 250 );
	window.requestAnimationFrame( animate );
}() );

/**
 * Continuous technology-partner logo carousel.
 */
( function () {
	'use strict';

	var root = document.querySelector( '.infometry-home-test' );
	var track = root ? root.querySelector( '#infometry-partner-carousel' ) : null;
	if ( ! track || window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches ) {
		return;
	}

	var originals = Array.prototype.slice.call( track.querySelectorAll( '.infometry-partner-item' ) );
	if ( originals.length < 2 ) {
		return;
	}

	originals.forEach( function ( item ) {
		var clone = item.cloneNode( true );
		clone.setAttribute( 'aria-hidden', 'true' );
		clone.setAttribute( 'tabindex', '-1' );
		track.appendChild( clone );
	} );

	var speed = 22;
	var position = 0;
	var previousTime = 0;
	var paused = false;
	var loopWidth = 0;
	var initialized = false;

	function measure() {
		var firstOriginal = track.querySelector( '.infometry-partner-item' );
		var firstClone = track.querySelector( '.infometry-partner-item[aria-hidden="true"]' );
		loopWidth = firstOriginal && firstClone ? firstClone.offsetLeft - firstOriginal.offsetLeft : 0;
		if ( loopWidth && ! initialized ) {
			position = loopWidth;
			track.scrollLeft = position;
			initialized = true;
		}
	}

	function animate( time ) {
		if ( ! previousTime ) {
			previousTime = time;
		}
		if ( ! paused && loopWidth ) {
			position -= speed * Math.min( time - previousTime, 50 ) / 1000;
			if ( position <= 0 ) {
				position += loopWidth;
			}
			track.scrollLeft = position;
		}
		previousTime = time;
		window.requestAnimationFrame( animate );
	}

	function pause() {
		paused = true;
		position = track.scrollLeft;
	}

	function resume() {
		paused = false;
		previousTime = 0;
	}

	track.addEventListener( 'focusin', pause );
	track.addEventListener( 'focusout', resume );
	track.addEventListener( 'mouseenter', pause );
	track.addEventListener( 'mouseleave', resume );
	track.addEventListener( 'touchstart', pause, { passive: true } );
	track.addEventListener( 'touchend', resume, { passive: true } );
	track.addEventListener( 'scroll', function () {
		if ( paused ) {
			position = track.scrollLeft;
		}
	}, { passive: true } );
	window.addEventListener( 'resize', measure, { passive: true } );
	document.addEventListener( 'visibilitychange', function () {
		if ( document.hidden ) {
			pause();
		} else {
			resume();
		}
	} );

	measure();
	window.addEventListener( 'load', measure, { once: true } );
	window.setTimeout( function () {
		measure();
		resume();
	}, 250 );
	window.requestAnimationFrame( animate );
}() );

/**
 * Mouse/touch drag support for every continuously moving strip.
 */
( function () {
	'use strict';

	document.querySelectorAll( '.infometry-home-test #infometry-product-carousel, .infometry-home-test #infometry-capability-carousel, .infometry-home-test #infometry-industry-carousel, .infometry-home-test #infometry-partner-carousel, .infometry-home-test #infometry-customer-carousel' ).forEach( function ( track ) {
		var dragging = false;
		var moved = false;
		var startX = 0;
		var startY = 0;
		var startScroll = 0;

		function startDragging( clientX, clientY ) {
			dragging = true;
			moved = false;
			startX = clientX;
			startY = clientY;
			startScroll = track.scrollLeft;
			track.classList.add( 'is-dragging' );
		}

		function moveDragging( clientX ) {
			if ( ! dragging ) {
				return;
			}
			var distance = clientX - startX;
			if ( Math.abs( distance ) > 4 ) {
				moved = true;
			}
			track.scrollLeft = startScroll - distance;
		}

		track.addEventListener( 'pointerdown', function ( event ) {
			if ( event.pointerType === 'mouse' && event.button !== 0 ) {
				return;
			}
			startDragging( event.clientX, event.clientY );
			track.setPointerCapture( event.pointerId );
		} );

		track.addEventListener( 'pointermove', function ( event ) {
			var distanceX = event.clientX - startX;
			var distanceY = event.clientY - startY;
			if ( event.pointerType !== 'mouse' && Math.abs( distanceX ) > Math.abs( distanceY ) && Math.abs( distanceX ) > 4 ) {
				event.preventDefault();
			}
			moveDragging( event.clientX );
		} );

		function stopDragging( event ) {
			if ( event && typeof event.pointerId !== 'undefined' && track.hasPointerCapture( event.pointerId ) ) {
				track.releasePointerCapture( event.pointerId );
			}
			if ( ! dragging ) {
				return;
			}
			dragging = false;
			track.classList.remove( 'is-dragging' );
		}

		track.addEventListener( 'pointerup', stopDragging );
		track.addEventListener( 'pointercancel', stopDragging );
		track.addEventListener( 'touchstart', function ( event ) {
			if ( event.touches.length !== 1 ) {
				return;
			}
			startDragging( event.touches[0].clientX, event.touches[0].clientY );
		}, { passive: true } );
		track.addEventListener( 'touchmove', function ( event ) {
			if ( ! dragging || event.touches.length !== 1 ) {
				return;
			}
			var touch = event.touches[0];
			var distanceX = touch.clientX - startX;
			var distanceY = touch.clientY - startY;
			if ( Math.abs( distanceX ) > Math.abs( distanceY ) && Math.abs( distanceX ) > 4 ) {
				event.preventDefault();
			}
			moveDragging( touch.clientX );
		}, { passive: false } );
		track.addEventListener( 'touchend', stopDragging, { passive: true } );
		track.addEventListener( 'touchcancel', stopDragging, { passive: true } );
		track.addEventListener( 'dragstart', function ( event ) {
			event.preventDefault();
		} );
		track.addEventListener( 'click', function ( event ) {
			if ( moved ) {
				event.preventDefault();
				event.stopPropagation();
				moved = false;
			}
		}, true );
		track.addEventListener( 'wheel', function ( event ) {
			if ( Math.abs( event.deltaX ) > Math.abs( event.deltaY ) || event.shiftKey ) {
				event.preventDefault();
				track.scrollLeft += event.deltaX || event.deltaY;
			}
		}, { passive: false } );
	} );
}() );
