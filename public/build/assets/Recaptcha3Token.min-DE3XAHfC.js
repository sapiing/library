var g=(i,a)=>()=>(a||i((a={exports:{}}).exports,a),a.exports);var w=g((h,d)=>{(function(i,a){typeof h=="object"&&typeof d<"u"?d.exports=a():typeof define=="function"&&define.amd?define(a):(i=typeof globalThis<"u"?globalThis:i||self,i.FormValidation=i.FormValidation||{},i.FormValidation.plugins=i.FormValidation.plugins||{},i.FormValidation.plugins.Recaptcha3Token=a())})(void 0,function(){function i(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function a(t,e){for(var r=0;r<e.length;r++){var o=e[r];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(t,o.key,o)}}function y(t,e,r){return e&&a(t.prototype,e),Object.defineProperty(t,"prototype",{writable:!1}),t}function m(t,e){if(typeof e!="function"&&e!==null)throw new TypeError("Super expression must either be null or a function");t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,writable:!0,configurable:!0}}),Object.defineProperty(t,"prototype",{writable:!1}),e&&l(t,e)}function f(t){return f=Object.setPrototypeOf?Object.getPrototypeOf.bind():function(r){return r.__proto__||Object.getPrototypeOf(r)},f(t)}function l(t,e){return l=Object.setPrototypeOf?Object.setPrototypeOf.bind():function(o,n){return o.__proto__=n,o},l(t,e)}function _(){if(typeof Reflect>"u"||!Reflect.construct||Reflect.construct.sham)return!1;if(typeof Proxy=="function")return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],function(){})),!0}catch{return!1}}function s(t){if(t===void 0)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}function v(t,e){if(e&&(typeof e=="object"||typeof e=="function"))return e;if(e!==void 0)throw new TypeError("Derived constructors may only return object or undefined");return s(t)}function b(t){var e=_();return function(){var o=f(t),n;if(e){var u=f(this).constructor;n=Reflect.construct(o,arguments,u)}else n=o.apply(this,arguments);return v(this,n)}}var O=FormValidation.Plugin,p=function(t){m(r,t);var e=b(r);function r(o){var n;return i(this,r),n=e.call(this,o),n.opts=Object.assign({},{action:"submit",hiddenTokenName:"___hidden-token___"},o),n.onValidHandler=n.onFormValid.bind(s(n)),n}return y(r,[{key:"install",value:function(){this.core.on("core.form.valid",this.onValidHandler),this.hiddenTokenEle=document.createElement("input"),this.hiddenTokenEle.setAttribute("type","hidden"),this.core.getFormElement().appendChild(this.hiddenTokenEle);var n=typeof window[r.LOADED_CALLBACK]>"u"?function(){}:window[r.LOADED_CALLBACK];window[r.LOADED_CALLBACK]=function(){n()};var u=this.getScript();if(!document.body.querySelector('script[src="'.concat(u,'"]'))){var c=document.createElement("script");c.type="text/javascript",c.async=!0,c.defer=!0,c.src=u,document.body.appendChild(c)}}},{key:"uninstall",value:function(){this.core.off("core.form.valid",this.onValidHandler);var n=this.getScript(),u=[].slice.call(document.body.querySelectorAll('script[src="'.concat(n,'"]')));u.forEach(function(c){return c.parentNode.removeChild(c)}),this.core.getFormElement().removeChild(this.hiddenTokenEle)}},{key:"onFormValid",value:function(){var n=this;window.grecaptcha.execute(this.opts.siteKey,{action:this.opts.action}).then(function(u){n.hiddenTokenEle.setAttribute("name",n.opts.hiddenTokenName),n.hiddenTokenEle.value=u;var c=n.core.getFormElement();c instanceof HTMLFormElement&&c.submit()})}},{key:"getScript",value:function(){var n=this.opts.language?"&hl=".concat(this.opts.language):"";return"https://www.google.com/recaptcha/api.js?"+"onload=".concat(r.LOADED_CALLBACK,"&render=").concat(this.opts.siteKey).concat(n)}}]),r}(O);return p.LOADED_CALLBACK="___reCaptcha3Loaded___",p})});export default w();