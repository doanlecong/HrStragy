/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 12);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (immutable) */ __webpack_exports__["d"] = toInt;
/* unused harmony export isString */
/* harmony export (immutable) */ __webpack_exports__["c"] = isObject;
/* unused harmony export isNumber */
/* harmony export (immutable) */ __webpack_exports__["b"] = isFunction;
/* unused harmony export isUndefined */
/* harmony export (immutable) */ __webpack_exports__["a"] = isArray;
/**
 * Converts value entered as number
 * or string to integer value.
 *
 * @param {String} value
 * @returns {Number}
 */
function toInt (value) {
  return parseInt(value)
}

/**
 * Indicates whether the specified value is a string.
 *
 * @param  {*}   value
 * @return {Boolean}
 */
function isString (value) {
  return typeof value === 'string'
}

/**
 * Indicates whether the specified value is an object.
 *
 * @param  {*} value
 * @return {Boolean}
 *
 * @see https://github.com/jashkenas/underscore
 */
function isObject (value) {
  let type = typeof value

  return type === 'function' || type === 'object' && !!value // eslint-disable-line no-mixed-operators
}

/**
 * Indicates whether the specified value is a number.
 *
 * @param  {*} value
 * @return {Boolean}
 */
function isNumber (value) {
  return typeof value === 'number'
}

/**
 * Indicates whether the specified value is a function.
 *
 * @param  {*} value
 * @return {Boolean}
 */
function isFunction (value) {
  return typeof value === 'function'
}

/**
 * Indicates whether the specified value is undefined.
 *
 * @param  {*} value
 * @return {Boolean}
 */
function isUndefined (value) {
  return typeof value === 'undefined'
}

/**
 * Indicates whether the specified value is an array.
 *
 * @param  {*} value
 * @return {Boolean}
 */
function isArray (value) {
  return value.constructor === Array
}


/***/ }),
/* 1 */,
/* 2 */,
/* 3 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (immutable) */ __webpack_exports__["a"] = warn;
/**
 * Outputs warning message to the bowser console.
 *
 * @param  {String} msg
 * @return {Void}
 */
function warn (msg) {
  console.error(`[Glide warn]: ${msg}`)
}


