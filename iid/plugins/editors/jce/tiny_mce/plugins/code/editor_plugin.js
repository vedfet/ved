(function(){var each=tinymce.each;tinymce.create('tinymce.plugins.CodePlugin',{init:function(ed,url){var t=this;t.editor=ed;t.url=url;ed.onPreInit.add(function(){if(ed.getParam('code_javascript')){ed.serializer.addRules('script[src|charset|defer|type|xml::space]')}if(ed.getParam('code_css')){ed.serializer.addRules('style[type|media|dir|lang|xml::lang]')}ed.serializer.addRules('@[_php]')});ed.onInit.add(function(){ed.dom.loadCSS(url+"/css/content.css")});ed.onBeforeSetContent.add(function(ed,o){if(/<(\?|script|style)/.test(o.content)){if(!ed.getParam('code_javascript')){o.content=o.content.replace(/<script[^>]*>([\s\S]*?)<\/script>/gi,'')}if(!ed.getParam('code_css')){o.content=o.content.replace(/<style[^>]*>([\s\S]*?)<\/style>/gi,'')}if(!ed.getParam('code_php')){o.content=o.content.replace(/<\?(php)?([\s\S]*?)\?>/gi,'')}o.content=o.content.replace(/\="([^"]+?)"/g,function(a,b){if(/<\?(php)?/.test(b)){b=ed.dom.encode(b)}return'="'+b+'"'});if(/<textarea/.test(o.content)){o.content=o.content.replace(/<textarea([^>]*)>([\s\S]*?)<\/textarea>/gi,function(a,b,c){if(/<\?(php)?/.test(c)){c=ed.dom.encode(c)}return'<textarea'+b+'>'+c+'</textarea>'})}o.content=o.content.replace(/<(script|style)([^>]+)>([\s\S]*?)<\/(script|style)>/gi,function(v,a,b,c){a=a.toUpperCase();c=t._trim(c);c=c.replace(/<\?(php)?([\s\S]+?)\?>/gi,'<span class="mcePHP">$2</span>');b=b.replace(/(language="[a-z]+")/gi,'');return'<span '+b+' class="mce'+a+'"><!--'+a+c+a+'--></span>'});o.content=o.content.replace(/<([^>]+)<\?(php)?(.+?)\?>([^>]*?)>/gi,function(a,b,c,d,e){if(b.charAt(b.length)!==' '){b+=' '}return'<'+b+'_php="'+d+'" '+e+'>'});o.content=o.content.replace(/<\?(php)?([\s\S]+?)\?>/gi,'<span class="mcePHP"><!--PHP$2PHP--></span>')}});ed.onSetContent.add(function(ed,o){var dom=ed.dom;each(dom.select('span.mceSCRIPT, span.mceSTYLE',ed.getBody()),function(n){if(!n.title){t._serializeSpan(n)}})});ed.onPreProcess.add(function(ed,o){var dom=ed.dom;if(o.set){each(dom.select('span.mceSCRIPT, span.mceSTYLE',o.node),function(n){if(!n.title){t._serializeSpan(n)}})}if(o.get){each(dom.select('span.mceSCRIPT',o.node),function(n){t._buildScript(n)});each(dom.select('span.mceSTYLE',o.node),function(n){t._buildStyle(n)});each(dom.select('span.mcePHP',o.node),function(n){n.removeAttribute('_mce_type')})}});function getAttr(s,n){n=new RegExp(n+'=\"([^\"]+)\"','g').exec(s);return n?ed.dom.decode(n[1]):''};ed.onPostProcess.add(function(ed,o){if(o.get){o.content=o.content.replace(/<span([^>]+)>([\s\S]+?)<\/span>/g,function(n,attribs,h){if(/(class="mceSCRIPT")/.test(attribs)){h=h.replace(/<!--SCRIPT([\s\S]*?)SCRIPT-->/,'$1');return ed.dom.createHTML('script',t._parse(getAttr(attribs,'title')),h)}if(/(class="mceSTYLE")/.test(attribs)){h=h.replace(/<!--STYLE([\s\S]*?)STYLE-->/,'$1');return ed.dom.createHTML('style',t._parse(getAttr(attribs,'title')),h)}return n});if(/mcePHP/.test(o.content)){o.content=o.content.replace(/&lt;span class="mcePHP"&gt;([^"]+)&lt;\/span&gt;/g,function(a,b,c,d,e){return t._decode(a)});o.content=o.content.replace(/"(.*?)&lt;\?(php)?([^"]+)\?&gt;(.*?)"/g,function(a,b,c,d,e){return'"'+b+'<?php'+t._decode(d)+'?>'+e+'"'});o.content=o.content.replace(/<textarea([^>]*)>([\s\S]*?)<\/textarea>/gi,function(a,b,c){if(/&lt;\?php/.test(c)){c=t._decode(c)}return'<textarea'+b+'>'+c+'</textarea>'});o.content=o.content.replace(/_php="([^"]+?)"/g,function(a,b){return'<?php'+t._decode(b)+'?>'});o.content=o.content.replace(/<span class="mcePHP">(<!--PHP)?([\s\S]*?)(PHP-->)?<\/span>/g,function(a,b,c,d){return'<?php'+t._decode(c)+'?>'})}if(/<(script|style)/.test(o.content)){o.content=o.content.replace(/<(script|style)([^>]+)>([\s\S]*?)<\/(script|style)>/g,function(a,b,c,d){d=t._trim(d);d=d.replace(/&nbsp;/g,' ');d=t._decode(d);if(d&&/\S*/.test(d)){if(d&&ed.getParam('code_cdata',false)){if(b=='style'){d='\n<!--\n'+d+'\n-->\n'}else{d='\n// <![CDATA[\n'+d+'\n// ]]>\n'}}else{d='\n'+d+'\n'}}return'<'+b+c+'>'+d+'</'+b+'>'})}}})},_buildScript:function(n){var t=this,ed=this.editor,dom=ed.dom,ob,h,p=this._parse(n.title);p.type='text/javascript';if(p.src){p.src=p.src.replace(/&amp;/g,'&')}h=n.innerHTML.replace(/<!--SCRIPT([\s\S]*?)SCRIPT-->/,function(a,b){return b});n.removeAttribute('_mce_type');if(!tinymce.isIE){o=dom.create('script',p,t._decode(h));dom.replace(o,n)}return true},_buildStyle:function(n){var t=this,ed=this.editor,dom=ed.dom,ob,p=this._parse(n.title),h;p.type='text/css';h=n.innerHTML.replace(/<!--STYLE([\s\S]*?)STYLE-->/,function(a,b){return b});n.removeAttribute('_mce_type');try{o=dom.create('style',p,t._decode(h));dom.replace(o,n)}catch(e){}return true},_serializeSpan:function(n){var t=this,ed=this.editor,dom=ed.dom,v,k,p={};each(['src','charset','defer','type','xml:space','media'],function(k){v=dom.getAttrib(n,k);if(v){p[k]=t._encode(v)}n.removeAttribute(k)});n.removeAttribute('_mce_src');dom.setAttrib(n,'title',this._serialize(p))},_parse:function(s){return tinymce.util.JSON.parse('{'+s+'}')},_serialize:function(o){return tinymce.util.JSON.serialize(o).replace(/[{}]/g,'').replace(/"/g,"'")},_decode:function(s){return s.replace(/&lt;/g,'<').replace(/&gt;/g,'>').replace(/&amp;/g,'&').replace(/&quot;/g,'"')},_encode:function(s){s=s.replace(/&amp;/g,'&');return this.editor.dom.encode(s)},_trim:function(s){s=s.replace(/(\/\/\s+<!\[CDATA\[)/gi,'\n');s=s.replace(/(<!--\[CDATA\[|\]\]-->)/gi,'\n');s=s.replace(/^[\r\n]*|[\r\n]*$/g,'');s=s.replace(/^\s*(\/\/\s*<!--|\/\/\s*<!\[CDATA\[|<!--|<!\[CDATA\[)[\r\n]*/gi,'');s=s.replace(/\s*(\/\/\s*\]\]>|\/\/\s*-->|\]\]>|-->|\]\]-->)\s*$/g,'');return s},getInfo:function(){return{longname:'Code',author:'Ryan Demmer',authorurl:'http://www.joomlacontenteditor.net',infourl:'http://www.joomlacontenteditor.net',version:'1.5.7.6'}}});tinymce.PluginManager.add('code',tinymce.plugins.CodePlugin)})();