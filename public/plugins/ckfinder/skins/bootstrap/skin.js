﻿/*
Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
For licensing, see license.txt or http://cksource.com/license/ckfinder
*/

(function(){function a(c,d,e){var f=c.querySelectorAll(d);if(!f)return;for(var g=0;g<f.length;++g)e.call(f[g]);};CKFINDER.skins.add('bootstrap',(function(){return{application:{css:['app.css']},host:{intoHostPage:1,css:['host.css']},heightAdjust:50,init:function(c){c.config.fileIconsExt='png';c.on('appReady',function(){var d=c.document.$,e=d.dir==='rtl';if(!e)d.querySelector('#toolbar_view .cke_toolbar').classList.add('col-md-10');d.querySelector('.cke_search_box').classList.add('col-md-2',e?'pull-left':'pull-right');var f=d.querySelector('.cke_search_box input');f.classList.add('form-control');f.setAttribute('placeholder',c.lang.Search.searchPlaceholder+'...');});}};})());CKFINDER.dialog?b():CKFINDER.on('dialogPluginReady',b);function b(){CKFINDER.dialog.on('resize',function(c){var d=c.data,e=d.width,f=d.height,g=d.dialog,h=g.parts.contents;if(d.skin!='bootstrap')return;h.setStyles({width:e+'px',height:f+'px'});setTimeout(function(){var i=g.parts.dialog.getChild([0,0,0]),j=i.getChild(0),k=i.getChild(2);k.setStyle('width',j.$.offsetWidth+'px');k=i.getChild(7);k.setStyle('width',j.$.offsetWidth-28+'px');k=i.getChild(4);k.setStyle('height',j.$.offsetHeight-31-14+'px');k=i.getChild(5);k.setStyle('height',j.$.offsetHeight-31-14+'px');var l=g._.element.$;a(l,'input[type="text"]',function(){this.classList.add('form-control');});a(l,'a.cke_dialog_ui_button',function(){var m=this.classList;m.add('btn');if(m.contains('cke_dialog_ui_button_ok'))m.add('btn-success');else if(m.contains('cke_dialog_ui_button_cancel'))m.add('btn-danger');else m.add('btn-default');});},100);});};})();