/***/ }),
/* 4 */,
/* 5 */,
/* 6 */,
/* 7 */,
/* 8 */,
/* 9 */,
/* 10 */,
/* 11 */,
/* 12 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(13);


/***/ }),
/* 13 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(14);

/***/ }),
/* 14 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__defaults__ = __webpack_require__(15);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__utils_log__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__core_index__ = __webpack_require__(16);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__utils_object__ = __webpack_require__(17);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__utils_unit__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__core_event_events_bus__ = __webpack_require__(18);








class Glide {
  /**
   * Construct glide.
   *
   * @param  {String} selector
   * @param  {Object} options
   */
  constructor (selector, options = {}) {
    this._c = {}
    this._e = new __WEBPACK_IMPORTED_MODULE_5__core_event_events_bus__["a" /* default */]()

    this.disabled = false
    this.selector = selector
    this.settings = Object(__WEBPACK_IMPORTED_MODULE_3__utils_object__["a" /* mergeOptions */])(__WEBPACK_IMPORTED_MODULE_0__defaults__["a" /* default */], options)
    this.index = this.settings.startAt
  }

  /**
   * Initializes glide.
   *
   * @param {Object} extensions Collection of extensions to initialize.
   * @return {Glide}
   */
  mount (extensions = {}) {
    this._e.emit('mount.before')

    if (Object(__WEBPACK_IMPORTED_MODULE_4__utils_unit__["c" /* isObject */])(extensions)) {
      this._c = Object(__WEBPACK_IMPORTED_MODULE_2__core_index__["a" /* mount */])(this, extensions, this._e)
    } else {
      Object(__WEBPACK_IMPORTED_MODULE_1__utils_log__["a" /* warn */])('You need to provide a object on `mount()`')
    }

    this._e.emit('mount.after')

    return this
  }

  /**
   * Updates glide with specified settings.
   *
   * @param {Object} settings
   * @return {Glide}
   */
  update (settings = {}) {
    this.settings = Object.assign({}, this.settings, settings)

    if (settings.hasOwnProperty('startAt')) {
      this.index = settings.startAt
    }

    this._e.emit('update')

    return this
  }

  /**
   * Change slide with specified pattern. A pattern must be in the special format:
   * `>` - Move one forward
   * `<` - Move one backward
   * `={i}` - Go to {i} zero-based slide (eq. '=1', will go to second slide)
   * `>>` - Rewinds to end (last slide)
   * `<<` - Rewinds to start (first slide)
   *
   * @param {String} pattern
   * @return {Glide}
   */
  go (pattern) {
    this._c.Run.make(pattern)

    return this
  }

  /**
   * Move track by specified distance.
   *
   * @param {String} distance
   * @return {Glide}
   */
  move (distance) {
    this._c.Transition.disable()
    this._c.Move.make(distance)

    return this
  }

  /**
   * Destroy instance and revert all changes done by this._c.
   *
   * @return {Glide}
   */
  destroy () {
    this._e.emit('destroy')

    return this
  }

  /**
   * Start instance autoplaying.
   *
   * @param {Boolean|Number} interval Run autoplaying with passed interval regardless of `autoplay` settings
   * @return {Glide}
   */
  play (interval = false) {
    if (interval) {
      this.settings.autoplay = interval
    }

    this._e.emit('play')

    return this
  }

  /**
   * Stop instance autoplaying.
   *
   * @return {Glide}
   */
  pause () {
    this._e.emit('pause')

    return this
  }

  /**
   * Sets glide into a idle status.
   *
   * @return {Glide}
   */
  disable () {
    this.disabled = true

    return this
  }

  /**
   * Sets glide into a active status.
   *
   * @return {Glide}
   */
  enable () {
    this.disabled = false

    return this
  }

  /**
   * Adds cuutom event listener with handler.
   *
   * @param  {String|Array} event
   * @param  {Function} handler
   * @return {Glide}
   */
  on (event, handler) {
    this._e.on(event, handler)

    return this
  }

  /**
   * Checks if glide is a precised type.
   *
   * @param  {String} name
   * @return {Boolean}
   */
  isType (name) {
    return this.settings.type === name
  }

  /**
   * Gets value of the core options.
   *
   * @return {Object}
   */
  get settings () {
    return this._o
  }

  /**
   * Sets value of the core options.
   *
   * @param  {Object} o
   * @return {Void}
   */
  set settings (o) {
    if (Object(__WEBPACK_IMPORTED_MODULE_4__utils_unit__["c" /* isObject */])(o)) {
      this._o = o
    } else {
      Object(__WEBPACK_IMPORTED_MODULE_1__utils_log__["a" /* warn */])('Options must be an `object` instance.')
    }
  }

  /**
   * Gets current index of the slider.
   *
   * @return {Object}
   */
  get index () {
    return this._i
  }

  /**
   * Sets current index a slider.
   *
   * @return {Object}
   */
  set index (i) {
    this._i = Object(__WEBPACK_IMPORTED_MODULE_4__utils_unit__["d" /* toInt */])(i)
  }

  /**
   * Gets type name of the slider.
   *
   * @return {String}
   */
  get type () {
    return this.settings.type
  }

  /**
   * Gets value of the idle status.
   *
   * @return {Boolean}
   */
  get disabled () {
    return this._d
  }

  /**
   * Sets value of the idle status.
   *
   * @return {Boolean}
   */
  set disabled (status) {
    this._d = !!status
  }
}
/* harmony export (immutable) */ __webpack_exports__["default"] = Glide;



