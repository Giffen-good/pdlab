(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
	value: true
});
// glitch

var TT = document.querySelectorAll('.TT');
var glitch = exports.glitch = function glitch() {
	var duration = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 300;

	var el = document.getElementById('i-glitch');

	toggleGlitch(el);
	setTimeout(function () {
		toggleGlitch(el, true);
	}, 20);
};

var toggleGlitch = function toggleGlitch(el) {
	var extra = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;

	if (extra) {
		TT.forEach(function (e) {
			return e.classList.add('bye');
		});
		setTimeout(function () {
			return el.classList.toggle('dn');
		}, 100);
	} else {
		el.classList.toggle('dn');
	}
};

//// title

var title = document.getElementById('i-title');

var runTitle = exports.runTitle = function runTitle() {
	var sm = title.querySelectorAll('div');
	title.classList.remove('dn');

	/// setup random layout for images
	var layouts = ['one', 'two', 'three'];
	title.classList.add('layout_' + layouts[Math.floor(Math.random() * layouts.length)]);

	sm.forEach(function (el, i) {
		setTimeout(function () {
			el.classList.remove('dn');

			/// wait til all title elements are shown
			i === sm.length - 1 ? setupImages() : null;
		}, i * 400);
	});
};

var setupImages = exports.setupImages = function setupImages() {
	var imgs = title.querySelectorAll('.title-img');

	imgs.forEach(function (el) {
		var img = el.querySelector('img');
		var imgArray = JSON.parse(el.getAttribute('data-imgs'));
		startSwitching(el, img, imgArray);
	});
};

var startSwitching = function startSwitching(el, img, imgs) {
	// time before switching
	var min = 420;
	var max = 4200;
	var actual = getRandomInt(min, max);
	var start = 0;
	var end = imgs.length - 1;

	var next = function next() {
		start === end ? start = 0 : start++;
		img.setAttribute('src', imgs[start]);
		actual = getRandomInt(min, max);
		console.log(actual);

		clearInterval(running);
		running = setTimeout(next, actual);
	};

	var running = setTimeout(next, actual);
};

var getRandomInt = function getRandomInt(min, max) {
	return Math.floor(max - Math.random() * (max - min));
};

},{}],2:[function(require,module,exports){
'use strict';

var _text = require('./text');

var _text2 = _interopRequireDefault(_text);

var _effects = require('./effects');

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

window.onload = function () {
	if (window.location.href.indexOf('#') != -1) {
		(0, _text.callback)(false);
		(0, _effects.runTitle)();
	} else {
		(0, _text2.default)();
		document.body.classList.add('fixed-scroll')
	}
};

},{"./effects":1,"./text":3}],3:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
	value: true
});
exports.callback = exports.textParams = undefined;

var _effects = require('./effects');

var textParams = exports.textParams = {
	initWord: 'We are',
	words: ['shapeshifters', 'innovators', 'builders', 'planners', 'thinkers', 'transformers', 'artists', 'magicians', 'creators', 'PD Lab'],
	// words : ['shapeshifters', 'innovators'],
	wordsNum: 0,
	sec: 100,
	delay: 200,
	el: document.getElementById('i-intro-text'),
	els: [document.getElementById('i-initWord'), document.getElementById('i-words')]
};

var runStr = function runStr(str) {
	var back = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
	var proceed = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;
	var el = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : textParams.els[1];

	textParams.sec = textParams.sec / 1.2;
	textParams.delay = textParams.delay / 1.2;

	// beginning
	var b = back ? str.length : -1;
	/// if going backwards
	var run = setInterval(function () {
		!back ? b === str.length - 1 ? stop() : next() : b === 0 ? end() : prev();
	}, textParams.sec);

	// stop the intial load
	var stop = function stop() {
		clearInterval(run);

		// if proceed = true, then dont go back
		if (!proceed) {
			setTimeout(function () {
				runStr(str, true);
			}, textParams.delay);

			// if proceed and there's more words to go, keep going
		} else if (proceed && textParams.wordsNum <= textParams.words.length - 2) {
			runStr(textParams.words[textParams.wordsNum]);
			// else it's the end! and no return/del function
		} else {
			callback();
		}
	};

	var end = function end() {
		clearInterval(run);
		console.log(textParams.wordsNum);
		console.log(textParams.words.length - 2);

		//// if wordsNum is less than the amount of words, keep going to the next word
		if (textParams.wordsNum < textParams.words.length - 2) forward();else final();
	};

	// add letters
	var next = function next() {
		b++;
		el.textContent += str[b];
	};

	// delete letters
	var prev = function prev() {
		b--;
		el.textContent = el.textContent.substr(0, el.textContent.length - 1);
	};

	// onto the next word set
	var forward = function forward() {
		textParams.wordsNum++;
		runStr(textParams.words[textParams.wordsNum]);
	};

	/// run the final word with proceed
	var final = function final() {
		textParams.wordsNum++;
		runStr(textParams.words[textParams.wordsNum], false, true);
	};
};

var callback = exports.callback = function callback() {
	var intro = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : true;

	if (!intro) {
		(0, _effects.glitch)();
		destroyText();
	} else {
		setTimeout(_effects.glitch, 800);
		setTimeout(destroyText, 1300);
		setTimeout(_effects.runTitle, 1300);
	}
};

var destroyText = function destroyText() {
	textParams.el.classList.add('dn');
	document.body.classList.remove('fixed-scroll')
};

exports.default = function () {
	runStr(textParams.initWord, false, true, textParams.els[0]);
};

},{"./effects":1}]},{},[2]);
