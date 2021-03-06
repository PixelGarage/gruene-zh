// console.log shortcut
// https://github.com/hinderlingvolkart/Compass-RequireJS-Boilerplate
var log = function f() {
    log.history = log.history || [];
    log.history.push(arguments);
    if (this.console) {
        var args = arguments,
            newarr;
        args.callee = args.callee.caller;
        newarr = [].slice.call(args);
        if (typeof console.log === 'object') log.apply.call(console.log, console, newarr);
        else console.log.apply(console, newarr);
    }
};

// global settings
var globals = {
    'ltie9': false,
    'breakpoints': {
        'mobile': 767,
        'tablet': 1024,
        'small': 1280,
        'medium': 1440,
        'large': 1680,
        'currentBreakpoint': ''
    }
}