/***/ }),
/* 15 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony default export */ __webpack_exports__["a"] = ({
  /**
   * Type of the movement.
   *
   * Available types:
   * `slider` - Rewinds slider to the start/end when it reaches the first or last slide.
   * `carousel` - Changes slides without starting over when it reaches the first or last slide.
   *
   * @type {String}
   */
  type: 'slider',

  /**
   * Start at specific slide number defined with zero-based index.
   *
   * @type {Number}
   */
  startAt: 0,

  /**
   * A number of slides visible on the single viewport.
   *
   * @type {Number}
   */
  perView: 1,

  /**
   * Focus currently active slide at a specified position in the track.
   *
   * Available inputs:
   * `center` - Current slide will be always focused at the center of a track.
   * `0,1,2,3...` - Current slide will be focused on the specified zero-based index.
   *
   * @type {String|Number}
   */
  focusAt: 0,

  /**
   * A size of the gap added between slides.
   *
   * @type {Number}
   */
  gap: 10,

  /**
   * Change slides after a specified interval. Use `false` for turning off autoplay.
   *
   * @type {Number|Boolean}
   */
  autoplay: false,

  /**
   * Stop autoplay on mouseover event.
   *
   * @type {Boolean}
   */
  hoverpause: true,

  /**
   * Allow for changing slides with left and right keyboard arrows.
   *
   * @type {Boolean}
   */
  keyboard: true,

  /**
   * Minimal swipe distance needed to change the slide. Use `false` for turning off a swiping.
   *
   * @type {Number|Boolean}
   */
  swipeThreshold: 80,

  /**
   * Minimal mouse drag distance needed to change the slide. Use `false` for turning off a dragging.
   *
   * @type {Number|Boolean}
   */
  dragThreshold: 120,

  /**
   * A maximum number of slides to which movement will be made on swiping or dragging. Use `false` for unlimited.
   *
   * @type {Number|Boolean}
   */
  perTouch: false,

  /**
   * Moving distance ratio of the slides on a swiping and dragging.
   *
   * @type {Number}
   */
  touchRatio: 0.5,

  /**
   * Angle required to activate slides moving on swiping or dragging.
   *
   * @type {Number}
   */
  touchAngle: 45,

  /**
   * Duration of the animation in milliseconds.
   *
   * @type {Number}
   */
  animationDuration: 400,

  /**
   * Duration of the rewinding animation of the `slider` type in milliseconds.
   *
   * @type {Number}
   */
  rewindDuration: 800,

  /**
   * Easing function for the animation.
   *
   * @type {String}
   */
  animationTimingFunc: 'cubic-bezier(0.165, 0.840, 0.440, 1.000)',

  /**
   * Throttle costly events at most once per every wait milliseconds.
   *
   * @type {Number}
   */
  throttle: 10,

  /**
   * Moving direction mode.
   *
   * Available inputs:
   * - 'ltr' - left to right movement,
   * - 'rtl' - right to left movement.
   *
   * @type {String}
   */
  direction: 'ltr',

  /**
   * The distance value of the next and previous viewports which
   * have to peek in the current view. Accepts number and
   * pixels as a string. Left and right peeking can be
   * set up separately with a directions object.
   *
   * For example:
   * `100` - Peek 100px on the both sides.
   * { before: 100, after: 50 }` - Peek 100px on the left side and 50px on the right side.
   *
   * @type {Number|String|Object}
   */
  peek: 0,

  /**
   * Collection of options applied at specified media breakpoints.
   * For example: display two slides per view under 800px.
   * `{
   *   '800px': {
   *     perView: 2
   *   }
   * }`
   */
  breakpoints: {},

  /**
   * Collection of internally used HTML classes.
   *
   * @todo Refactor `slider` and `carousel` properties to single `type: { slider: '', carousel: '' }` object
   * @type {Object}
   */
  classes: {
    direction: {
      ltr: 'glide--ltr',
      rtl: 'glide--rtl'
    },
    slider: 'glide--slider',
    carousel: 'glide--carousel',
    swipeable: 'glide--swipeable',
    dragging: 'glide--dragging',
    cloneSlide: 'glide__slide--clone',
    activeNav: 'glide__bullet--active',
    activeSlide: 'glide__slide--active',
    disabledArrow: 'glide__arrow--disabled'
  }
});


/***/ }),
/* 16 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (immutable) */ __webpack_exports__["a"] = mount;
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__utils_log__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__utils_unit__ = __webpack_require__(0);



