WebFontConfig = {
   google: { families: [ 'Lato:100,300,400,700,900:latin', 'Playfair+Display:900:latin', 'Merriweather:300,400,700,700italic,400italic:latin', 'Quicksand::latin'  ] }
};

(function() {
  var wf = document.createElement('script');
  wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
    '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
  wf.type = 'text/javascript';
  wf.async = 'true';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(wf, s);
})();
