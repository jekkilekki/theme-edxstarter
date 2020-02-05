var imgs = document.getElementsByTagName( 'img' );

console.info( imgs);

for ( var i = 0; i < imgs.length; i++ ) {
	var el = imgs[i];
	var wrap = document.createElement('figure');
	wrap.className = 'image-wrap';

	el.parentNode.insertBefore( wrap, el );
	wrap.appendChild(el);
}