/**
 * Creates and initializes specified collection of extensions.
 * Each extension receives access to instance of glide and rest of components.
 *
 * @param {Object} glide
 * @param {Object} extensions
 *
 * @returns {Object}
 */
function mount (glide, extensions, events) {
  let components = {}

  for (let name in extensions) {
    if (Object(__WEBPACK_IMPORTED_MODULE_1__utils_unit__["b" /* isFunction */])(extensions[name])) {
      components[name] = extensions[name](glide, components, events)
    } else {
      Object(__WEBPACK_IMPORTED_MODULE_0__utils_log__["a" /* warn */])('Extension must be a function')
    }
  }

  for (let name in components) {
    if (Object(__WEBPACK_IMPORTED_MODULE_1__utils_unit__["b" /* isFunction */])(components[name].mount)) {
      components[name].mount()
    }
  }

  return components
}


/***/ }),
/* 17 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* unused harmony export define */
/* unused harmony export sortKeys */
/* harmony export (immutable) */ __webpack_exports__["a"] = mergeOptions;
/**
 * Defines getter and setter property on the specified object.
 *
 * @param  {Object} obj         Object where property has to be defined.
 * @param  {String} prop        Name of the defined property.
 * @param  {Object} definition  Get and set definitions for the property.
 * @return {Void}
 */
function define (obj, prop, definition) {
  Object.defineProperty(obj, prop, definition)
}

/**
 * Sorts aphabetically object keys.
 *
 * @param  {Object} obj
 * @return {Object}
 */
function sortKeys (obj) {
  return Object.keys(obj).sort().reduce((r, k) => {
    r[k] = obj[k]

    return (r[k], r)
  }, {})
}

/**
 * Merges passed settings object with default options.
 *
 * @param  {Object} defaults
 * @param  {Object} settings
 * @return {Object}
 */
function mergeOptions (defaults, settings) {
  let options = Object.assign({}, defaults, settings)

  // `Object.assign` do not deeply merge objects, so we
  // have to do it manually for every nested object
  // in options. Although it does not look smart,
  // it's smaller and faster than some fancy
  // merging deep-merge algorithm script.
  if (settings.hasOwnProperty('classes')) {
    options.classes = Object.assign({}, defaults.classes, settings.classes)

    if (settings.classes.hasOwnProperty('direction')) {
      options.classes.direction = Object.assign({}, defaults.classes.direction, settings.classes.direction)
    }
  }

  return options
}


/***/ }),
/* 18 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__utils_unit__ = __webpack_require__(0);


class EventsBus {
  /**
   * Construct a EventBus instance.
   *
   * @param {Object} events
   */
  constructor (events = {}) {
    this.events = events
    this.hop = events.hasOwnProperty
  }

  /**
   * Adds listener to the specifed event.
   *
   * @param {String|Array} event
   * @param {Function} handler
   */
  on (event, handler) {
    if (Object(__WEBPACK_IMPORTED_MODULE_0__utils_unit__["a" /* isArray */])(event)) {
      for (let i = 0; i < event.length; i++) {
        this.on(event[i], handler)
      }
    }

    // Create the event's object if not yet created
    if (!this.hop.call(this.events, event)) {
      this.events[event] = []
    }

    // Add the handler to queue
    var index = this.events[event].push(handler) - 1

    // Provide handle back for removal of event
    return {
      remove () {
        delete this.events[event][index]
      }
    }
  }

  /**
   * Runs registered handlers for specified event.
   *
   * @param {String|Array} event
   * @param {Object=} context
   */
  emit (event, context) {
    if (Object(__WEBPACK_IMPORTED_MODULE_0__utils_unit__["a" /* isArray */])(event)) {
      for (let i = 0; i < event.length; i++) {
        this.emit(event[i], context)
      }
    }

    // If the event doesn't exist, or there's no handlers in queue, just leave
    if (!this.hop.call(this.events, event)) {
      return
    }

    // Cycle through events queue, fire!
    this.events[event].forEach((item) => {
      item(context || {})
    })
  }
}
/* harmony export (immutable) */ __webpack_exports__["a"] = EventsBus;



/***/ })
/******/ ]);