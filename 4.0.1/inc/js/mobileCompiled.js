(function(window,undefined){var
readyList,rootjQuery,core_strundefined=typeof undefined,document=window.document,location=window.location,_jQuery=window.jQuery,_$=window.$,class2type={},core_deletedIds=[],core_version="1.9.1",core_concat=core_deletedIds.concat,core_push=core_deletedIds.push,core_slice=core_deletedIds.slice,core_indexOf=core_deletedIds.indexOf,core_toString=class2type.toString,core_hasOwn=class2type.hasOwnProperty,core_trim=core_version.trim,jQuery=function(selector,context){return new jQuery.fn.init(selector,context,rootjQuery);},core_pnum=/[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,core_rnotwhite=/\S+/g,rtrim=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,rquickExpr=/^(?:(<[\w\W]+>)[^>]*|#([\w-]*))$/,rsingleTag=/^<(\w+)\s*\/?>(?:<\/\1>|)$/,rvalidchars=/^[\],:{}\s]*$/,rvalidbraces=/(?:^|:|,)(?:\s*\[)+/g,rvalidescape=/\\(?:["\\\/bfnrt]|u[\da-fA-F]{4})/g,rvalidtokens=/"[^"\\\r\n]*"|true|false|null|-?(?:\d+\.|)\d+(?:[eE][+-]?\d+|)/g,rmsPrefix=/^-ms-/,rdashAlpha=/-([\da-z])/gi,fcamelCase=function(all,letter){return letter.toUpperCase();},completed=function(event){if(document.addEventListener||event.type==="load"||document.readyState==="complete"){detach();jQuery.ready();}},detach=function(){if(document.addEventListener){document.removeEventListener("DOMContentLoaded",completed,false);window.removeEventListener("load",completed,false);}else{document.detachEvent("onreadystatechange",completed);window.detachEvent("onload",completed);}};jQuery.fn=jQuery.prototype={jquery:core_version,constructor:jQuery,init:function(selector,context,rootjQuery){var match,elem;if(!selector){return this;}
if(typeof selector==="string"){if(selector.charAt(0)==="<"&&selector.charAt(selector.length-1)===">"&&selector.length>=3){match=[null,selector,null];}else{match=rquickExpr.exec(selector);}
if(match&&(match[1]||!context)){if(match[1]){context=context instanceof jQuery?context[0]:context;jQuery.merge(this,jQuery.parseHTML(match[1],context&&context.nodeType?context.ownerDocument||context:document,true));if(rsingleTag.test(match[1])&&jQuery.isPlainObject(context)){for(match in context){if(jQuery.isFunction(this[match])){this[match](context[match]);}else{this.attr(match,context[match]);}}}
return this;}else{elem=document.getElementById(match[2]);if(elem&&elem.parentNode){if(elem.id!==match[2]){return rootjQuery.find(selector);}
this.length=1;this[0]=elem;}
this.context=document;this.selector=selector;return this;}}else if(!context||context.jquery){return(context||rootjQuery).find(selector);}else{return this.constructor(context).find(selector);}}else if(selector.nodeType){this.context=this[0]=selector;this.length=1;return this;}else if(jQuery.isFunction(selector)){return rootjQuery.ready(selector);}
if(selector.selector!==undefined){this.selector=selector.selector;this.context=selector.context;}
return jQuery.makeArray(selector,this);},selector:"",length:0,size:function(){return this.length;},toArray:function(){return core_slice.call(this);},get:function(num){return num==null?this.toArray():(num<0?this[this.length+num]:this[num]);},pushStack:function(elems){var ret=jQuery.merge(this.constructor(),elems);ret.prevObject=this;ret.context=this.context;return ret;},each:function(callback,args){return jQuery.each(this,callback,args);},ready:function(fn){jQuery.ready.promise().done(fn);return this;},slice:function(){return this.pushStack(core_slice.apply(this,arguments));},first:function(){return this.eq(0);},last:function(){return this.eq(-1);},eq:function(i){var len=this.length,j=+i+(i<0?len:0);return this.pushStack(j>=0&&j<len?[this[j]]:[]);},map:function(callback){return this.pushStack(jQuery.map(this,function(elem,i){return callback.call(elem,i,elem);}));},end:function(){return this.prevObject||this.constructor(null);},push:core_push,sort:[].sort,splice:[].splice};jQuery.fn.init.prototype=jQuery.fn;jQuery.extend=jQuery.fn.extend=function(){var src,copyIsArray,copy,name,options,clone,target=arguments[0]||{},i=1,length=arguments.length,deep=false;if(typeof target==="boolean"){deep=target;target=arguments[1]||{};i=2;}
if(typeof target!=="object"&&!jQuery.isFunction(target)){target={};}
if(length===i){target=this;--i;}
for(;i<length;i++){if((options=arguments[i])!=null){for(name in options){src=target[name];copy=options[name];if(target===copy){continue;}
if(deep&&copy&&(jQuery.isPlainObject(copy)||(copyIsArray=jQuery.isArray(copy)))){if(copyIsArray){copyIsArray=false;clone=src&&jQuery.isArray(src)?src:[];}else{clone=src&&jQuery.isPlainObject(src)?src:{};}
target[name]=jQuery.extend(deep,clone,copy);}else if(copy!==undefined){target[name]=copy;}}}}
return target;};jQuery.extend({noConflict:function(deep){if(window.$===jQuery){window.$=_$;}
if(deep&&window.jQuery===jQuery){window.jQuery=_jQuery;}
return jQuery;},isReady:false,readyWait:1,holdReady:function(hold){if(hold){jQuery.readyWait++;}else{jQuery.ready(true);}},ready:function(wait){if(wait===true?--jQuery.readyWait:jQuery.isReady){return;}
if(!document.body){return setTimeout(jQuery.ready);}
jQuery.isReady=true;if(wait!==true&&--jQuery.readyWait>0){return;}
readyList.resolveWith(document,[jQuery]);if(jQuery.fn.trigger){jQuery(document).trigger("ready").off("ready");}},isFunction:function(obj){return jQuery.type(obj)==="function";},isArray:Array.isArray||function(obj){return jQuery.type(obj)==="array";},isWindow:function(obj){return obj!=null&&obj==obj.window;},isNumeric:function(obj){return!isNaN(parseFloat(obj))&&isFinite(obj);},type:function(obj){if(obj==null){return String(obj);}
return typeof obj==="object"||typeof obj==="function"?class2type[core_toString.call(obj)]||"object":typeof obj;},isPlainObject:function(obj){if(!obj||jQuery.type(obj)!=="object"||obj.nodeType||jQuery.isWindow(obj)){return false;}
try{if(obj.constructor&&!core_hasOwn.call(obj,"constructor")&&!core_hasOwn.call(obj.constructor.prototype,"isPrototypeOf")){return false;}}catch(e){return false;}
var key;for(key in obj){}
return key===undefined||core_hasOwn.call(obj,key);},isEmptyObject:function(obj){var name;for(name in obj){return false;}
return true;},error:function(msg){throw new Error(msg);},parseHTML:function(data,context,keepScripts){if(!data||typeof data!=="string"){return null;}
if(typeof context==="boolean"){keepScripts=context;context=false;}
context=context||document;var parsed=rsingleTag.exec(data),scripts=!keepScripts&&[];if(parsed){return[context.createElement(parsed[1])];}
parsed=jQuery.buildFragment([data],context,scripts);if(scripts){jQuery(scripts).remove();}
return jQuery.merge([],parsed.childNodes);},parseJSON:function(data){if(window.JSON&&window.JSON.parse){return window.JSON.parse(data);}
if(data===null){return data;}
if(typeof data==="string"){data=jQuery.trim(data);if(data){if(rvalidchars.test(data.replace(rvalidescape,"@").replace(rvalidtokens,"]").replace(rvalidbraces,""))){return(new Function("return "+data))();}}}
jQuery.error("Invalid JSON: "+data);},parseXML:function(data){var xml,tmp;if(!data||typeof data!=="string"){return null;}
try{if(window.DOMParser){tmp=new DOMParser();xml=tmp.parseFromString(data,"text/xml");}else{xml=new ActiveXObject("Microsoft.XMLDOM");xml.async="false";xml.loadXML(data);}}catch(e){xml=undefined;}
if(!xml||!xml.documentElement||xml.getElementsByTagName("parsererror").length){jQuery.error("Invalid XML: "+data);}
return xml;},noop:function(){},globalEval:function(data){if(data&&jQuery.trim(data)){(window.execScript||function(data){window["eval"].call(window,data);})(data);}},camelCase:function(string){return string.replace(rmsPrefix,"ms-").replace(rdashAlpha,fcamelCase);},nodeName:function(elem,name){return elem.nodeName&&elem.nodeName.toLowerCase()===name.toLowerCase();},each:function(obj,callback,args){var value,i=0,length=obj.length,isArray=isArraylike(obj);if(args){if(isArray){for(;i<length;i++){value=callback.apply(obj[i],args);if(value===false){break;}}}else{for(i in obj){value=callback.apply(obj[i],args);if(value===false){break;}}}}else{if(isArray){for(;i<length;i++){value=callback.call(obj[i],i,obj[i]);if(value===false){break;}}}else{for(i in obj){value=callback.call(obj[i],i,obj[i]);if(value===false){break;}}}}
return obj;},trim:core_trim&&!core_trim.call("\uFEFF\xA0")?function(text){return text==null?"":core_trim.call(text);}:function(text){return text==null?"":(text+"").replace(rtrim,"");},makeArray:function(arr,results){var ret=results||[];if(arr!=null){if(isArraylike(Object(arr))){jQuery.merge(ret,typeof arr==="string"?[arr]:arr);}else{core_push.call(ret,arr);}}
return ret;},inArray:function(elem,arr,i){var len;if(arr){if(core_indexOf){return core_indexOf.call(arr,elem,i);}
len=arr.length;i=i?i<0?Math.max(0,len+i):i:0;for(;i<len;i++){if(i in arr&&arr[i]===elem){return i;}}}
return-1;},merge:function(first,second){var l=second.length,i=first.length,j=0;if(typeof l==="number"){for(;j<l;j++){first[i++]=second[j];}}else{while(second[j]!==undefined){first[i++]=second[j++];}}
first.length=i;return first;},grep:function(elems,callback,inv){var retVal,ret=[],i=0,length=elems.length;inv=!!inv;for(;i<length;i++){retVal=!!callback(elems[i],i);if(inv!==retVal){ret.push(elems[i]);}}
return ret;},map:function(elems,callback,arg){var value,i=0,length=elems.length,isArray=isArraylike(elems),ret=[];if(isArray){for(;i<length;i++){value=callback(elems[i],i,arg);if(value!=null){ret[ret.length]=value;}}}else{for(i in elems){value=callback(elems[i],i,arg);if(value!=null){ret[ret.length]=value;}}}
return core_concat.apply([],ret);},guid:1,proxy:function(fn,context){var args,proxy,tmp;if(typeof context==="string"){tmp=fn[context];context=fn;fn=tmp;}
if(!jQuery.isFunction(fn)){return undefined;}
args=core_slice.call(arguments,2);proxy=function(){return fn.apply(context||this,args.concat(core_slice.call(arguments)));};proxy.guid=fn.guid=fn.guid||jQuery.guid++;return proxy;},access:function(elems,fn,key,value,chainable,emptyGet,raw){var i=0,length=elems.length,bulk=key==null;if(jQuery.type(key)==="object"){chainable=true;for(i in key){jQuery.access(elems,fn,i,key[i],true,emptyGet,raw);}}else if(value!==undefined){chainable=true;if(!jQuery.isFunction(value)){raw=true;}
if(bulk){if(raw){fn.call(elems,value);fn=null;}else{bulk=fn;fn=function(elem,key,value){return bulk.call(jQuery(elem),value);};}}
if(fn){for(;i<length;i++){fn(elems[i],key,raw?value:value.call(elems[i],i,fn(elems[i],key)));}}}
return chainable?elems:bulk?fn.call(elems):length?fn(elems[0],key):emptyGet;},now:function(){return(new Date()).getTime();}});jQuery.ready.promise=function(obj){if(!readyList){readyList=jQuery.Deferred();if(document.readyState==="complete"){setTimeout(jQuery.ready);}else if(document.addEventListener){document.addEventListener("DOMContentLoaded",completed,false);window.addEventListener("load",completed,false);}else{document.attachEvent("onreadystatechange",completed);window.attachEvent("onload",completed);var top=false;try{top=window.frameElement==null&&document.documentElement;}catch(e){}
if(top&&top.doScroll){(function doScrollCheck(){if(!jQuery.isReady){try{top.doScroll("left");}catch(e){return setTimeout(doScrollCheck,50);}
detach();jQuery.ready();}})();}}}
return readyList.promise(obj);};jQuery.each("Boolean Number String Function Array Date RegExp Object Error".split(" "),function(i,name){class2type["[object "+name+"]"]=name.toLowerCase();});function isArraylike(obj){var length=obj.length,type=jQuery.type(obj);if(jQuery.isWindow(obj)){return false;}
if(obj.nodeType===1&&length){return true;}
return type==="array"||type!=="function"&&(length===0||typeof length==="number"&&length>0&&(length-1)in obj);}
rootjQuery=jQuery(document);var optionsCache={};function createOptions(options){var object=optionsCache[options]={};jQuery.each(options.match(core_rnotwhite)||[],function(_,flag){object[flag]=true;});return object;}
jQuery.Callbacks=function(options){options=typeof options==="string"?(optionsCache[options]||createOptions(options)):jQuery.extend({},options);var
firing,memory,fired,firingLength,firingIndex,firingStart,list=[],stack=!options.once&&[],fire=function(data){memory=options.memory&&data;fired=true;firingIndex=firingStart||0;firingStart=0;firingLength=list.length;firing=true;for(;list&&firingIndex<firingLength;firingIndex++){if(list[firingIndex].apply(data[0],data[1])===false&&options.stopOnFalse){memory=false;break;}}
firing=false;if(list){if(stack){if(stack.length){fire(stack.shift());}}else if(memory){list=[];}else{self.disable();}}},self={add:function(){if(list){var start=list.length;(function add(args){jQuery.each(args,function(_,arg){var type=jQuery.type(arg);if(type==="function"){if(!options.unique||!self.has(arg)){list.push(arg);}}else if(arg&&arg.length&&type!=="string"){add(arg);}});})(arguments);if(firing){firingLength=list.length;}else if(memory){firingStart=start;fire(memory);}}
return this;},remove:function(){if(list){jQuery.each(arguments,function(_,arg){var index;while((index=jQuery.inArray(arg,list,index))>-1){list.splice(index,1);if(firing){if(index<=firingLength){firingLength--;}
if(index<=firingIndex){firingIndex--;}}}});}
return this;},has:function(fn){return fn?jQuery.inArray(fn,list)>-1:!!(list&&list.length);},empty:function(){list=[];return this;},disable:function(){list=stack=memory=undefined;return this;},disabled:function(){return!list;},lock:function(){stack=undefined;if(!memory){self.disable();}
return this;},locked:function(){return!stack;},fireWith:function(context,args){args=args||[];args=[context,args.slice?args.slice():args];if(list&&(!fired||stack)){if(firing){stack.push(args);}else{fire(args);}}
return this;},fire:function(){self.fireWith(this,arguments);return this;},fired:function(){return!!fired;}};return self;};jQuery.extend({Deferred:function(func){var tuples=[["resolve","done",jQuery.Callbacks("once memory"),"resolved"],["reject","fail",jQuery.Callbacks("once memory"),"rejected"],["notify","progress",jQuery.Callbacks("memory")]],state="pending",promise={state:function(){return state;},always:function(){deferred.done(arguments).fail(arguments);return this;},then:function(){var fns=arguments;return jQuery.Deferred(function(newDefer){jQuery.each(tuples,function(i,tuple){var action=tuple[0],fn=jQuery.isFunction(fns[i])&&fns[i];deferred[tuple[1]](function(){var returned=fn&&fn.apply(this,arguments);if(returned&&jQuery.isFunction(returned.promise)){returned.promise().done(newDefer.resolve).fail(newDefer.reject).progress(newDefer.notify);}else{newDefer[action+"With"](this===promise?newDefer.promise():this,fn?[returned]:arguments);}});});fns=null;}).promise();},promise:function(obj){return obj!=null?jQuery.extend(obj,promise):promise;}},deferred={};promise.pipe=promise.then;jQuery.each(tuples,function(i,tuple){var list=tuple[2],stateString=tuple[3];promise[tuple[1]]=list.add;if(stateString){list.add(function(){state=stateString;},tuples[i^1][2].disable,tuples[2][2].lock);}
deferred[tuple[0]]=function(){deferred[tuple[0]+"With"](this===deferred?promise:this,arguments);return this;};deferred[tuple[0]+"With"]=list.fireWith;});promise.promise(deferred);if(func){func.call(deferred,deferred);}
return deferred;},when:function(subordinate){var i=0,resolveValues=core_slice.call(arguments),length=resolveValues.length,remaining=length!==1||(subordinate&&jQuery.isFunction(subordinate.promise))?length:0,deferred=remaining===1?subordinate:jQuery.Deferred(),updateFunc=function(i,contexts,values){return function(value){contexts[i]=this;values[i]=arguments.length>1?core_slice.call(arguments):value;if(values===progressValues){deferred.notifyWith(contexts,values);}else if(!(--remaining)){deferred.resolveWith(contexts,values);}};},progressValues,progressContexts,resolveContexts;if(length>1){progressValues=new Array(length);progressContexts=new Array(length);resolveContexts=new Array(length);for(;i<length;i++){if(resolveValues[i]&&jQuery.isFunction(resolveValues[i].promise)){resolveValues[i].promise().done(updateFunc(i,resolveContexts,resolveValues)).fail(deferred.reject).progress(updateFunc(i,progressContexts,progressValues));}else{--remaining;}}}
if(!remaining){deferred.resolveWith(resolveContexts,resolveValues);}
return deferred.promise();}});jQuery.support=(function(){var support,all,a,input,select,fragment,opt,eventName,isSupported,i,div=document.createElement("div");div.setAttribute("className","t");div.innerHTML="  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>";all=div.getElementsByTagName("*");a=div.getElementsByTagName("a")[0];if(!all||!a||!all.length){return{};}
select=document.createElement("select");opt=select.appendChild(document.createElement("option"));input=div.getElementsByTagName("input")[0];a.style.cssText="top:1px;float:left;opacity:.5";support={getSetAttribute:div.className!=="t",leadingWhitespace:div.firstChild.nodeType===3,tbody:!div.getElementsByTagName("tbody").length,htmlSerialize:!!div.getElementsByTagName("link").length,style:/top/.test(a.getAttribute("style")),hrefNormalized:a.getAttribute("href")==="/a",opacity:/^0.5/.test(a.style.opacity),cssFloat:!!a.style.cssFloat,checkOn:!!input.value,optSelected:opt.selected,enctype:!!document.createElement("form").enctype,html5Clone:document.createElement("nav").cloneNode(true).outerHTML!=="<:nav></:nav>",boxModel:document.compatMode==="CSS1Compat",deleteExpando:true,noCloneEvent:true,inlineBlockNeedsLayout:false,shrinkWrapBlocks:false,reliableMarginRight:true,boxSizingReliable:true,pixelPosition:false};input.checked=true;support.noCloneChecked=input.cloneNode(true).checked;select.disabled=true;support.optDisabled=!opt.disabled;try{delete div.test;}catch(e){support.deleteExpando=false;}
input=document.createElement("input");input.setAttribute("value","");support.input=input.getAttribute("value")==="";input.value="t";input.setAttribute("type","radio");support.radioValue=input.value==="t";input.setAttribute("checked","t");input.setAttribute("name","t");fragment=document.createDocumentFragment();fragment.appendChild(input);support.appendChecked=input.checked;support.checkClone=fragment.cloneNode(true).cloneNode(true).lastChild.checked;if(div.attachEvent){div.attachEvent("onclick",function(){support.noCloneEvent=false;});div.cloneNode(true).click();}
for(i in{submit:true,change:true,focusin:true}){div.setAttribute(eventName="on"+i,"t");support[i+"Bubbles"]=eventName in window||div.attributes[eventName].expando===false;}
div.style.backgroundClip="content-box";div.cloneNode(true).style.backgroundClip="";support.clearCloneStyle=div.style.backgroundClip==="content-box";jQuery(function(){var container,marginDiv,tds,divReset="padding:0;margin:0;border:0;display:block;box-sizing:content-box;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;",body=document.getElementsByTagName("body")[0];if(!body){return;}
container=document.createElement("div");container.style.cssText="border:0;width:0;height:0;position:absolute;top:0;left:-9999px;margin-top:1px";body.appendChild(container).appendChild(div);div.innerHTML="<table><tr><td></td><td>t</td></tr></table>";tds=div.getElementsByTagName("td");tds[0].style.cssText="padding:0;margin:0;border:0;display:none";isSupported=(tds[0].offsetHeight===0);tds[0].style.display="";tds[1].style.display="none";support.reliableHiddenOffsets=isSupported&&(tds[0].offsetHeight===0);div.innerHTML="";div.style.cssText="box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;padding:1px;border:1px;display:block;width:4px;margin-top:1%;position:absolute;top:1%;";support.boxSizing=(div.offsetWidth===4);support.doesNotIncludeMarginInBodyOffset=(body.offsetTop!==1);if(window.getComputedStyle){support.pixelPosition=(window.getComputedStyle(div,null)||{}).top!=="1%";support.boxSizingReliable=(window.getComputedStyle(div,null)||{width:"4px"}).width==="4px";marginDiv=div.appendChild(document.createElement("div"));marginDiv.style.cssText=div.style.cssText=divReset;marginDiv.style.marginRight=marginDiv.style.width="0";div.style.width="1px";support.reliableMarginRight=!parseFloat((window.getComputedStyle(marginDiv,null)||{}).marginRight);}
if(typeof div.style.zoom!==core_strundefined){div.innerHTML="";div.style.cssText=divReset+"width:1px;padding:1px;display:inline;zoom:1";support.inlineBlockNeedsLayout=(div.offsetWidth===3);div.style.display="block";div.innerHTML="<div></div>";div.firstChild.style.width="5px";support.shrinkWrapBlocks=(div.offsetWidth!==3);if(support.inlineBlockNeedsLayout){body.style.zoom=1;}}
body.removeChild(container);container=div=tds=marginDiv=null;});all=select=fragment=opt=a=input=null;return support;})();var rbrace=/(?:\{[\s\S]*\}|\[[\s\S]*\])$/,rmultiDash=/([A-Z])/g;function internalData(elem,name,data,pvt){if(!jQuery.acceptData(elem)){return;}
var thisCache,ret,internalKey=jQuery.expando,getByName=typeof name==="string",isNode=elem.nodeType,cache=isNode?jQuery.cache:elem,id=isNode?elem[internalKey]:elem[internalKey]&&internalKey;if((!id||!cache[id]||(!pvt&&!cache[id].data))&&getByName&&data===undefined){return;}
if(!id){if(isNode){elem[internalKey]=id=core_deletedIds.pop()||jQuery.guid++;}else{id=internalKey;}}
if(!cache[id]){cache[id]={};if(!isNode){cache[id].toJSON=jQuery.noop;}}
if(typeof name==="object"||typeof name==="function"){if(pvt){cache[id]=jQuery.extend(cache[id],name);}else{cache[id].data=jQuery.extend(cache[id].data,name);}}
thisCache=cache[id];if(!pvt){if(!thisCache.data){thisCache.data={};}
thisCache=thisCache.data;}
if(data!==undefined){thisCache[jQuery.camelCase(name)]=data;}
if(getByName){ret=thisCache[name];if(ret==null){ret=thisCache[jQuery.camelCase(name)];}}else{ret=thisCache;}
return ret;}
function internalRemoveData(elem,name,pvt){if(!jQuery.acceptData(elem)){return;}
var i,l,thisCache,isNode=elem.nodeType,cache=isNode?jQuery.cache:elem,id=isNode?elem[jQuery.expando]:jQuery.expando;if(!cache[id]){return;}
if(name){thisCache=pvt?cache[id]:cache[id].data;if(thisCache){if(!jQuery.isArray(name)){if(name in thisCache){name=[name];}else{name=jQuery.camelCase(name);if(name in thisCache){name=[name];}else{name=name.split(" ");}}}else{name=name.concat(jQuery.map(name,jQuery.camelCase));}
for(i=0,l=name.length;i<l;i++){delete thisCache[name[i]];}
if(!(pvt?isEmptyDataObject:jQuery.isEmptyObject)(thisCache)){return;}}}
if(!pvt){delete cache[id].data;if(!isEmptyDataObject(cache[id])){return;}}
if(isNode){jQuery.cleanData([elem],true);}else if(jQuery.support.deleteExpando||cache!=cache.window){delete cache[id];}else{cache[id]=null;}}
jQuery.extend({cache:{},expando:"jQuery"+(core_version+Math.random()).replace(/\D/g,""),noData:{"embed":true,"object":"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000","applet":true},hasData:function(elem){elem=elem.nodeType?jQuery.cache[elem[jQuery.expando]]:elem[jQuery.expando];return!!elem&&!isEmptyDataObject(elem);},data:function(elem,name,data){return internalData(elem,name,data);},removeData:function(elem,name){return internalRemoveData(elem,name);},_data:function(elem,name,data){return internalData(elem,name,data,true);},_removeData:function(elem,name){return internalRemoveData(elem,name,true);},acceptData:function(elem){if(elem.nodeType&&elem.nodeType!==1&&elem.nodeType!==9){return false;}
var noData=elem.nodeName&&jQuery.noData[elem.nodeName.toLowerCase()];return!noData||noData!==true&&elem.getAttribute("classid")===noData;}});jQuery.fn.extend({data:function(key,value){var attrs,name,elem=this[0],i=0,data=null;if(key===undefined){if(this.length){data=jQuery.data(elem);if(elem.nodeType===1&&!jQuery._data(elem,"parsedAttrs")){attrs=elem.attributes;for(;i<attrs.length;i++){name=attrs[i].name;if(!name.indexOf("data-")){name=jQuery.camelCase(name.slice(5));dataAttr(elem,name,data[name]);}}
jQuery._data(elem,"parsedAttrs",true);}}
return data;}
if(typeof key==="object"){return this.each(function(){jQuery.data(this,key);});}
return jQuery.access(this,function(value){if(value===undefined){return elem?dataAttr(elem,key,jQuery.data(elem,key)):null;}
this.each(function(){jQuery.data(this,key,value);});},null,value,arguments.length>1,null,true);},removeData:function(key){return this.each(function(){jQuery.removeData(this,key);});}});function dataAttr(elem,key,data){if(data===undefined&&elem.nodeType===1){var name="data-"+key.replace(rmultiDash,"-$1").toLowerCase();data=elem.getAttribute(name);if(typeof data==="string"){try{data=data==="true"?true:data==="false"?false:data==="null"?null:+data+""===data?+data:rbrace.test(data)?jQuery.parseJSON(data):data;}catch(e){}
jQuery.data(elem,key,data);}else{data=undefined;}}
return data;}
function isEmptyDataObject(obj){var name;for(name in obj){if(name==="data"&&jQuery.isEmptyObject(obj[name])){continue;}
if(name!=="toJSON"){return false;}}
return true;}
jQuery.extend({queue:function(elem,type,data){var queue;if(elem){type=(type||"fx")+"queue";queue=jQuery._data(elem,type);if(data){if(!queue||jQuery.isArray(data)){queue=jQuery._data(elem,type,jQuery.makeArray(data));}else{queue.push(data);}}
return queue||[];}},dequeue:function(elem,type){type=type||"fx";var queue=jQuery.queue(elem,type),startLength=queue.length,fn=queue.shift(),hooks=jQuery._queueHooks(elem,type),next=function(){jQuery.dequeue(elem,type);};if(fn==="inprogress"){fn=queue.shift();startLength--;}
hooks.cur=fn;if(fn){if(type==="fx"){queue.unshift("inprogress");}
delete hooks.stop;fn.call(elem,next,hooks);}
if(!startLength&&hooks){hooks.empty.fire();}},_queueHooks:function(elem,type){var key=type+"queueHooks";return jQuery._data(elem,key)||jQuery._data(elem,key,{empty:jQuery.Callbacks("once memory").add(function(){jQuery._removeData(elem,type+"queue");jQuery._removeData(elem,key);})});}});jQuery.fn.extend({queue:function(type,data){var setter=2;if(typeof type!=="string"){data=type;type="fx";setter--;}
if(arguments.length<setter){return jQuery.queue(this[0],type);}
return data===undefined?this:this.each(function(){var queue=jQuery.queue(this,type,data);jQuery._queueHooks(this,type);if(type==="fx"&&queue[0]!=="inprogress"){jQuery.dequeue(this,type);}});},dequeue:function(type){return this.each(function(){jQuery.dequeue(this,type);});},delay:function(time,type){time=jQuery.fx?jQuery.fx.speeds[time]||time:time;type=type||"fx";return this.queue(type,function(next,hooks){var timeout=setTimeout(next,time);hooks.stop=function(){clearTimeout(timeout);};});},clearQueue:function(type){return this.queue(type||"fx",[]);},promise:function(type,obj){var tmp,count=1,defer=jQuery.Deferred(),elements=this,i=this.length,resolve=function(){if(!(--count)){defer.resolveWith(elements,[elements]);}};if(typeof type!=="string"){obj=type;type=undefined;}
type=type||"fx";while(i--){tmp=jQuery._data(elements[i],type+"queueHooks");if(tmp&&tmp.empty){count++;tmp.empty.add(resolve);}}
resolve();return defer.promise(obj);}});var nodeHook,boolHook,rclass=/[\t\r\n]/g,rreturn=/\r/g,rfocusable=/^(?:input|select|textarea|button|object)$/i,rclickable=/^(?:a|area)$/i,rboolean=/^(?:checked|selected|autofocus|autoplay|async|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped)$/i,ruseDefault=/^(?:checked|selected)$/i,getSetAttribute=jQuery.support.getSetAttribute,getSetInput=jQuery.support.input;jQuery.fn.extend({attr:function(name,value){return jQuery.access(this,jQuery.attr,name,value,arguments.length>1);},removeAttr:function(name){return this.each(function(){jQuery.removeAttr(this,name);});},prop:function(name,value){return jQuery.access(this,jQuery.prop,name,value,arguments.length>1);},removeProp:function(name){name=jQuery.propFix[name]||name;return this.each(function(){try{this[name]=undefined;delete this[name];}catch(e){}});},addClass:function(value){var classes,elem,cur,clazz,j,i=0,len=this.length,proceed=typeof value==="string"&&value;if(jQuery.isFunction(value)){return this.each(function(j){jQuery(this).addClass(value.call(this,j,this.className));});}
if(proceed){classes=(value||"").match(core_rnotwhite)||[];for(;i<len;i++){elem=this[i];cur=elem.nodeType===1&&(elem.className?(" "+elem.className+" ").replace(rclass," "):" ");if(cur){j=0;while((clazz=classes[j++])){if(cur.indexOf(" "+clazz+" ")<0){cur+=clazz+" ";}}
elem.className=jQuery.trim(cur);}}}
return this;},removeClass:function(value){var classes,elem,cur,clazz,j,i=0,len=this.length,proceed=arguments.length===0||typeof value==="string"&&value;if(jQuery.isFunction(value)){return this.each(function(j){jQuery(this).removeClass(value.call(this,j,this.className));});}
if(proceed){classes=(value||"").match(core_rnotwhite)||[];for(;i<len;i++){elem=this[i];cur=elem.nodeType===1&&(elem.className?(" "+elem.className+" ").replace(rclass," "):"");if(cur){j=0;while((clazz=classes[j++])){while(cur.indexOf(" "+clazz+" ")>=0){cur=cur.replace(" "+clazz+" "," ");}}
elem.className=value?jQuery.trim(cur):"";}}}
return this;},toggleClass:function(value,stateVal){var type=typeof value,isBool=typeof stateVal==="boolean";if(jQuery.isFunction(value)){return this.each(function(i){jQuery(this).toggleClass(value.call(this,i,this.className,stateVal),stateVal);});}
return this.each(function(){if(type==="string"){var className,i=0,self=jQuery(this),state=stateVal,classNames=value.match(core_rnotwhite)||[];while((className=classNames[i++])){state=isBool?state:!self.hasClass(className);self[state?"addClass":"removeClass"](className);}}else if(type===core_strundefined||type==="boolean"){if(this.className){jQuery._data(this,"__className__",this.className);}
this.className=this.className||value===false?"":jQuery._data(this,"__className__")||"";}});},hasClass:function(selector){var className=" "+selector+" ",i=0,l=this.length;for(;i<l;i++){if(this[i].nodeType===1&&(" "+this[i].className+" ").replace(rclass," ").indexOf(className)>=0){return true;}}
return false;},val:function(value){var ret,hooks,isFunction,elem=this[0];if(!arguments.length){if(elem){hooks=jQuery.valHooks[elem.type]||jQuery.valHooks[elem.nodeName.toLowerCase()];if(hooks&&"get"in hooks&&(ret=hooks.get(elem,"value"))!==undefined){return ret;}
ret=elem.value;return typeof ret==="string"?ret.replace(rreturn,""):ret==null?"":ret;}
return;}
isFunction=jQuery.isFunction(value);return this.each(function(i){var val,self=jQuery(this);if(this.nodeType!==1){return;}
if(isFunction){val=value.call(this,i,self.val());}else{val=value;}
if(val==null){val="";}else if(typeof val==="number"){val+="";}else if(jQuery.isArray(val)){val=jQuery.map(val,function(value){return value==null?"":value+"";});}
hooks=jQuery.valHooks[this.type]||jQuery.valHooks[this.nodeName.toLowerCase()];if(!hooks||!("set"in hooks)||hooks.set(this,val,"value")===undefined){this.value=val;}});}});jQuery.extend({valHooks:{option:{get:function(elem){var val=elem.attributes.value;return!val||val.specified?elem.value:elem.text;}},select:{get:function(elem){var value,option,options=elem.options,index=elem.selectedIndex,one=elem.type==="select-one"||index<0,values=one?null:[],max=one?index+1:options.length,i=index<0?max:one?index:0;for(;i<max;i++){option=options[i];if((option.selected||i===index)&&(jQuery.support.optDisabled?!option.disabled:option.getAttribute("disabled")===null)&&(!option.parentNode.disabled||!jQuery.nodeName(option.parentNode,"optgroup"))){value=jQuery(option).val();if(one){return value;}
values.push(value);}}
return values;},set:function(elem,value){var values=jQuery.makeArray(value);jQuery(elem).find("option").each(function(){this.selected=jQuery.inArray(jQuery(this).val(),values)>=0;});if(!values.length){elem.selectedIndex=-1;}
return values;}}},attr:function(elem,name,value){var hooks,notxml,ret,nType=elem.nodeType;if(!elem||nType===3||nType===8||nType===2){return;}
if(typeof elem.getAttribute===core_strundefined){return jQuery.prop(elem,name,value);}
notxml=nType!==1||!jQuery.isXMLDoc(elem);if(notxml){name=name.toLowerCase();hooks=jQuery.attrHooks[name]||(rboolean.test(name)?boolHook:nodeHook);}
if(value!==undefined){if(value===null){jQuery.removeAttr(elem,name);}else if(hooks&&notxml&&"set"in hooks&&(ret=hooks.set(elem,value,name))!==undefined){return ret;}else{elem.setAttribute(name,value+"");return value;}}else if(hooks&&notxml&&"get"in hooks&&(ret=hooks.get(elem,name))!==null){return ret;}else{if(typeof elem.getAttribute!==core_strundefined){ret=elem.getAttribute(name);}
return ret==null?undefined:ret;}},removeAttr:function(elem,value){var name,propName,i=0,attrNames=value&&value.match(core_rnotwhite);if(attrNames&&elem.nodeType===1){while((name=attrNames[i++])){propName=jQuery.propFix[name]||name;if(rboolean.test(name)){if(!getSetAttribute&&ruseDefault.test(name)){elem[jQuery.camelCase("default-"+name)]=elem[propName]=false;}else{elem[propName]=false;}}else{jQuery.attr(elem,name,"");}
elem.removeAttribute(getSetAttribute?name:propName);}}},attrHooks:{type:{set:function(elem,value){if(!jQuery.support.radioValue&&value==="radio"&&jQuery.nodeName(elem,"input")){var val=elem.value;elem.setAttribute("type",value);if(val){elem.value=val;}
return value;}}}},propFix:{tabindex:"tabIndex",readonly:"readOnly","for":"htmlFor","class":"className",maxlength:"maxLength",cellspacing:"cellSpacing",cellpadding:"cellPadding",rowspan:"rowSpan",colspan:"colSpan",usemap:"useMap",frameborder:"frameBorder",contenteditable:"contentEditable"},prop:function(elem,name,value){var ret,hooks,notxml,nType=elem.nodeType;if(!elem||nType===3||nType===8||nType===2){return;}
notxml=nType!==1||!jQuery.isXMLDoc(elem);if(notxml){name=jQuery.propFix[name]||name;hooks=jQuery.propHooks[name];}
if(value!==undefined){if(hooks&&"set"in hooks&&(ret=hooks.set(elem,value,name))!==undefined){return ret;}else{return(elem[name]=value);}}else{if(hooks&&"get"in hooks&&(ret=hooks.get(elem,name))!==null){return ret;}else{return elem[name];}}},propHooks:{tabIndex:{get:function(elem){var attributeNode=elem.getAttributeNode("tabindex");return attributeNode&&attributeNode.specified?parseInt(attributeNode.value,10):rfocusable.test(elem.nodeName)||rclickable.test(elem.nodeName)&&elem.href?0:undefined;}}}});boolHook={get:function(elem,name){var
prop=jQuery.prop(elem,name),attr=typeof prop==="boolean"&&elem.getAttribute(name),detail=typeof prop==="boolean"?getSetInput&&getSetAttribute?attr!=null:ruseDefault.test(name)?elem[jQuery.camelCase("default-"+name)]:!!attr:elem.getAttributeNode(name);return detail&&detail.value!==false?name.toLowerCase():undefined;},set:function(elem,value,name){if(value===false){jQuery.removeAttr(elem,name);}else if(getSetInput&&getSetAttribute||!ruseDefault.test(name)){elem.setAttribute(!getSetAttribute&&jQuery.propFix[name]||name,name);}else{elem[jQuery.camelCase("default-"+name)]=elem[name]=true;}
return name;}};if(!getSetInput||!getSetAttribute){jQuery.attrHooks.value={get:function(elem,name){var ret=elem.getAttributeNode(name);return jQuery.nodeName(elem,"input")?elem.defaultValue:ret&&ret.specified?ret.value:undefined;},set:function(elem,value,name){if(jQuery.nodeName(elem,"input")){elem.defaultValue=value;}else{return nodeHook&&nodeHook.set(elem,value,name);}}};}
if(!getSetAttribute){nodeHook=jQuery.valHooks.button={get:function(elem,name){var ret=elem.getAttributeNode(name);return ret&&(name==="id"||name==="name"||name==="coords"?ret.value!=="":ret.specified)?ret.value:undefined;},set:function(elem,value,name){var ret=elem.getAttributeNode(name);if(!ret){elem.setAttributeNode((ret=elem.ownerDocument.createAttribute(name)));}
ret.value=value+="";return name==="value"||value===elem.getAttribute(name)?value:undefined;}};jQuery.attrHooks.contenteditable={get:nodeHook.get,set:function(elem,value,name){nodeHook.set(elem,value===""?false:value,name);}};jQuery.each(["width","height"],function(i,name){jQuery.attrHooks[name]=jQuery.extend(jQuery.attrHooks[name],{set:function(elem,value){if(value===""){elem.setAttribute(name,"auto");return value;}}});});}
if(!jQuery.support.hrefNormalized){jQuery.each(["href","src","width","height"],function(i,name){jQuery.attrHooks[name]=jQuery.extend(jQuery.attrHooks[name],{get:function(elem){var ret=elem.getAttribute(name,2);return ret==null?undefined:ret;}});});jQuery.each(["href","src"],function(i,name){jQuery.propHooks[name]={get:function(elem){return elem.getAttribute(name,4);}};});}
if(!jQuery.support.style){jQuery.attrHooks.style={get:function(elem){return elem.style.cssText||undefined;},set:function(elem,value){return(elem.style.cssText=value+"");}};}
if(!jQuery.support.optSelected){jQuery.propHooks.selected=jQuery.extend(jQuery.propHooks.selected,{get:function(elem){var parent=elem.parentNode;if(parent){parent.selectedIndex;if(parent.parentNode){parent.parentNode.selectedIndex;}}
return null;}});}
if(!jQuery.support.enctype){jQuery.propFix.enctype="encoding";}
if(!jQuery.support.checkOn){jQuery.each(["radio","checkbox"],function(){jQuery.valHooks[this]={get:function(elem){return elem.getAttribute("value")===null?"on":elem.value;}};});}
jQuery.each(["radio","checkbox"],function(){jQuery.valHooks[this]=jQuery.extend(jQuery.valHooks[this],{set:function(elem,value){if(jQuery.isArray(value)){return(elem.checked=jQuery.inArray(jQuery(elem).val(),value)>=0);}}});});var rformElems=/^(?:input|select|textarea)$/i,rkeyEvent=/^key/,rmouseEvent=/^(?:mouse|contextmenu)|click/,rfocusMorph=/^(?:focusinfocus|focusoutblur)$/,rtypenamespace=/^([^.]*)(?:\.(.+)|)$/;function returnTrue(){return true;}
function returnFalse(){return false;}
jQuery.event={global:{},add:function(elem,types,handler,data,selector){var tmp,events,t,handleObjIn,special,eventHandle,handleObj,handlers,type,namespaces,origType,elemData=jQuery._data(elem);if(!elemData){return;}
if(handler.handler){handleObjIn=handler;handler=handleObjIn.handler;selector=handleObjIn.selector;}
if(!handler.guid){handler.guid=jQuery.guid++;}
if(!(events=elemData.events)){events=elemData.events={};}
if(!(eventHandle=elemData.handle)){eventHandle=elemData.handle=function(e){return typeof jQuery!==core_strundefined&&(!e||jQuery.event.triggered!==e.type)?jQuery.event.dispatch.apply(eventHandle.elem,arguments):undefined;};eventHandle.elem=elem;}
types=(types||"").match(core_rnotwhite)||[""];t=types.length;while(t--){tmp=rtypenamespace.exec(types[t])||[];type=origType=tmp[1];namespaces=(tmp[2]||"").split(".").sort();special=jQuery.event.special[type]||{};type=(selector?special.delegateType:special.bindType)||type;special=jQuery.event.special[type]||{};handleObj=jQuery.extend({type:type,origType:origType,data:data,handler:handler,guid:handler.guid,selector:selector,needsContext:selector&&jQuery.expr.match.needsContext.test(selector),namespace:namespaces.join(".")},handleObjIn);if(!(handlers=events[type])){handlers=events[type]=[];handlers.delegateCount=0;if(!special.setup||special.setup.call(elem,data,namespaces,eventHandle)===false){if(elem.addEventListener){elem.addEventListener(type,eventHandle,false);}else if(elem.attachEvent){elem.attachEvent("on"+type,eventHandle);}}}
if(special.add){special.add.call(elem,handleObj);if(!handleObj.handler.guid){handleObj.handler.guid=handler.guid;}}
if(selector){handlers.splice(handlers.delegateCount++,0,handleObj);}else{handlers.push(handleObj);}
jQuery.event.global[type]=true;}
elem=null;},remove:function(elem,types,handler,selector,mappedTypes){var j,handleObj,tmp,origCount,t,events,special,handlers,type,namespaces,origType,elemData=jQuery.hasData(elem)&&jQuery._data(elem);if(!elemData||!(events=elemData.events)){return;}
types=(types||"").match(core_rnotwhite)||[""];t=types.length;while(t--){tmp=rtypenamespace.exec(types[t])||[];type=origType=tmp[1];namespaces=(tmp[2]||"").split(".").sort();if(!type){for(type in events){jQuery.event.remove(elem,type+types[t],handler,selector,true);}
continue;}
special=jQuery.event.special[type]||{};type=(selector?special.delegateType:special.bindType)||type;handlers=events[type]||[];tmp=tmp[2]&&new RegExp("(^|\\.)"+namespaces.join("\\.(?:.*\\.|)")+"(\\.|$)");origCount=j=handlers.length;while(j--){handleObj=handlers[j];if((mappedTypes||origType===handleObj.origType)&&(!handler||handler.guid===handleObj.guid)&&(!tmp||tmp.test(handleObj.namespace))&&(!selector||selector===handleObj.selector||selector==="**"&&handleObj.selector)){handlers.splice(j,1);if(handleObj.selector){handlers.delegateCount--;}
if(special.remove){special.remove.call(elem,handleObj);}}}
if(origCount&&!handlers.length){if(!special.teardown||special.teardown.call(elem,namespaces,elemData.handle)===false){jQuery.removeEvent(elem,type,elemData.handle);}
delete events[type];}}
if(jQuery.isEmptyObject(events)){delete elemData.handle;jQuery._removeData(elem,"events");}},trigger:function(event,data,elem,onlyHandlers){var handle,ontype,cur,bubbleType,special,tmp,i,eventPath=[elem||document],type=core_hasOwn.call(event,"type")?event.type:event,namespaces=core_hasOwn.call(event,"namespace")?event.namespace.split("."):[];cur=tmp=elem=elem||document;if(elem.nodeType===3||elem.nodeType===8){return;}
if(rfocusMorph.test(type+jQuery.event.triggered)){return;}
if(type.indexOf(".")>=0){namespaces=type.split(".");type=namespaces.shift();namespaces.sort();}
ontype=type.indexOf(":")<0&&"on"+type;event=event[jQuery.expando]?event:new jQuery.Event(type,typeof event==="object"&&event);event.isTrigger=true;event.namespace=namespaces.join(".");event.namespace_re=event.namespace?new RegExp("(^|\\.)"+namespaces.join("\\.(?:.*\\.|)")+"(\\.|$)"):null;event.result=undefined;if(!event.target){event.target=elem;}
data=data==null?[event]:jQuery.makeArray(data,[event]);special=jQuery.event.special[type]||{};if(!onlyHandlers&&special.trigger&&special.trigger.apply(elem,data)===false){return;}
if(!onlyHandlers&&!special.noBubble&&!jQuery.isWindow(elem)){bubbleType=special.delegateType||type;if(!rfocusMorph.test(bubbleType+type)){cur=cur.parentNode;}
for(;cur;cur=cur.parentNode){eventPath.push(cur);tmp=cur;}
if(tmp===(elem.ownerDocument||document)){eventPath.push(tmp.defaultView||tmp.parentWindow||window);}}
i=0;while((cur=eventPath[i++])&&!event.isPropagationStopped()){event.type=i>1?bubbleType:special.bindType||type;handle=(jQuery._data(cur,"events")||{})[event.type]&&jQuery._data(cur,"handle");if(handle){handle.apply(cur,data);}
handle=ontype&&cur[ontype];if(handle&&jQuery.acceptData(cur)&&handle.apply&&handle.apply(cur,data)===false){event.preventDefault();}}
event.type=type;if(!onlyHandlers&&!event.isDefaultPrevented()){if((!special._default||special._default.apply(elem.ownerDocument,data)===false)&&!(type==="click"&&jQuery.nodeName(elem,"a"))&&jQuery.acceptData(elem)){if(ontype&&elem[type]&&!jQuery.isWindow(elem)){tmp=elem[ontype];if(tmp){elem[ontype]=null;}
jQuery.event.triggered=type;try{elem[type]();}catch(e){}
jQuery.event.triggered=undefined;if(tmp){elem[ontype]=tmp;}}}}
return event.result;},dispatch:function(event){event=jQuery.event.fix(event);var i,ret,handleObj,matched,j,handlerQueue=[],args=core_slice.call(arguments),handlers=(jQuery._data(this,"events")||{})[event.type]||[],special=jQuery.event.special[event.type]||{};args[0]=event;event.delegateTarget=this;if(special.preDispatch&&special.preDispatch.call(this,event)===false){return;}
handlerQueue=jQuery.event.handlers.call(this,event,handlers);i=0;while((matched=handlerQueue[i++])&&!event.isPropagationStopped()){event.currentTarget=matched.elem;j=0;while((handleObj=matched.handlers[j++])&&!event.isImmediatePropagationStopped()){if(!event.namespace_re||event.namespace_re.test(handleObj.namespace)){event.handleObj=handleObj;event.data=handleObj.data;ret=((jQuery.event.special[handleObj.origType]||{}).handle||handleObj.handler).apply(matched.elem,args);if(ret!==undefined){if((event.result=ret)===false){event.preventDefault();event.stopPropagation();}}}}}
if(special.postDispatch){special.postDispatch.call(this,event);}
return event.result;},handlers:function(event,handlers){var sel,handleObj,matches,i,handlerQueue=[],delegateCount=handlers.delegateCount,cur=event.target;if(delegateCount&&cur.nodeType&&(!event.button||event.type!=="click")){for(;cur!=this;cur=cur.parentNode||this){if(cur.nodeType===1&&(cur.disabled!==true||event.type!=="click")){matches=[];for(i=0;i<delegateCount;i++){handleObj=handlers[i];sel=handleObj.selector+" ";if(matches[sel]===undefined){matches[sel]=handleObj.needsContext?jQuery(sel,this).index(cur)>=0:jQuery.find(sel,this,null,[cur]).length;}
if(matches[sel]){matches.push(handleObj);}}
if(matches.length){handlerQueue.push({elem:cur,handlers:matches});}}}}
if(delegateCount<handlers.length){handlerQueue.push({elem:this,handlers:handlers.slice(delegateCount)});}
return handlerQueue;},fix:function(event){if(event[jQuery.expando]){return event;}
var i,prop,copy,type=event.type,originalEvent=event,fixHook=this.fixHooks[type];if(!fixHook){this.fixHooks[type]=fixHook=rmouseEvent.test(type)?this.mouseHooks:rkeyEvent.test(type)?this.keyHooks:{};}
copy=fixHook.props?this.props.concat(fixHook.props):this.props;event=new jQuery.Event(originalEvent);i=copy.length;while(i--){prop=copy[i];event[prop]=originalEvent[prop];}
if(!event.target){event.target=originalEvent.srcElement||document;}
if(event.target.nodeType===3){event.target=event.target.parentNode;}
event.metaKey=!!event.metaKey;return fixHook.filter?fixHook.filter(event,originalEvent):event;},props:"altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),fixHooks:{},keyHooks:{props:"char charCode key keyCode".split(" "),filter:function(event,original){if(event.which==null){event.which=original.charCode!=null?original.charCode:original.keyCode;}
return event;}},mouseHooks:{props:"button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),filter:function(event,original){var body,eventDoc,doc,button=original.button,fromElement=original.fromElement;if(event.pageX==null&&original.clientX!=null){eventDoc=event.target.ownerDocument||document;doc=eventDoc.documentElement;body=eventDoc.body;event.pageX=original.clientX+(doc&&doc.scrollLeft||body&&body.scrollLeft||0)-(doc&&doc.clientLeft||body&&body.clientLeft||0);event.pageY=original.clientY+(doc&&doc.scrollTop||body&&body.scrollTop||0)-(doc&&doc.clientTop||body&&body.clientTop||0);}
if(!event.relatedTarget&&fromElement){event.relatedTarget=fromElement===event.target?original.toElement:fromElement;}
if(!event.which&&button!==undefined){event.which=(button&1?1:(button&2?3:(button&4?2:0)));}
return event;}},special:{load:{noBubble:true},click:{trigger:function(){if(jQuery.nodeName(this,"input")&&this.type==="checkbox"&&this.click){this.click();return false;}}},focus:{trigger:function(){if(this!==document.activeElement&&this.focus){try{this.focus();return false;}catch(e){}}},delegateType:"focusin"},blur:{trigger:function(){if(this===document.activeElement&&this.blur){this.blur();return false;}},delegateType:"focusout"},beforeunload:{postDispatch:function(event){if(event.result!==undefined){event.originalEvent.returnValue=event.result;}}}},simulate:function(type,elem,event,bubble){var e=jQuery.extend(new jQuery.Event(),event,{type:type,isSimulated:true,originalEvent:{}});if(bubble){jQuery.event.trigger(e,null,elem);}else{jQuery.event.dispatch.call(elem,e);}
if(e.isDefaultPrevented()){event.preventDefault();}}};jQuery.removeEvent=document.removeEventListener?function(elem,type,handle){if(elem.removeEventListener){elem.removeEventListener(type,handle,false);}}:function(elem,type,handle){var name="on"+type;if(elem.detachEvent){if(typeof elem[name]===core_strundefined){elem[name]=null;}
elem.detachEvent(name,handle);}};jQuery.Event=function(src,props){if(!(this instanceof jQuery.Event)){return new jQuery.Event(src,props);}
if(src&&src.type){this.originalEvent=src;this.type=src.type;this.isDefaultPrevented=(src.defaultPrevented||src.returnValue===false||src.getPreventDefault&&src.getPreventDefault())?returnTrue:returnFalse;}else{this.type=src;}
if(props){jQuery.extend(this,props);}
this.timeStamp=src&&src.timeStamp||jQuery.now();this[jQuery.expando]=true;};jQuery.Event.prototype={isDefaultPrevented:returnFalse,isPropagationStopped:returnFalse,isImmediatePropagationStopped:returnFalse,preventDefault:function(){var e=this.originalEvent;this.isDefaultPrevented=returnTrue;if(!e){return;}
if(e.preventDefault){e.preventDefault();}else{e.returnValue=false;}},stopPropagation:function(){var e=this.originalEvent;this.isPropagationStopped=returnTrue;if(!e){return;}
if(e.stopPropagation){e.stopPropagation();}
e.cancelBubble=true;},stopImmediatePropagation:function(){this.isImmediatePropagationStopped=returnTrue;this.stopPropagation();}};jQuery.each({mouseenter:"mouseover",mouseleave:"mouseout"},function(orig,fix){jQuery.event.special[orig]={delegateType:fix,bindType:fix,handle:function(event){var ret,target=this,related=event.relatedTarget,handleObj=event.handleObj;if(!related||(related!==target&&!jQuery.contains(target,related))){event.type=handleObj.origType;ret=handleObj.handler.apply(this,arguments);event.type=fix;}
return ret;}};});if(!jQuery.support.submitBubbles){jQuery.event.special.submit={setup:function(){if(jQuery.nodeName(this,"form")){return false;}
jQuery.event.add(this,"click._submit keypress._submit",function(e){var elem=e.target,form=jQuery.nodeName(elem,"input")||jQuery.nodeName(elem,"button")?elem.form:undefined;if(form&&!jQuery._data(form,"submitBubbles")){jQuery.event.add(form,"submit._submit",function(event){event._submit_bubble=true;});jQuery._data(form,"submitBubbles",true);}});},postDispatch:function(event){if(event._submit_bubble){delete event._submit_bubble;if(this.parentNode&&!event.isTrigger){jQuery.event.simulate("submit",this.parentNode,event,true);}}},teardown:function(){if(jQuery.nodeName(this,"form")){return false;}
jQuery.event.remove(this,"._submit");}};}
if(!jQuery.support.changeBubbles){jQuery.event.special.change={setup:function(){if(rformElems.test(this.nodeName)){if(this.type==="checkbox"||this.type==="radio"){jQuery.event.add(this,"propertychange._change",function(event){if(event.originalEvent.propertyName==="checked"){this._just_changed=true;}});jQuery.event.add(this,"click._change",function(event){if(this._just_changed&&!event.isTrigger){this._just_changed=false;}
jQuery.event.simulate("change",this,event,true);});}
return false;}
jQuery.event.add(this,"beforeactivate._change",function(e){var elem=e.target;if(rformElems.test(elem.nodeName)&&!jQuery._data(elem,"changeBubbles")){jQuery.event.add(elem,"change._change",function(event){if(this.parentNode&&!event.isSimulated&&!event.isTrigger){jQuery.event.simulate("change",this.parentNode,event,true);}});jQuery._data(elem,"changeBubbles",true);}});},handle:function(event){var elem=event.target;if(this!==elem||event.isSimulated||event.isTrigger||(elem.type!=="radio"&&elem.type!=="checkbox")){return event.handleObj.handler.apply(this,arguments);}},teardown:function(){jQuery.event.remove(this,"._change");return!rformElems.test(this.nodeName);}};}
if(!jQuery.support.focusinBubbles){jQuery.each({focus:"focusin",blur:"focusout"},function(orig,fix){var attaches=0,handler=function(event){jQuery.event.simulate(fix,event.target,jQuery.event.fix(event),true);};jQuery.event.special[fix]={setup:function(){if(attaches++===0){document.addEventListener(orig,handler,true);}},teardown:function(){if(--attaches===0){document.removeEventListener(orig,handler,true);}}};});}
jQuery.fn.extend({on:function(types,selector,data,fn,one){var type,origFn;if(typeof types==="object"){if(typeof selector!=="string"){data=data||selector;selector=undefined;}
for(type in types){this.on(type,selector,data,types[type],one);}
return this;}
if(data==null&&fn==null){fn=selector;data=selector=undefined;}else if(fn==null){if(typeof selector==="string"){fn=data;data=undefined;}else{fn=data;data=selector;selector=undefined;}}
if(fn===false){fn=returnFalse;}else if(!fn){return this;}
if(one===1){origFn=fn;fn=function(event){jQuery().off(event);return origFn.apply(this,arguments);};fn.guid=origFn.guid||(origFn.guid=jQuery.guid++);}
return this.each(function(){jQuery.event.add(this,types,fn,data,selector);});},one:function(types,selector,data,fn){return this.on(types,selector,data,fn,1);},off:function(types,selector,fn){var handleObj,type;if(types&&types.preventDefault&&types.handleObj){handleObj=types.handleObj;jQuery(types.delegateTarget).off(handleObj.namespace?handleObj.origType+"."+handleObj.namespace:handleObj.origType,handleObj.selector,handleObj.handler);return this;}
if(typeof types==="object"){for(type in types){this.off(type,selector,types[type]);}
return this;}
if(selector===false||typeof selector==="function"){fn=selector;selector=undefined;}
if(fn===false){fn=returnFalse;}
return this.each(function(){jQuery.event.remove(this,types,fn,selector);});},bind:function(types,data,fn){return this.on(types,null,data,fn);},unbind:function(types,fn){return this.off(types,null,fn);},delegate:function(selector,types,data,fn){return this.on(types,selector,data,fn);},undelegate:function(selector,types,fn){return arguments.length===1?this.off(selector,"**"):this.off(types,selector||"**",fn);},trigger:function(type,data){return this.each(function(){jQuery.event.trigger(type,data,this);});},triggerHandler:function(type,data){var elem=this[0];if(elem){return jQuery.event.trigger(type,data,elem,true);}}});(function(window,undefined){var i,cachedruns,Expr,getText,isXML,compile,hasDuplicate,outermostContext,setDocument,document,docElem,documentIsXML,rbuggyQSA,rbuggyMatches,matches,contains,sortOrder,expando="sizzle"+-(new Date()),preferredDoc=window.document,support={},dirruns=0,done=0,classCache=createCache(),tokenCache=createCache(),compilerCache=createCache(),strundefined=typeof undefined,MAX_NEGATIVE=1<<31,arr=[],pop=arr.pop,push=arr.push,slice=arr.slice,indexOf=arr.indexOf||function(elem){var i=0,len=this.length;for(;i<len;i++){if(this[i]===elem){return i;}}
return-1;},whitespace="[\\x20\\t\\r\\n\\f]",characterEncoding="(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",identifier=characterEncoding.replace("w","w#"),operators="([*^$|!~]?=)",attributes="\\["+whitespace+"*("+characterEncoding+")"+whitespace+"*(?:"+operators+whitespace+"*(?:(['\"])((?:\\\\.|[^\\\\])*?)\\3|("+identifier+")|)|)"+whitespace+"*\\]",pseudos=":("+characterEncoding+")(?:\\(((['\"])((?:\\\\.|[^\\\\])*?)\\3|((?:\\\\.|[^\\\\()[\\]]|"+attributes.replace(3,8)+")*)|.*)\\)|)",rtrim=new RegExp("^"+whitespace+"+|((?:^|[^\\\\])(?:\\\\.)*)"+whitespace+"+$","g"),rcomma=new RegExp("^"+whitespace+"*,"+whitespace+"*"),rcombinators=new RegExp("^"+whitespace+"*([\\x20\\t\\r\\n\\f>+~])"+whitespace+"*"),rpseudo=new RegExp(pseudos),ridentifier=new RegExp("^"+identifier+"$"),matchExpr={"ID":new RegExp("^#("+characterEncoding+")"),"CLASS":new RegExp("^\\.("+characterEncoding+")"),"NAME":new RegExp("^\\[name=['\"]?("+characterEncoding+")['\"]?\\]"),"TAG":new RegExp("^("+characterEncoding.replace("w","w*")+")"),"ATTR":new RegExp("^"+attributes),"PSEUDO":new RegExp("^"+pseudos),"CHILD":new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\("+whitespace+"*(even|odd|(([+-]|)(\\d*)n|)"+whitespace+"*(?:([+-]|)"+whitespace+"*(\\d+)|))"+whitespace+"*\\)|)","i"),"needsContext":new RegExp("^"+whitespace+"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\("+whitespace+"*((?:-\\d)?\\d*)"+whitespace+"*\\)|)(?=[^-]|$)","i")},rsibling=/[\x20\t\r\n\f]*[+~]/,rnative=/^[^{]+\{\s*\[native code/,rquickExpr=/^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,rinputs=/^(?:input|select|textarea|button)$/i,rheader=/^h\d$/i,rescape=/'|\\/g,rattributeQuotes=/\=[\x20\t\r\n\f]*([^'"\]]*)[\x20\t\r\n\f]*\]/g,runescape=/\\([\da-fA-F]{1,6}[\x20\t\r\n\f]?|.)/g,funescape=function(_,escaped){var high="0x"+escaped-0x10000;return high!==high?escaped:high<0?String.fromCharCode(high+0x10000):String.fromCharCode(high>>10|0xD800,high&0x3FF|0xDC00);};try{slice.call(preferredDoc.documentElement.childNodes,0)[0].nodeType;}catch(e){slice=function(i){var elem,results=[];while((elem=this[i++])){results.push(elem);}
return results;};}
function isNative(fn){return rnative.test(fn+"");}
function createCache(){var cache,keys=[];return(cache=function(key,value){if(keys.push(key+=" ")>Expr.cacheLength){delete cache[keys.shift()];}
return(cache[key]=value);});}
function markFunction(fn){fn[expando]=true;return fn;}
function assert(fn){var div=document.createElement("div");try{return fn(div);}catch(e){return false;}finally{div=null;}}
function Sizzle(selector,context,results,seed){var match,elem,m,nodeType,i,groups,old,nid,newContext,newSelector;if((context?context.ownerDocument||context:preferredDoc)!==document){setDocument(context);}
context=context||document;results=results||[];if(!selector||typeof selector!=="string"){return results;}
if((nodeType=context.nodeType)!==1&&nodeType!==9){return[];}
if(!documentIsXML&&!seed){if((match=rquickExpr.exec(selector))){if((m=match[1])){if(nodeType===9){elem=context.getElementById(m);if(elem&&elem.parentNode){if(elem.id===m){results.push(elem);return results;}}else{return results;}}else{if(context.ownerDocument&&(elem=context.ownerDocument.getElementById(m))&&contains(context,elem)&&elem.id===m){results.push(elem);return results;}}}else if(match[2]){push.apply(results,slice.call(context.getElementsByTagName(selector),0));return results;}else if((m=match[3])&&support.getByClassName&&context.getElementsByClassName){push.apply(results,slice.call(context.getElementsByClassName(m),0));return results;}}
if(support.qsa&&!rbuggyQSA.test(selector)){old=true;nid=expando;newContext=context;newSelector=nodeType===9&&selector;if(nodeType===1&&context.nodeName.toLowerCase()!=="object"){groups=tokenize(selector);if((old=context.getAttribute("id"))){nid=old.replace(rescape,"\\$&");}else{context.setAttribute("id",nid);}
nid="[id='"+nid+"'] ";i=groups.length;while(i--){groups[i]=nid+toSelector(groups[i]);}
newContext=rsibling.test(selector)&&context.parentNode||context;newSelector=groups.join(",");}
if(newSelector){try{push.apply(results,slice.call(newContext.querySelectorAll(newSelector),0));return results;}catch(qsaError){}finally{if(!old){context.removeAttribute("id");}}}}}
return select(selector.replace(rtrim,"$1"),context,results,seed);}
isXML=Sizzle.isXML=function(elem){var documentElement=elem&&(elem.ownerDocument||elem).documentElement;return documentElement?documentElement.nodeName!=="HTML":false;};setDocument=Sizzle.setDocument=function(node){var doc=node?node.ownerDocument||node:preferredDoc;if(doc===document||doc.nodeType!==9||!doc.documentElement){return document;}
document=doc;docElem=doc.documentElement;documentIsXML=isXML(doc);support.tagNameNoComments=assert(function(div){div.appendChild(doc.createComment(""));return!div.getElementsByTagName("*").length;});support.attributes=assert(function(div){div.innerHTML="<select></select>";var type=typeof div.lastChild.getAttribute("multiple");return type!=="boolean"&&type!=="string";});support.getByClassName=assert(function(div){div.innerHTML="<div class='hidden e'></div><div class='hidden'></div>";if(!div.getElementsByClassName||!div.getElementsByClassName("e").length){return false;}
div.lastChild.className="e";return div.getElementsByClassName("e").length===2;});support.getByName=assert(function(div){div.id=expando+0;div.innerHTML="<a name='"+expando+"'></a><div name='"+expando+"'></div>";docElem.insertBefore(div,docElem.firstChild);var pass=doc.getElementsByName&&doc.getElementsByName(expando).length===2+doc.getElementsByName(expando+0).length;support.getIdNotName=!doc.getElementById(expando);docElem.removeChild(div);return pass;});Expr.attrHandle=assert(function(div){div.innerHTML="<a href='#'></a>";return div.firstChild&&typeof div.firstChild.getAttribute!==strundefined&&div.firstChild.getAttribute("href")==="#";})?{}:{"href":function(elem){return elem.getAttribute("href",2);},"type":function(elem){return elem.getAttribute("type");}};if(support.getIdNotName){Expr.find["ID"]=function(id,context){if(typeof context.getElementById!==strundefined&&!documentIsXML){var m=context.getElementById(id);return m&&m.parentNode?[m]:[];}};Expr.filter["ID"]=function(id){var attrId=id.replace(runescape,funescape);return function(elem){return elem.getAttribute("id")===attrId;};};}else{Expr.find["ID"]=function(id,context){if(typeof context.getElementById!==strundefined&&!documentIsXML){var m=context.getElementById(id);return m?m.id===id||typeof m.getAttributeNode!==strundefined&&m.getAttributeNode("id").value===id?[m]:undefined:[];}};Expr.filter["ID"]=function(id){var attrId=id.replace(runescape,funescape);return function(elem){var node=typeof elem.getAttributeNode!==strundefined&&elem.getAttributeNode("id");return node&&node.value===attrId;};};}
Expr.find["TAG"]=support.tagNameNoComments?function(tag,context){if(typeof context.getElementsByTagName!==strundefined){return context.getElementsByTagName(tag);}}:function(tag,context){var elem,tmp=[],i=0,results=context.getElementsByTagName(tag);if(tag==="*"){while((elem=results[i++])){if(elem.nodeType===1){tmp.push(elem);}}
return tmp;}
return results;};Expr.find["NAME"]=support.getByName&&function(tag,context){if(typeof context.getElementsByName!==strundefined){return context.getElementsByName(name);}};Expr.find["CLASS"]=support.getByClassName&&function(className,context){if(typeof context.getElementsByClassName!==strundefined&&!documentIsXML){return context.getElementsByClassName(className);}};rbuggyMatches=[];rbuggyQSA=[":focus"];if((support.qsa=isNative(doc.querySelectorAll))){assert(function(div){div.innerHTML="<select><option selected=''></option></select>";if(!div.querySelectorAll("[selected]").length){rbuggyQSA.push("\\["+whitespace+"*(?:checked|disabled|ismap|multiple|readonly|selected|value)");}
if(!div.querySelectorAll(":checked").length){rbuggyQSA.push(":checked");}});assert(function(div){div.innerHTML="<input type='hidden' i=''/>";if(div.querySelectorAll("[i^='']").length){rbuggyQSA.push("[*^$]="+whitespace+"*(?:\"\"|'')");}
if(!div.querySelectorAll(":enabled").length){rbuggyQSA.push(":enabled",":disabled");}
div.querySelectorAll("*,:x");rbuggyQSA.push(",.*:");});}
if((support.matchesSelector=isNative((matches=docElem.matchesSelector||docElem.mozMatchesSelector||docElem.webkitMatchesSelector||docElem.oMatchesSelector||docElem.msMatchesSelector)))){assert(function(div){support.disconnectedMatch=matches.call(div,"div");matches.call(div,"[s!='']:x");rbuggyMatches.push("!=",pseudos);});}
rbuggyQSA=new RegExp(rbuggyQSA.join("|"));rbuggyMatches=new RegExp(rbuggyMatches.join("|"));contains=isNative(docElem.contains)||docElem.compareDocumentPosition?function(a,b){var adown=a.nodeType===9?a.documentElement:a,bup=b&&b.parentNode;return a===bup||!!(bup&&bup.nodeType===1&&(adown.contains?adown.contains(bup):a.compareDocumentPosition&&a.compareDocumentPosition(bup)&16));}:function(a,b){if(b){while((b=b.parentNode)){if(b===a){return true;}}}
return false;};sortOrder=docElem.compareDocumentPosition?function(a,b){var compare;if(a===b){hasDuplicate=true;return 0;}
if((compare=b.compareDocumentPosition&&a.compareDocumentPosition&&a.compareDocumentPosition(b))){if(compare&1||a.parentNode&&a.parentNode.nodeType===11){if(a===doc||contains(preferredDoc,a)){return-1;}
if(b===doc||contains(preferredDoc,b)){return 1;}
return 0;}
return compare&4?-1:1;}
return a.compareDocumentPosition?-1:1;}:function(a,b){var cur,i=0,aup=a.parentNode,bup=b.parentNode,ap=[a],bp=[b];if(a===b){hasDuplicate=true;return 0;}else if(!aup||!bup){return a===doc?-1:b===doc?1:aup?-1:bup?1:0;}else if(aup===bup){return siblingCheck(a,b);}
cur=a;while((cur=cur.parentNode)){ap.unshift(cur);}
cur=b;while((cur=cur.parentNode)){bp.unshift(cur);}
while(ap[i]===bp[i]){i++;}
return i?siblingCheck(ap[i],bp[i]):ap[i]===preferredDoc?-1:bp[i]===preferredDoc?1:0;};hasDuplicate=false;[0,0].sort(sortOrder);support.detectDuplicates=hasDuplicate;return document;};Sizzle.matches=function(expr,elements){return Sizzle(expr,null,null,elements);};Sizzle.matchesSelector=function(elem,expr){if((elem.ownerDocument||elem)!==document){setDocument(elem);}
expr=expr.replace(rattributeQuotes,"='$1']");if(support.matchesSelector&&!documentIsXML&&(!rbuggyMatches||!rbuggyMatches.test(expr))&&!rbuggyQSA.test(expr)){try{var ret=matches.call(elem,expr);if(ret||support.disconnectedMatch||elem.document&&elem.document.nodeType!==11){return ret;}}catch(e){}}
return Sizzle(expr,document,null,[elem]).length>0;};Sizzle.contains=function(context,elem){if((context.ownerDocument||context)!==document){setDocument(context);}
return contains(context,elem);};Sizzle.attr=function(elem,name){var val;if((elem.ownerDocument||elem)!==document){setDocument(elem);}
if(!documentIsXML){name=name.toLowerCase();}
if((val=Expr.attrHandle[name])){return val(elem);}
if(documentIsXML||support.attributes){return elem.getAttribute(name);}
return((val=elem.getAttributeNode(name))||elem.getAttribute(name))&&elem[name]===true?name:val&&val.specified?val.value:null;};Sizzle.error=function(msg){throw new Error("Syntax error, unrecognized expression: "+msg);};Sizzle.uniqueSort=function(results){var elem,duplicates=[],i=1,j=0;hasDuplicate=!support.detectDuplicates;results.sort(sortOrder);if(hasDuplicate){for(;(elem=results[i]);i++){if(elem===results[i-1]){j=duplicates.push(i);}}
while(j--){results.splice(duplicates[j],1);}}
return results;};function siblingCheck(a,b){var cur=b&&a,diff=cur&&(~b.sourceIndex||MAX_NEGATIVE)-(~a.sourceIndex||MAX_NEGATIVE);if(diff){return diff;}
if(cur){while((cur=cur.nextSibling)){if(cur===b){return-1;}}}
return a?1:-1;}
function createInputPseudo(type){return function(elem){var name=elem.nodeName.toLowerCase();return name==="input"&&elem.type===type;};}
function createButtonPseudo(type){return function(elem){var name=elem.nodeName.toLowerCase();return(name==="input"||name==="button")&&elem.type===type;};}
function createPositionalPseudo(fn){return markFunction(function(argument){argument=+argument;return markFunction(function(seed,matches){var j,matchIndexes=fn([],seed.length,argument),i=matchIndexes.length;while(i--){if(seed[(j=matchIndexes[i])]){seed[j]=!(matches[j]=seed[j]);}}});});}
getText=Sizzle.getText=function(elem){var node,ret="",i=0,nodeType=elem.nodeType;if(!nodeType){for(;(node=elem[i]);i++){ret+=getText(node);}}else if(nodeType===1||nodeType===9||nodeType===11){if(typeof elem.textContent==="string"){return elem.textContent;}else{for(elem=elem.firstChild;elem;elem=elem.nextSibling){ret+=getText(elem);}}}else if(nodeType===3||nodeType===4){return elem.nodeValue;}
return ret;};Expr=Sizzle.selectors={cacheLength:50,createPseudo:markFunction,match:matchExpr,find:{},relative:{">":{dir:"parentNode",first:true}," ":{dir:"parentNode"},"+":{dir:"previousSibling",first:true},"~":{dir:"previousSibling"}},preFilter:{"ATTR":function(match){match[1]=match[1].replace(runescape,funescape);match[3]=(match[4]||match[5]||"").replace(runescape,funescape);if(match[2]==="~="){match[3]=" "+match[3]+" ";}
return match.slice(0,4);},"CHILD":function(match){match[1]=match[1].toLowerCase();if(match[1].slice(0,3)==="nth"){if(!match[3]){Sizzle.error(match[0]);}
match[4]=+(match[4]?match[5]+(match[6]||1):2*(match[3]==="even"||match[3]==="odd"));match[5]=+((match[7]+match[8])||match[3]==="odd");}else if(match[3]){Sizzle.error(match[0]);}
return match;},"PSEUDO":function(match){var excess,unquoted=!match[5]&&match[2];if(matchExpr["CHILD"].test(match[0])){return null;}
if(match[4]){match[2]=match[4];}else if(unquoted&&rpseudo.test(unquoted)&&(excess=tokenize(unquoted,true))&&(excess=unquoted.indexOf(")",unquoted.length-excess)-unquoted.length)){match[0]=match[0].slice(0,excess);match[2]=unquoted.slice(0,excess);}
return match.slice(0,3);}},filter:{"TAG":function(nodeName){if(nodeName==="*"){return function(){return true;};}
nodeName=nodeName.replace(runescape,funescape).toLowerCase();return function(elem){return elem.nodeName&&elem.nodeName.toLowerCase()===nodeName;};},"CLASS":function(className){var pattern=classCache[className+" "];return pattern||(pattern=new RegExp("(^|"+whitespace+")"+className+"("+whitespace+"|$)"))&&classCache(className,function(elem){return pattern.test(elem.className||(typeof elem.getAttribute!==strundefined&&elem.getAttribute("class"))||"");});},"ATTR":function(name,operator,check){return function(elem){var result=Sizzle.attr(elem,name);if(result==null){return operator==="!=";}
if(!operator){return true;}
result+="";return operator==="="?result===check:operator==="!="?result!==check:operator==="^="?check&&result.indexOf(check)===0:operator==="*="?check&&result.indexOf(check)>-1:operator==="$="?check&&result.slice(-check.length)===check:operator==="~="?(" "+result+" ").indexOf(check)>-1:operator==="|="?result===check||result.slice(0,check.length+1)===check+"-":false;};},"CHILD":function(type,what,argument,first,last){var simple=type.slice(0,3)!=="nth",forward=type.slice(-4)!=="last",ofType=what==="of-type";return first===1&&last===0?function(elem){return!!elem.parentNode;}:function(elem,context,xml){var cache,outerCache,node,diff,nodeIndex,start,dir=simple!==forward?"nextSibling":"previousSibling",parent=elem.parentNode,name=ofType&&elem.nodeName.toLowerCase(),useCache=!xml&&!ofType;if(parent){if(simple){while(dir){node=elem;while((node=node[dir])){if(ofType?node.nodeName.toLowerCase()===name:node.nodeType===1){return false;}}
start=dir=type==="only"&&!start&&"nextSibling";}
return true;}
start=[forward?parent.firstChild:parent.lastChild];if(forward&&useCache){outerCache=parent[expando]||(parent[expando]={});cache=outerCache[type]||[];nodeIndex=cache[0]===dirruns&&cache[1];diff=cache[0]===dirruns&&cache[2];node=nodeIndex&&parent.childNodes[nodeIndex];while((node=++nodeIndex&&node&&node[dir]||(diff=nodeIndex=0)||start.pop())){if(node.nodeType===1&&++diff&&node===elem){outerCache[type]=[dirruns,nodeIndex,diff];break;}}}else if(useCache&&(cache=(elem[expando]||(elem[expando]={}))[type])&&cache[0]===dirruns){diff=cache[1];}else{while((node=++nodeIndex&&node&&node[dir]||(diff=nodeIndex=0)||start.pop())){if((ofType?node.nodeName.toLowerCase()===name:node.nodeType===1)&&++diff){if(useCache){(node[expando]||(node[expando]={}))[type]=[dirruns,diff];}
if(node===elem){break;}}}}
diff-=last;return diff===first||(diff%first===0&&diff/first>=0);}};},"PSEUDO":function(pseudo,argument){var args,fn=Expr.pseudos[pseudo]||Expr.setFilters[pseudo.toLowerCase()]||Sizzle.error("unsupported pseudo: "+pseudo);if(fn[expando]){return fn(argument);}
if(fn.length>1){args=[pseudo,pseudo,"",argument];return Expr.setFilters.hasOwnProperty(pseudo.toLowerCase())?markFunction(function(seed,matches){var idx,matched=fn(seed,argument),i=matched.length;while(i--){idx=indexOf.call(seed,matched[i]);seed[idx]=!(matches[idx]=matched[i]);}}):function(elem){return fn(elem,0,args);};}
return fn;}},pseudos:{"not":markFunction(function(selector){var input=[],results=[],matcher=compile(selector.replace(rtrim,"$1"));return matcher[expando]?markFunction(function(seed,matches,context,xml){var elem,unmatched=matcher(seed,null,xml,[]),i=seed.length;while(i--){if((elem=unmatched[i])){seed[i]=!(matches[i]=elem);}}}):function(elem,context,xml){input[0]=elem;matcher(input,null,xml,results);return!results.pop();};}),"has":markFunction(function(selector){return function(elem){return Sizzle(selector,elem).length>0;};}),"contains":markFunction(function(text){return function(elem){return(elem.textContent||elem.innerText||getText(elem)).indexOf(text)>-1;};}),"lang":markFunction(function(lang){if(!ridentifier.test(lang||"")){Sizzle.error("unsupported lang: "+lang);}
lang=lang.replace(runescape,funescape).toLowerCase();return function(elem){var elemLang;do{if((elemLang=documentIsXML?elem.getAttribute("xml:lang")||elem.getAttribute("lang"):elem.lang)){elemLang=elemLang.toLowerCase();return elemLang===lang||elemLang.indexOf(lang+"-")===0;}}while((elem=elem.parentNode)&&elem.nodeType===1);return false;};}),"target":function(elem){var hash=window.location&&window.location.hash;return hash&&hash.slice(1)===elem.id;},"root":function(elem){return elem===docElem;},"focus":function(elem){return elem===document.activeElement&&(!document.hasFocus||document.hasFocus())&&!!(elem.type||elem.href||~elem.tabIndex);},"enabled":function(elem){return elem.disabled===false;},"disabled":function(elem){return elem.disabled===true;},"checked":function(elem){var nodeName=elem.nodeName.toLowerCase();return(nodeName==="input"&&!!elem.checked)||(nodeName==="option"&&!!elem.selected);},"selected":function(elem){if(elem.parentNode){elem.parentNode.selectedIndex;}
return elem.selected===true;},"empty":function(elem){for(elem=elem.firstChild;elem;elem=elem.nextSibling){if(elem.nodeName>"@"||elem.nodeType===3||elem.nodeType===4){return false;}}
return true;},"parent":function(elem){return!Expr.pseudos["empty"](elem);},"header":function(elem){return rheader.test(elem.nodeName);},"input":function(elem){return rinputs.test(elem.nodeName);},"button":function(elem){var name=elem.nodeName.toLowerCase();return name==="input"&&elem.type==="button"||name==="button";},"text":function(elem){var attr;return elem.nodeName.toLowerCase()==="input"&&elem.type==="text"&&((attr=elem.getAttribute("type"))==null||attr.toLowerCase()===elem.type);},"first":createPositionalPseudo(function(){return[0];}),"last":createPositionalPseudo(function(matchIndexes,length){return[length-1];}),"eq":createPositionalPseudo(function(matchIndexes,length,argument){return[argument<0?argument+length:argument];}),"even":createPositionalPseudo(function(matchIndexes,length){var i=0;for(;i<length;i+=2){matchIndexes.push(i);}
return matchIndexes;}),"odd":createPositionalPseudo(function(matchIndexes,length){var i=1;for(;i<length;i+=2){matchIndexes.push(i);}
return matchIndexes;}),"lt":createPositionalPseudo(function(matchIndexes,length,argument){var i=argument<0?argument+length:argument;for(;--i>=0;){matchIndexes.push(i);}
return matchIndexes;}),"gt":createPositionalPseudo(function(matchIndexes,length,argument){var i=argument<0?argument+length:argument;for(;++i<length;){matchIndexes.push(i);}
return matchIndexes;})}};for(i in{radio:true,checkbox:true,file:true,password:true,image:true}){Expr.pseudos[i]=createInputPseudo(i);}
for(i in{submit:true,reset:true}){Expr.pseudos[i]=createButtonPseudo(i);}
function tokenize(selector,parseOnly){var matched,match,tokens,type,soFar,groups,preFilters,cached=tokenCache[selector+" "];if(cached){return parseOnly?0:cached.slice(0);}
soFar=selector;groups=[];preFilters=Expr.preFilter;while(soFar){if(!matched||(match=rcomma.exec(soFar))){if(match){soFar=soFar.slice(match[0].length)||soFar;}
groups.push(tokens=[]);}
matched=false;if((match=rcombinators.exec(soFar))){matched=match.shift();tokens.push({value:matched,type:match[0].replace(rtrim," ")});soFar=soFar.slice(matched.length);}
for(type in Expr.filter){if((match=matchExpr[type].exec(soFar))&&(!preFilters[type]||(match=preFilters[type](match)))){matched=match.shift();tokens.push({value:matched,type:type,matches:match});soFar=soFar.slice(matched.length);}}
if(!matched){break;}}
return parseOnly?soFar.length:soFar?Sizzle.error(selector):tokenCache(selector,groups).slice(0);}
function toSelector(tokens){var i=0,len=tokens.length,selector="";for(;i<len;i++){selector+=tokens[i].value;}
return selector;}
function addCombinator(matcher,combinator,base){var dir=combinator.dir,checkNonElements=base&&dir==="parentNode",doneName=done++;return combinator.first?function(elem,context,xml){while((elem=elem[dir])){if(elem.nodeType===1||checkNonElements){return matcher(elem,context,xml);}}}:function(elem,context,xml){var data,cache,outerCache,dirkey=dirruns+" "+doneName;if(xml){while((elem=elem[dir])){if(elem.nodeType===1||checkNonElements){if(matcher(elem,context,xml)){return true;}}}}else{while((elem=elem[dir])){if(elem.nodeType===1||checkNonElements){outerCache=elem[expando]||(elem[expando]={});if((cache=outerCache[dir])&&cache[0]===dirkey){if((data=cache[1])===true||data===cachedruns){return data===true;}}else{cache=outerCache[dir]=[dirkey];cache[1]=matcher(elem,context,xml)||cachedruns;if(cache[1]===true){return true;}}}}}};}
function elementMatcher(matchers){return matchers.length>1?function(elem,context,xml){var i=matchers.length;while(i--){if(!matchers[i](elem,context,xml)){return false;}}
return true;}:matchers[0];}
function condense(unmatched,map,filter,context,xml){var elem,newUnmatched=[],i=0,len=unmatched.length,mapped=map!=null;for(;i<len;i++){if((elem=unmatched[i])){if(!filter||filter(elem,context,xml)){newUnmatched.push(elem);if(mapped){map.push(i);}}}}
return newUnmatched;}
function setMatcher(preFilter,selector,matcher,postFilter,postFinder,postSelector){if(postFilter&&!postFilter[expando]){postFilter=setMatcher(postFilter);}
if(postFinder&&!postFinder[expando]){postFinder=setMatcher(postFinder,postSelector);}
return markFunction(function(seed,results,context,xml){var temp,i,elem,preMap=[],postMap=[],preexisting=results.length,elems=seed||multipleContexts(selector||"*",context.nodeType?[context]:context,[]),matcherIn=preFilter&&(seed||!selector)?condense(elems,preMap,preFilter,context,xml):elems,matcherOut=matcher?postFinder||(seed?preFilter:preexisting||postFilter)?[]:results:matcherIn;if(matcher){matcher(matcherIn,matcherOut,context,xml);}
if(postFilter){temp=condense(matcherOut,postMap);postFilter(temp,[],context,xml);i=temp.length;while(i--){if((elem=temp[i])){matcherOut[postMap[i]]=!(matcherIn[postMap[i]]=elem);}}}
if(seed){if(postFinder||preFilter){if(postFinder){temp=[];i=matcherOut.length;while(i--){if((elem=matcherOut[i])){temp.push((matcherIn[i]=elem));}}
postFinder(null,(matcherOut=[]),temp,xml);}
i=matcherOut.length;while(i--){if((elem=matcherOut[i])&&(temp=postFinder?indexOf.call(seed,elem):preMap[i])>-1){seed[temp]=!(results[temp]=elem);}}}}else{matcherOut=condense(matcherOut===results?matcherOut.splice(preexisting,matcherOut.length):matcherOut);if(postFinder){postFinder(null,results,matcherOut,xml);}else{push.apply(results,matcherOut);}}});}
function matcherFromTokens(tokens){var checkContext,matcher,j,len=tokens.length,leadingRelative=Expr.relative[tokens[0].type],implicitRelative=leadingRelative||Expr.relative[" "],i=leadingRelative?1:0,matchContext=addCombinator(function(elem){return elem===checkContext;},implicitRelative,true),matchAnyContext=addCombinator(function(elem){return indexOf.call(checkContext,elem)>-1;},implicitRelative,true),matchers=[function(elem,context,xml){return(!leadingRelative&&(xml||context!==outermostContext))||((checkContext=context).nodeType?matchContext(elem,context,xml):matchAnyContext(elem,context,xml));}];for(;i<len;i++){if((matcher=Expr.relative[tokens[i].type])){matchers=[addCombinator(elementMatcher(matchers),matcher)];}else{matcher=Expr.filter[tokens[i].type].apply(null,tokens[i].matches);if(matcher[expando]){j=++i;for(;j<len;j++){if(Expr.relative[tokens[j].type]){break;}}
return setMatcher(i>1&&elementMatcher(matchers),i>1&&toSelector(tokens.slice(0,i-1)).replace(rtrim,"$1"),matcher,i<j&&matcherFromTokens(tokens.slice(i,j)),j<len&&matcherFromTokens((tokens=tokens.slice(j))),j<len&&toSelector(tokens));}
matchers.push(matcher);}}
return elementMatcher(matchers);}
function matcherFromGroupMatchers(elementMatchers,setMatchers){var matcherCachedRuns=0,bySet=setMatchers.length>0,byElement=elementMatchers.length>0,superMatcher=function(seed,context,xml,results,expandContext){var elem,j,matcher,setMatched=[],matchedCount=0,i="0",unmatched=seed&&[],outermost=expandContext!=null,contextBackup=outermostContext,elems=seed||byElement&&Expr.find["TAG"]("*",expandContext&&context.parentNode||context),dirrunsUnique=(dirruns+=contextBackup==null?1:Math.random()||0.1);if(outermost){outermostContext=context!==document&&context;cachedruns=matcherCachedRuns;}
for(;(elem=elems[i])!=null;i++){if(byElement&&elem){j=0;while((matcher=elementMatchers[j++])){if(matcher(elem,context,xml)){results.push(elem);break;}}
if(outermost){dirruns=dirrunsUnique;cachedruns=++matcherCachedRuns;}}
if(bySet){if((elem=!matcher&&elem)){matchedCount--;}
if(seed){unmatched.push(elem);}}}
matchedCount+=i;if(bySet&&i!==matchedCount){j=0;while((matcher=setMatchers[j++])){matcher(unmatched,setMatched,context,xml);}
if(seed){if(matchedCount>0){while(i--){if(!(unmatched[i]||setMatched[i])){setMatched[i]=pop.call(results);}}}
setMatched=condense(setMatched);}
push.apply(results,setMatched);if(outermost&&!seed&&setMatched.length>0&&(matchedCount+setMatchers.length)>1){Sizzle.uniqueSort(results);}}
if(outermost){dirruns=dirrunsUnique;outermostContext=contextBackup;}
return unmatched;};return bySet?markFunction(superMatcher):superMatcher;}
compile=Sizzle.compile=function(selector,group){var i,setMatchers=[],elementMatchers=[],cached=compilerCache[selector+" "];if(!cached){if(!group){group=tokenize(selector);}
i=group.length;while(i--){cached=matcherFromTokens(group[i]);if(cached[expando]){setMatchers.push(cached);}else{elementMatchers.push(cached);}}
cached=compilerCache(selector,matcherFromGroupMatchers(elementMatchers,setMatchers));}
return cached;};function multipleContexts(selector,contexts,results){var i=0,len=contexts.length;for(;i<len;i++){Sizzle(selector,contexts[i],results);}
return results;}
function select(selector,context,results,seed){var i,tokens,token,type,find,match=tokenize(selector);if(!seed){if(match.length===1){tokens=match[0]=match[0].slice(0);if(tokens.length>2&&(token=tokens[0]).type==="ID"&&context.nodeType===9&&!documentIsXML&&Expr.relative[tokens[1].type]){context=Expr.find["ID"](token.matches[0].replace(runescape,funescape),context)[0];if(!context){return results;}
selector=selector.slice(tokens.shift().value.length);}
i=matchExpr["needsContext"].test(selector)?0:tokens.length;while(i--){token=tokens[i];if(Expr.relative[(type=token.type)]){break;}
if((find=Expr.find[type])){if((seed=find(token.matches[0].replace(runescape,funescape),rsibling.test(tokens[0].type)&&context.parentNode||context))){tokens.splice(i,1);selector=seed.length&&toSelector(tokens);if(!selector){push.apply(results,slice.call(seed,0));return results;}
break;}}}}}
compile(selector,match)(seed,context,documentIsXML,results,rsibling.test(selector));return results;}
Expr.pseudos["nth"]=Expr.pseudos["eq"];function setFilters(){}
Expr.filters=setFilters.prototype=Expr.pseudos;Expr.setFilters=new setFilters();setDocument();Sizzle.attr=jQuery.attr;jQuery.find=Sizzle;jQuery.expr=Sizzle.selectors;jQuery.expr[":"]=jQuery.expr.pseudos;jQuery.unique=Sizzle.uniqueSort;jQuery.text=Sizzle.getText;jQuery.isXMLDoc=Sizzle.isXML;jQuery.contains=Sizzle.contains;})(window);var runtil=/Until$/,rparentsprev=/^(?:parents|prev(?:Until|All))/,isSimple=/^.[^:#\[\.,]*$/,rneedsContext=jQuery.expr.match.needsContext,guaranteedUnique={children:true,contents:true,next:true,prev:true};jQuery.fn.extend({find:function(selector){var i,ret,self,len=this.length;if(typeof selector!=="string"){self=this;return this.pushStack(jQuery(selector).filter(function(){for(i=0;i<len;i++){if(jQuery.contains(self[i],this)){return true;}}}));}
ret=[];for(i=0;i<len;i++){jQuery.find(selector,this[i],ret);}
ret=this.pushStack(len>1?jQuery.unique(ret):ret);ret.selector=(this.selector?this.selector+" ":"")+selector;return ret;},has:function(target){var i,targets=jQuery(target,this),len=targets.length;return this.filter(function(){for(i=0;i<len;i++){if(jQuery.contains(this,targets[i])){return true;}}});},not:function(selector){return this.pushStack(winnow(this,selector,false));},filter:function(selector){return this.pushStack(winnow(this,selector,true));},is:function(selector){return!!selector&&(typeof selector==="string"?rneedsContext.test(selector)?jQuery(selector,this.context).index(this[0])>=0:jQuery.filter(selector,this).length>0:this.filter(selector).length>0);},closest:function(selectors,context){var cur,i=0,l=this.length,ret=[],pos=rneedsContext.test(selectors)||typeof selectors!=="string"?jQuery(selectors,context||this.context):0;for(;i<l;i++){cur=this[i];while(cur&&cur.ownerDocument&&cur!==context&&cur.nodeType!==11){if(pos?pos.index(cur)>-1:jQuery.find.matchesSelector(cur,selectors)){ret.push(cur);break;}
cur=cur.parentNode;}}
return this.pushStack(ret.length>1?jQuery.unique(ret):ret);},index:function(elem){if(!elem){return(this[0]&&this[0].parentNode)?this.first().prevAll().length:-1;}
if(typeof elem==="string"){return jQuery.inArray(this[0],jQuery(elem));}
return jQuery.inArray(elem.jquery?elem[0]:elem,this);},add:function(selector,context){var set=typeof selector==="string"?jQuery(selector,context):jQuery.makeArray(selector&&selector.nodeType?[selector]:selector),all=jQuery.merge(this.get(),set);return this.pushStack(jQuery.unique(all));},addBack:function(selector){return this.add(selector==null?this.prevObject:this.prevObject.filter(selector));}});jQuery.fn.andSelf=jQuery.fn.addBack;function sibling(cur,dir){do{cur=cur[dir];}while(cur&&cur.nodeType!==1);return cur;}
jQuery.each({parent:function(elem){var parent=elem.parentNode;return parent&&parent.nodeType!==11?parent:null;},parents:function(elem){return jQuery.dir(elem,"parentNode");},parentsUntil:function(elem,i,until){return jQuery.dir(elem,"parentNode",until);},next:function(elem){return sibling(elem,"nextSibling");},prev:function(elem){return sibling(elem,"previousSibling");},nextAll:function(elem){return jQuery.dir(elem,"nextSibling");},prevAll:function(elem){return jQuery.dir(elem,"previousSibling");},nextUntil:function(elem,i,until){return jQuery.dir(elem,"nextSibling",until);},prevUntil:function(elem,i,until){return jQuery.dir(elem,"previousSibling",until);},siblings:function(elem){return jQuery.sibling((elem.parentNode||{}).firstChild,elem);},children:function(elem){return jQuery.sibling(elem.firstChild);},contents:function(elem){return jQuery.nodeName(elem,"iframe")?elem.contentDocument||elem.contentWindow.document:jQuery.merge([],elem.childNodes);}},function(name,fn){jQuery.fn[name]=function(until,selector){var ret=jQuery.map(this,fn,until);if(!runtil.test(name)){selector=until;}
if(selector&&typeof selector==="string"){ret=jQuery.filter(selector,ret);}
ret=this.length>1&&!guaranteedUnique[name]?jQuery.unique(ret):ret;if(this.length>1&&rparentsprev.test(name)){ret=ret.reverse();}
return this.pushStack(ret);};});jQuery.extend({filter:function(expr,elems,not){if(not){expr=":not("+expr+")";}
return elems.length===1?jQuery.find.matchesSelector(elems[0],expr)?[elems[0]]:[]:jQuery.find.matches(expr,elems);},dir:function(elem,dir,until){var matched=[],cur=elem[dir];while(cur&&cur.nodeType!==9&&(until===undefined||cur.nodeType!==1||!jQuery(cur).is(until))){if(cur.nodeType===1){matched.push(cur);}
cur=cur[dir];}
return matched;},sibling:function(n,elem){var r=[];for(;n;n=n.nextSibling){if(n.nodeType===1&&n!==elem){r.push(n);}}
return r;}});function winnow(elements,qualifier,keep){qualifier=qualifier||0;if(jQuery.isFunction(qualifier)){return jQuery.grep(elements,function(elem,i){var retVal=!!qualifier.call(elem,i,elem);return retVal===keep;});}else if(qualifier.nodeType){return jQuery.grep(elements,function(elem){return(elem===qualifier)===keep;});}else if(typeof qualifier==="string"){var filtered=jQuery.grep(elements,function(elem){return elem.nodeType===1;});if(isSimple.test(qualifier)){return jQuery.filter(qualifier,filtered,!keep);}else{qualifier=jQuery.filter(qualifier,filtered);}}
return jQuery.grep(elements,function(elem){return(jQuery.inArray(elem,qualifier)>=0)===keep;});}
function createSafeFragment(document){var list=nodeNames.split("|"),safeFrag=document.createDocumentFragment();if(safeFrag.createElement){while(list.length){safeFrag.createElement(list.pop());}}
return safeFrag;}
var nodeNames="abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|"+"header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",rinlinejQuery=/ jQuery\d+="(?:null|\d+)"/g,rnoshimcache=new RegExp("<(?:"+nodeNames+")[\\s/>]","i"),rleadingWhitespace=/^\s+/,rxhtmlTag=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,rtagName=/<([\w:]+)/,rtbody=/<tbody/i,rhtml=/<|&#?\w+;/,rnoInnerhtml=/<(?:script|style|link)/i,manipulation_rcheckableType=/^(?:checkbox|radio)$/i,rchecked=/checked\s*(?:[^=]|=\s*.checked.)/i,rscriptType=/^$|\/(?:java|ecma)script/i,rscriptTypeMasked=/^true\/(.*)/,rcleanScript=/^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,wrapMap={option:[1,"<select multiple='multiple'>","</select>"],legend:[1,"<fieldset>","</fieldset>"],area:[1,"<map>","</map>"],param:[1,"<object>","</object>"],thead:[1,"<table>","</table>"],tr:[2,"<table><tbody>","</tbody></table>"],col:[2,"<table><tbody></tbody><colgroup>","</colgroup></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:jQuery.support.htmlSerialize?[0,"",""]:[1,"X<div>","</div>"]},safeFragment=createSafeFragment(document),fragmentDiv=safeFragment.appendChild(document.createElement("div"));wrapMap.optgroup=wrapMap.option;wrapMap.tbody=wrapMap.tfoot=wrapMap.colgroup=wrapMap.caption=wrapMap.thead;wrapMap.th=wrapMap.td;jQuery.fn.extend({text:function(value){return jQuery.access(this,function(value){return value===undefined?jQuery.text(this):this.empty().append((this[0]&&this[0].ownerDocument||document).createTextNode(value));},null,value,arguments.length);},wrapAll:function(html){if(jQuery.isFunction(html)){return this.each(function(i){jQuery(this).wrapAll(html.call(this,i));});}
if(this[0]){var wrap=jQuery(html,this[0].ownerDocument).eq(0).clone(true);if(this[0].parentNode){wrap.insertBefore(this[0]);}
wrap.map(function(){var elem=this;while(elem.firstChild&&elem.firstChild.nodeType===1){elem=elem.firstChild;}
return elem;}).append(this);}
return this;},wrapInner:function(html){if(jQuery.isFunction(html)){return this.each(function(i){jQuery(this).wrapInner(html.call(this,i));});}
return this.each(function(){var self=jQuery(this),contents=self.contents();if(contents.length){contents.wrapAll(html);}else{self.append(html);}});},wrap:function(html){var isFunction=jQuery.isFunction(html);return this.each(function(i){jQuery(this).wrapAll(isFunction?html.call(this,i):html);});},unwrap:function(){return this.parent().each(function(){if(!jQuery.nodeName(this,"body")){jQuery(this).replaceWith(this.childNodes);}}).end();},append:function(){return this.domManip(arguments,true,function(elem){if(this.nodeType===1||this.nodeType===11||this.nodeType===9){this.appendChild(elem);}});},prepend:function(){return this.domManip(arguments,true,function(elem){if(this.nodeType===1||this.nodeType===11||this.nodeType===9){this.insertBefore(elem,this.firstChild);}});},before:function(){return this.domManip(arguments,false,function(elem){if(this.parentNode){this.parentNode.insertBefore(elem,this);}});},after:function(){return this.domManip(arguments,false,function(elem){if(this.parentNode){this.parentNode.insertBefore(elem,this.nextSibling);}});},remove:function(selector,keepData){var elem,i=0;for(;(elem=this[i])!=null;i++){if(!selector||jQuery.filter(selector,[elem]).length>0){if(!keepData&&elem.nodeType===1){jQuery.cleanData(getAll(elem));}
if(elem.parentNode){if(keepData&&jQuery.contains(elem.ownerDocument,elem)){setGlobalEval(getAll(elem,"script"));}
elem.parentNode.removeChild(elem);}}}
return this;},empty:function(){var elem,i=0;for(;(elem=this[i])!=null;i++){if(elem.nodeType===1){jQuery.cleanData(getAll(elem,false));}
while(elem.firstChild){elem.removeChild(elem.firstChild);}
if(elem.options&&jQuery.nodeName(elem,"select")){elem.options.length=0;}}
return this;},clone:function(dataAndEvents,deepDataAndEvents){dataAndEvents=dataAndEvents==null?false:dataAndEvents;deepDataAndEvents=deepDataAndEvents==null?dataAndEvents:deepDataAndEvents;return this.map(function(){return jQuery.clone(this,dataAndEvents,deepDataAndEvents);});},html:function(value){return jQuery.access(this,function(value){var elem=this[0]||{},i=0,l=this.length;if(value===undefined){return elem.nodeType===1?elem.innerHTML.replace(rinlinejQuery,""):undefined;}
if(typeof value==="string"&&!rnoInnerhtml.test(value)&&(jQuery.support.htmlSerialize||!rnoshimcache.test(value))&&(jQuery.support.leadingWhitespace||!rleadingWhitespace.test(value))&&!wrapMap[(rtagName.exec(value)||["",""])[1].toLowerCase()]){value=value.replace(rxhtmlTag,"<$1></$2>");try{for(;i<l;i++){elem=this[i]||{};if(elem.nodeType===1){jQuery.cleanData(getAll(elem,false));elem.innerHTML=value;}}
elem=0;}catch(e){}}
if(elem){this.empty().append(value);}},null,value,arguments.length);},replaceWith:function(value){var isFunc=jQuery.isFunction(value);if(!isFunc&&typeof value!=="string"){value=jQuery(value).not(this).detach();}
return this.domManip([value],true,function(elem){var next=this.nextSibling,parent=this.parentNode;if(parent){jQuery(this).remove();parent.insertBefore(elem,next);}});},detach:function(selector){return this.remove(selector,true);},domManip:function(args,table,callback){args=core_concat.apply([],args);var first,node,hasScripts,scripts,doc,fragment,i=0,l=this.length,set=this,iNoClone=l-1,value=args[0],isFunction=jQuery.isFunction(value);if(isFunction||!(l<=1||typeof value!=="string"||jQuery.support.checkClone||!rchecked.test(value))){return this.each(function(index){var self=set.eq(index);if(isFunction){args[0]=value.call(this,index,table?self.html():undefined);}
self.domManip(args,table,callback);});}
if(l){fragment=jQuery.buildFragment(args,this[0].ownerDocument,false,this);first=fragment.firstChild;if(fragment.childNodes.length===1){fragment=first;}
if(first){table=table&&jQuery.nodeName(first,"tr");scripts=jQuery.map(getAll(fragment,"script"),disableScript);hasScripts=scripts.length;for(;i<l;i++){node=fragment;if(i!==iNoClone){node=jQuery.clone(node,true,true);if(hasScripts){jQuery.merge(scripts,getAll(node,"script"));}}
callback.call(table&&jQuery.nodeName(this[i],"table")?findOrAppend(this[i],"tbody"):this[i],node,i);}
if(hasScripts){doc=scripts[scripts.length-1].ownerDocument;jQuery.map(scripts,restoreScript);for(i=0;i<hasScripts;i++){node=scripts[i];if(rscriptType.test(node.type||"")&&!jQuery._data(node,"globalEval")&&jQuery.contains(doc,node)){if(node.src){jQuery.ajax({url:node.src,type:"GET",dataType:"script",async:false,global:false,"throws":true});}else{jQuery.globalEval((node.text||node.textContent||node.innerHTML||"").replace(rcleanScript,""));}}}}
fragment=first=null;}}
return this;}});function findOrAppend(elem,tag){return elem.getElementsByTagName(tag)[0]||elem.appendChild(elem.ownerDocument.createElement(tag));}
function disableScript(elem){var attr=elem.getAttributeNode("type");elem.type=(attr&&attr.specified)+"/"+elem.type;return elem;}
function restoreScript(elem){var match=rscriptTypeMasked.exec(elem.type);if(match){elem.type=match[1];}else{elem.removeAttribute("type");}
return elem;}
function setGlobalEval(elems,refElements){var elem,i=0;for(;(elem=elems[i])!=null;i++){jQuery._data(elem,"globalEval",!refElements||jQuery._data(refElements[i],"globalEval"));}}
function cloneCopyEvent(src,dest){if(dest.nodeType!==1||!jQuery.hasData(src)){return;}
var type,i,l,oldData=jQuery._data(src),curData=jQuery._data(dest,oldData),events=oldData.events;if(events){delete curData.handle;curData.events={};for(type in events){for(i=0,l=events[type].length;i<l;i++){jQuery.event.add(dest,type,events[type][i]);}}}
if(curData.data){curData.data=jQuery.extend({},curData.data);}}
function fixCloneNodeIssues(src,dest){var nodeName,e,data;if(dest.nodeType!==1){return;}
nodeName=dest.nodeName.toLowerCase();if(!jQuery.support.noCloneEvent&&dest[jQuery.expando]){data=jQuery._data(dest);for(e in data.events){jQuery.removeEvent(dest,e,data.handle);}
dest.removeAttribute(jQuery.expando);}
if(nodeName==="script"&&dest.text!==src.text){disableScript(dest).text=src.text;restoreScript(dest);}else if(nodeName==="object"){if(dest.parentNode){dest.outerHTML=src.outerHTML;}
if(jQuery.support.html5Clone&&(src.innerHTML&&!jQuery.trim(dest.innerHTML))){dest.innerHTML=src.innerHTML;}}else if(nodeName==="input"&&manipulation_rcheckableType.test(src.type)){dest.defaultChecked=dest.checked=src.checked;if(dest.value!==src.value){dest.value=src.value;}}else if(nodeName==="option"){dest.defaultSelected=dest.selected=src.defaultSelected;}else if(nodeName==="input"||nodeName==="textarea"){dest.defaultValue=src.defaultValue;}}
jQuery.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(name,original){jQuery.fn[name]=function(selector){var elems,i=0,ret=[],insert=jQuery(selector),last=insert.length-1;for(;i<=last;i++){elems=i===last?this:this.clone(true);jQuery(insert[i])[original](elems);core_push.apply(ret,elems.get());}
return this.pushStack(ret);};});function getAll(context,tag){var elems,elem,i=0,found=typeof context.getElementsByTagName!==core_strundefined?context.getElementsByTagName(tag||"*"):typeof context.querySelectorAll!==core_strundefined?context.querySelectorAll(tag||"*"):undefined;if(!found){for(found=[],elems=context.childNodes||context;(elem=elems[i])!=null;i++){if(!tag||jQuery.nodeName(elem,tag)){found.push(elem);}else{jQuery.merge(found,getAll(elem,tag));}}}
return tag===undefined||tag&&jQuery.nodeName(context,tag)?jQuery.merge([context],found):found;}
function fixDefaultChecked(elem){if(manipulation_rcheckableType.test(elem.type)){elem.defaultChecked=elem.checked;}}
jQuery.extend({clone:function(elem,dataAndEvents,deepDataAndEvents){var destElements,node,clone,i,srcElements,inPage=jQuery.contains(elem.ownerDocument,elem);if(jQuery.support.html5Clone||jQuery.isXMLDoc(elem)||!rnoshimcache.test("<"+elem.nodeName+">")){clone=elem.cloneNode(true);}else{fragmentDiv.innerHTML=elem.outerHTML;fragmentDiv.removeChild(clone=fragmentDiv.firstChild);}
if((!jQuery.support.noCloneEvent||!jQuery.support.noCloneChecked)&&(elem.nodeType===1||elem.nodeType===11)&&!jQuery.isXMLDoc(elem)){destElements=getAll(clone);srcElements=getAll(elem);for(i=0;(node=srcElements[i])!=null;++i){if(destElements[i]){fixCloneNodeIssues(node,destElements[i]);}}}
if(dataAndEvents){if(deepDataAndEvents){srcElements=srcElements||getAll(elem);destElements=destElements||getAll(clone);for(i=0;(node=srcElements[i])!=null;i++){cloneCopyEvent(node,destElements[i]);}}else{cloneCopyEvent(elem,clone);}}
destElements=getAll(clone,"script");if(destElements.length>0){setGlobalEval(destElements,!inPage&&getAll(elem,"script"));}
destElements=srcElements=node=null;return clone;},buildFragment:function(elems,context,scripts,selection){var j,elem,contains,tmp,tag,tbody,wrap,l=elems.length,safe=createSafeFragment(context),nodes=[],i=0;for(;i<l;i++){elem=elems[i];if(elem||elem===0){if(jQuery.type(elem)==="object"){jQuery.merge(nodes,elem.nodeType?[elem]:elem);}else if(!rhtml.test(elem)){nodes.push(context.createTextNode(elem));}else{tmp=tmp||safe.appendChild(context.createElement("div"));tag=(rtagName.exec(elem)||["",""])[1].toLowerCase();wrap=wrapMap[tag]||wrapMap._default;tmp.innerHTML=wrap[1]+elem.replace(rxhtmlTag,"<$1></$2>")+wrap[2];j=wrap[0];while(j--){tmp=tmp.lastChild;}
if(!jQuery.support.leadingWhitespace&&rleadingWhitespace.test(elem)){nodes.push(context.createTextNode(rleadingWhitespace.exec(elem)[0]));}
if(!jQuery.support.tbody){elem=tag==="table"&&!rtbody.test(elem)?tmp.firstChild:wrap[1]==="<table>"&&!rtbody.test(elem)?tmp:0;j=elem&&elem.childNodes.length;while(j--){if(jQuery.nodeName((tbody=elem.childNodes[j]),"tbody")&&!tbody.childNodes.length){elem.removeChild(tbody);}}}
jQuery.merge(nodes,tmp.childNodes);tmp.textContent="";while(tmp.firstChild){tmp.removeChild(tmp.firstChild);}
tmp=safe.lastChild;}}}
if(tmp){safe.removeChild(tmp);}
if(!jQuery.support.appendChecked){jQuery.grep(getAll(nodes,"input"),fixDefaultChecked);}
i=0;while((elem=nodes[i++])){if(selection&&jQuery.inArray(elem,selection)!==-1){continue;}
contains=jQuery.contains(elem.ownerDocument,elem);tmp=getAll(safe.appendChild(elem),"script");if(contains){setGlobalEval(tmp);}
if(scripts){j=0;while((elem=tmp[j++])){if(rscriptType.test(elem.type||"")){scripts.push(elem);}}}}
tmp=null;return safe;},cleanData:function(elems,acceptData){var elem,type,id,data,i=0,internalKey=jQuery.expando,cache=jQuery.cache,deleteExpando=jQuery.support.deleteExpando,special=jQuery.event.special;for(;(elem=elems[i])!=null;i++){if(acceptData||jQuery.acceptData(elem)){id=elem[internalKey];data=id&&cache[id];if(data){if(data.events){for(type in data.events){if(special[type]){jQuery.event.remove(elem,type);}else{jQuery.removeEvent(elem,type,data.handle);}}}
if(cache[id]){delete cache[id];if(deleteExpando){delete elem[internalKey];}else if(typeof elem.removeAttribute!==core_strundefined){elem.removeAttribute(internalKey);}else{elem[internalKey]=null;}
core_deletedIds.push(id);}}}}}});var iframe,getStyles,curCSS,ralpha=/alpha\([^)]*\)/i,ropacity=/opacity\s*=\s*([^)]*)/,rposition=/^(top|right|bottom|left)$/,rdisplayswap=/^(none|table(?!-c[ea]).+)/,rmargin=/^margin/,rnumsplit=new RegExp("^("+core_pnum+")(.*)$","i"),rnumnonpx=new RegExp("^("+core_pnum+")(?!px)[a-z%]+$","i"),rrelNum=new RegExp("^([+-])=("+core_pnum+")","i"),elemdisplay={BODY:"block"},cssShow={position:"absolute",visibility:"hidden",display:"block"},cssNormalTransform={letterSpacing:0,fontWeight:400},cssExpand=["Top","Right","Bottom","Left"],cssPrefixes=["Webkit","O","Moz","ms"];function vendorPropName(style,name){if(name in style){return name;}
var capName=name.charAt(0).toUpperCase()+name.slice(1),origName=name,i=cssPrefixes.length;while(i--){name=cssPrefixes[i]+capName;if(name in style){return name;}}
return origName;}
function isHidden(elem,el){elem=el||elem;return jQuery.css(elem,"display")==="none"||!jQuery.contains(elem.ownerDocument,elem);}
function showHide(elements,show){var display,elem,hidden,values=[],index=0,length=elements.length;for(;index<length;index++){elem=elements[index];if(!elem.style){continue;}
values[index]=jQuery._data(elem,"olddisplay");display=elem.style.display;if(show){if(!values[index]&&display==="none"){elem.style.display="";}
if(elem.style.display===""&&isHidden(elem)){values[index]=jQuery._data(elem,"olddisplay",css_defaultDisplay(elem.nodeName));}}else{if(!values[index]){hidden=isHidden(elem);if(display&&display!=="none"||!hidden){jQuery._data(elem,"olddisplay",hidden?display:jQuery.css(elem,"display"));}}}}
for(index=0;index<length;index++){elem=elements[index];if(!elem.style){continue;}
if(!show||elem.style.display==="none"||elem.style.display===""){elem.style.display=show?values[index]||"":"none";}}
return elements;}
jQuery.fn.extend({css:function(name,value){return jQuery.access(this,function(elem,name,value){var len,styles,map={},i=0;if(jQuery.isArray(name)){styles=getStyles(elem);len=name.length;for(;i<len;i++){map[name[i]]=jQuery.css(elem,name[i],false,styles);}
return map;}
return value!==undefined?jQuery.style(elem,name,value):jQuery.css(elem,name);},name,value,arguments.length>1);},show:function(){return showHide(this,true);},hide:function(){return showHide(this);},toggle:function(state){var bool=typeof state==="boolean";return this.each(function(){if(bool?state:isHidden(this)){jQuery(this).show();}else{jQuery(this).hide();}});}});jQuery.extend({cssHooks:{opacity:{get:function(elem,computed){if(computed){var ret=curCSS(elem,"opacity");return ret===""?"1":ret;}}}},cssNumber:{"columnCount":true,"fillOpacity":true,"fontWeight":true,"lineHeight":true,"opacity":true,"orphans":true,"widows":true,"zIndex":true,"zoom":true},cssProps:{"float":jQuery.support.cssFloat?"cssFloat":"styleFloat"},style:function(elem,name,value,extra){if(!elem||elem.nodeType===3||elem.nodeType===8||!elem.style){return;}
var ret,type,hooks,origName=jQuery.camelCase(name),style=elem.style;name=jQuery.cssProps[origName]||(jQuery.cssProps[origName]=vendorPropName(style,origName));hooks=jQuery.cssHooks[name]||jQuery.cssHooks[origName];if(value!==undefined){type=typeof value;if(type==="string"&&(ret=rrelNum.exec(value))){value=(ret[1]+1)*ret[2]+parseFloat(jQuery.css(elem,name));type="number";}
if(value==null||type==="number"&&isNaN(value)){return;}
if(type==="number"&&!jQuery.cssNumber[origName]){value+="px";}
if(!jQuery.support.clearCloneStyle&&value===""&&name.indexOf("background")===0){style[name]="inherit";}
if(!hooks||!("set"in hooks)||(value=hooks.set(elem,value,extra))!==undefined){try{style[name]=value;}catch(e){}}}else{if(hooks&&"get"in hooks&&(ret=hooks.get(elem,false,extra))!==undefined){return ret;}
return style[name];}},css:function(elem,name,extra,styles){var num,val,hooks,origName=jQuery.camelCase(name);name=jQuery.cssProps[origName]||(jQuery.cssProps[origName]=vendorPropName(elem.style,origName));hooks=jQuery.cssHooks[name]||jQuery.cssHooks[origName];if(hooks&&"get"in hooks){val=hooks.get(elem,true,extra);}
if(val===undefined){val=curCSS(elem,name,styles);}
if(val==="normal"&&name in cssNormalTransform){val=cssNormalTransform[name];}
if(extra===""||extra){num=parseFloat(val);return extra===true||jQuery.isNumeric(num)?num||0:val;}
return val;},swap:function(elem,options,callback,args){var ret,name,old={};for(name in options){old[name]=elem.style[name];elem.style[name]=options[name];}
ret=callback.apply(elem,args||[]);for(name in options){elem.style[name]=old[name];}
return ret;}});if(window.getComputedStyle){getStyles=function(elem){return window.getComputedStyle(elem,null);};curCSS=function(elem,name,_computed){var width,minWidth,maxWidth,computed=_computed||getStyles(elem),ret=computed?computed.getPropertyValue(name)||computed[name]:undefined,style=elem.style;if(computed){if(ret===""&&!jQuery.contains(elem.ownerDocument,elem)){ret=jQuery.style(elem,name);}
if(rnumnonpx.test(ret)&&rmargin.test(name)){width=style.width;minWidth=style.minWidth;maxWidth=style.maxWidth;style.minWidth=style.maxWidth=style.width=ret;ret=computed.width;style.width=width;style.minWidth=minWidth;style.maxWidth=maxWidth;}}
return ret;};}else if(document.documentElement.currentStyle){getStyles=function(elem){return elem.currentStyle;};curCSS=function(elem,name,_computed){var left,rs,rsLeft,computed=_computed||getStyles(elem),ret=computed?computed[name]:undefined,style=elem.style;if(ret==null&&style&&style[name]){ret=style[name];}
if(rnumnonpx.test(ret)&&!rposition.test(name)){left=style.left;rs=elem.runtimeStyle;rsLeft=rs&&rs.left;if(rsLeft){rs.left=elem.currentStyle.left;}
style.left=name==="fontSize"?"1em":ret;ret=style.pixelLeft+"px";style.left=left;if(rsLeft){rs.left=rsLeft;}}
return ret===""?"auto":ret;};}
function setPositiveNumber(elem,value,subtract){var matches=rnumsplit.exec(value);return matches?Math.max(0,matches[1]-(subtract||0))+(matches[2]||"px"):value;}
function augmentWidthOrHeight(elem,name,extra,isBorderBox,styles){var i=extra===(isBorderBox?"border":"content")?4:name==="width"?1:0,val=0;for(;i<4;i+=2){if(extra==="margin"){val+=jQuery.css(elem,extra+cssExpand[i],true,styles);}
if(isBorderBox){if(extra==="content"){val-=jQuery.css(elem,"padding"+cssExpand[i],true,styles);}
if(extra!=="margin"){val-=jQuery.css(elem,"border"+cssExpand[i]+"Width",true,styles);}}else{val+=jQuery.css(elem,"padding"+cssExpand[i],true,styles);if(extra!=="padding"){val+=jQuery.css(elem,"border"+cssExpand[i]+"Width",true,styles);}}}
return val;}
function getWidthOrHeight(elem,name,extra){var valueIsBorderBox=true,val=name==="width"?elem.offsetWidth:elem.offsetHeight,styles=getStyles(elem),isBorderBox=jQuery.support.boxSizing&&jQuery.css(elem,"boxSizing",false,styles)==="border-box";if(val<=0||val==null){val=curCSS(elem,name,styles);if(val<0||val==null){val=elem.style[name];}
if(rnumnonpx.test(val)){return val;}
valueIsBorderBox=isBorderBox&&(jQuery.support.boxSizingReliable||val===elem.style[name]);val=parseFloat(val)||0;}
return(val+augmentWidthOrHeight(elem,name,extra||(isBorderBox?"border":"content"),valueIsBorderBox,styles))+"px";}
function css_defaultDisplay(nodeName){var doc=document,display=elemdisplay[nodeName];if(!display){display=actualDisplay(nodeName,doc);if(display==="none"||!display){iframe=(iframe||jQuery("<iframe frameborder='0' width='0' height='0'/>").css("cssText","display:block !important")).appendTo(doc.documentElement);doc=(iframe[0].contentWindow||iframe[0].contentDocument).document;doc.write("<!doctype html><html><body>");doc.close();display=actualDisplay(nodeName,doc);iframe.detach();}
elemdisplay[nodeName]=display;}
return display;}
function actualDisplay(name,doc){var elem=jQuery(doc.createElement(name)).appendTo(doc.body),display=jQuery.css(elem[0],"display");elem.remove();return display;}
jQuery.each(["height","width"],function(i,name){jQuery.cssHooks[name]={get:function(elem,computed,extra){if(computed){return elem.offsetWidth===0&&rdisplayswap.test(jQuery.css(elem,"display"))?jQuery.swap(elem,cssShow,function(){return getWidthOrHeight(elem,name,extra);}):getWidthOrHeight(elem,name,extra);}},set:function(elem,value,extra){var styles=extra&&getStyles(elem);return setPositiveNumber(elem,value,extra?augmentWidthOrHeight(elem,name,extra,jQuery.support.boxSizing&&jQuery.css(elem,"boxSizing",false,styles)==="border-box",styles):0);}};});if(!jQuery.support.opacity){jQuery.cssHooks.opacity={get:function(elem,computed){return ropacity.test((computed&&elem.currentStyle?elem.currentStyle.filter:elem.style.filter)||"")?(0.01*parseFloat(RegExp.$1))+"":computed?"1":"";},set:function(elem,value){var style=elem.style,currentStyle=elem.currentStyle,opacity=jQuery.isNumeric(value)?"alpha(opacity="+value*100+")":"",filter=currentStyle&&currentStyle.filter||style.filter||"";style.zoom=1;if((value>=1||value==="")&&jQuery.trim(filter.replace(ralpha,""))===""&&style.removeAttribute){style.removeAttribute("filter");if(value===""||currentStyle&&!currentStyle.filter){return;}}
style.filter=ralpha.test(filter)?filter.replace(ralpha,opacity):filter+" "+opacity;}};}
jQuery(function(){if(!jQuery.support.reliableMarginRight){jQuery.cssHooks.marginRight={get:function(elem,computed){if(computed){return jQuery.swap(elem,{"display":"inline-block"},curCSS,[elem,"marginRight"]);}}};}
if(!jQuery.support.pixelPosition&&jQuery.fn.position){jQuery.each(["top","left"],function(i,prop){jQuery.cssHooks[prop]={get:function(elem,computed){if(computed){computed=curCSS(elem,prop);return rnumnonpx.test(computed)?jQuery(elem).position()[prop]+"px":computed;}}};});}});if(jQuery.expr&&jQuery.expr.filters){jQuery.expr.filters.hidden=function(elem){return elem.offsetWidth<=0&&elem.offsetHeight<=0||(!jQuery.support.reliableHiddenOffsets&&((elem.style&&elem.style.display)||jQuery.css(elem,"display"))==="none");};jQuery.expr.filters.visible=function(elem){return!jQuery.expr.filters.hidden(elem);};}
jQuery.each({margin:"",padding:"",border:"Width"},function(prefix,suffix){jQuery.cssHooks[prefix+suffix]={expand:function(value){var i=0,expanded={},parts=typeof value==="string"?value.split(" "):[value];for(;i<4;i++){expanded[prefix+cssExpand[i]+suffix]=parts[i]||parts[i-2]||parts[0];}
return expanded;}};if(!rmargin.test(prefix)){jQuery.cssHooks[prefix+suffix].set=setPositiveNumber;}});var r20=/%20/g,rbracket=/\[\]$/,rCRLF=/\r?\n/g,rsubmitterTypes=/^(?:submit|button|image|reset|file)$/i,rsubmittable=/^(?:input|select|textarea|keygen)/i;jQuery.fn.extend({serialize:function(){return jQuery.param(this.serializeArray());},serializeArray:function(){return this.map(function(){var elements=jQuery.prop(this,"elements");return elements?jQuery.makeArray(elements):this;}).filter(function(){var type=this.type;return this.name&&!jQuery(this).is(":disabled")&&rsubmittable.test(this.nodeName)&&!rsubmitterTypes.test(type)&&(this.checked||!manipulation_rcheckableType.test(type));}).map(function(i,elem){var val=jQuery(this).val();return val==null?null:jQuery.isArray(val)?jQuery.map(val,function(val){return{name:elem.name,value:val.replace(rCRLF,"\r\n")};}):{name:elem.name,value:val.replace(rCRLF,"\r\n")};}).get();}});jQuery.param=function(a,traditional){var prefix,s=[],add=function(key,value){value=jQuery.isFunction(value)?value():(value==null?"":value);s[s.length]=encodeURIComponent(key)+"="+encodeURIComponent(value);};if(traditional===undefined){traditional=jQuery.ajaxSettings&&jQuery.ajaxSettings.traditional;}
if(jQuery.isArray(a)||(a.jquery&&!jQuery.isPlainObject(a))){jQuery.each(a,function(){add(this.name,this.value);});}else{for(prefix in a){buildParams(prefix,a[prefix],traditional,add);}}
return s.join("&").replace(r20,"+");};function buildParams(prefix,obj,traditional,add){var name;if(jQuery.isArray(obj)){jQuery.each(obj,function(i,v){if(traditional||rbracket.test(prefix)){add(prefix,v);}else{buildParams(prefix+"["+(typeof v==="object"?i:"")+"]",v,traditional,add);}});}else if(!traditional&&jQuery.type(obj)==="object"){for(name in obj){buildParams(prefix+"["+name+"]",obj[name],traditional,add);}}else{add(prefix,obj);}}
jQuery.each(("blur focus focusin focusout load resize scroll unload click dblclick "+"mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave "+"change select submit keydown keypress keyup error contextmenu").split(" "),function(i,name){jQuery.fn[name]=function(data,fn){return arguments.length>0?this.on(name,null,data,fn):this.trigger(name);};});jQuery.fn.hover=function(fnOver,fnOut){return this.mouseenter(fnOver).mouseleave(fnOut||fnOver);};var
ajaxLocParts,ajaxLocation,ajax_nonce=jQuery.now(),ajax_rquery=/\?/,rhash=/#.*$/,rts=/([?&])_=[^&]*/,rheaders=/^(.*?):[ \t]*([^\r\n]*)\r?$/mg,rlocalProtocol=/^(?:about|app|app-storage|.+-extension|file|res|widget):$/,rnoContent=/^(?:GET|HEAD)$/,rprotocol=/^\/\//,rurl=/^([\w.+-]+:)(?:\/\/([^\/?#:]*)(?::(\d+)|)|)/,_load=jQuery.fn.load,prefilters={},transports={},allTypes="*/".concat("*");try{ajaxLocation=location.href;}catch(e){ajaxLocation=document.createElement("a");ajaxLocation.href="";ajaxLocation=ajaxLocation.href;}
ajaxLocParts=rurl.exec(ajaxLocation.toLowerCase())||[];function addToPrefiltersOrTransports(structure){return function(dataTypeExpression,func){if(typeof dataTypeExpression!=="string"){func=dataTypeExpression;dataTypeExpression="*";}
var dataType,i=0,dataTypes=dataTypeExpression.toLowerCase().match(core_rnotwhite)||[];if(jQuery.isFunction(func)){while((dataType=dataTypes[i++])){if(dataType[0]==="+"){dataType=dataType.slice(1)||"*";(structure[dataType]=structure[dataType]||[]).unshift(func);}else{(structure[dataType]=structure[dataType]||[]).push(func);}}}};}
function inspectPrefiltersOrTransports(structure,options,originalOptions,jqXHR){var inspected={},seekingTransport=(structure===transports);function inspect(dataType){var selected;inspected[dataType]=true;jQuery.each(structure[dataType]||[],function(_,prefilterOrFactory){var dataTypeOrTransport=prefilterOrFactory(options,originalOptions,jqXHR);if(typeof dataTypeOrTransport==="string"&&!seekingTransport&&!inspected[dataTypeOrTransport]){options.dataTypes.unshift(dataTypeOrTransport);inspect(dataTypeOrTransport);return false;}else if(seekingTransport){return!(selected=dataTypeOrTransport);}});return selected;}
return inspect(options.dataTypes[0])||!inspected["*"]&&inspect("*");}
function ajaxExtend(target,src){var deep,key,flatOptions=jQuery.ajaxSettings.flatOptions||{};for(key in src){if(src[key]!==undefined){(flatOptions[key]?target:(deep||(deep={})))[key]=src[key];}}
if(deep){jQuery.extend(true,target,deep);}
return target;}
jQuery.fn.load=function(url,params,callback){if(typeof url!=="string"&&_load){return _load.apply(this,arguments);}
var selector,response,type,self=this,off=url.indexOf(" ");if(off>=0){selector=url.slice(off,url.length);url=url.slice(0,off);}
if(jQuery.isFunction(params)){callback=params;params=undefined;}else if(params&&typeof params==="object"){type="POST";}
if(self.length>0){jQuery.ajax({url:url,type:type,dataType:"html",data:params}).done(function(responseText){response=arguments;self.html(selector?jQuery("<div>").append(jQuery.parseHTML(responseText)).find(selector):responseText);}).complete(callback&&function(jqXHR,status){self.each(callback,response||[jqXHR.responseText,status,jqXHR]);});}
return this;};jQuery.each(["ajaxStart","ajaxStop","ajaxComplete","ajaxError","ajaxSuccess","ajaxSend"],function(i,type){jQuery.fn[type]=function(fn){return this.on(type,fn);};});jQuery.each(["get","post"],function(i,method){jQuery[method]=function(url,data,callback,type){if(jQuery.isFunction(data)){type=type||callback;callback=data;data=undefined;}
return jQuery.ajax({url:url,type:method,dataType:type,data:data,success:callback});};});jQuery.extend({active:0,lastModified:{},etag:{},ajaxSettings:{url:ajaxLocation,type:"GET",isLocal:rlocalProtocol.test(ajaxLocParts[1]),global:true,processData:true,async:true,contentType:"application/x-www-form-urlencoded; charset=UTF-8",accepts:{"*":allTypes,text:"text/plain",html:"text/html",xml:"application/xml, text/xml",json:"application/json, text/javascript"},contents:{xml:/xml/,html:/html/,json:/json/},responseFields:{xml:"responseXML",text:"responseText"},converters:{"* text":window.String,"text html":true,"text json":jQuery.parseJSON,"text xml":jQuery.parseXML},flatOptions:{url:true,context:true}},ajaxSetup:function(target,settings){return settings?ajaxExtend(ajaxExtend(target,jQuery.ajaxSettings),settings):ajaxExtend(jQuery.ajaxSettings,target);},ajaxPrefilter:addToPrefiltersOrTransports(prefilters),ajaxTransport:addToPrefiltersOrTransports(transports),ajax:function(url,options){if(typeof url==="object"){options=url;url=undefined;}
options=options||{};var
parts,i,cacheURL,responseHeadersString,timeoutTimer,fireGlobals,transport,responseHeaders,s=jQuery.ajaxSetup({},options),callbackContext=s.context||s,globalEventContext=s.context&&(callbackContext.nodeType||callbackContext.jquery)?jQuery(callbackContext):jQuery.event,deferred=jQuery.Deferred(),completeDeferred=jQuery.Callbacks("once memory"),statusCode=s.statusCode||{},requestHeaders={},requestHeadersNames={},state=0,strAbort="canceled",jqXHR={readyState:0,getResponseHeader:function(key){var match;if(state===2){if(!responseHeaders){responseHeaders={};while((match=rheaders.exec(responseHeadersString))){responseHeaders[match[1].toLowerCase()]=match[2];}}
match=responseHeaders[key.toLowerCase()];}
return match==null?null:match;},getAllResponseHeaders:function(){return state===2?responseHeadersString:null;},setRequestHeader:function(name,value){var lname=name.toLowerCase();if(!state){name=requestHeadersNames[lname]=requestHeadersNames[lname]||name;requestHeaders[name]=value;}
return this;},overrideMimeType:function(type){if(!state){s.mimeType=type;}
return this;},statusCode:function(map){var code;if(map){if(state<2){for(code in map){statusCode[code]=[statusCode[code],map[code]];}}else{jqXHR.always(map[jqXHR.status]);}}
return this;},abort:function(statusText){var finalText=statusText||strAbort;if(transport){transport.abort(finalText);}
done(0,finalText);return this;}};deferred.promise(jqXHR).complete=completeDeferred.add;jqXHR.success=jqXHR.done;jqXHR.error=jqXHR.fail;s.url=((url||s.url||ajaxLocation)+"").replace(rhash,"").replace(rprotocol,ajaxLocParts[1]+"//");s.type=options.method||options.type||s.method||s.type;s.dataTypes=jQuery.trim(s.dataType||"*").toLowerCase().match(core_rnotwhite)||[""];if(s.crossDomain==null){parts=rurl.exec(s.url.toLowerCase());s.crossDomain=!!(parts&&(parts[1]!==ajaxLocParts[1]||parts[2]!==ajaxLocParts[2]||(parts[3]||(parts[1]==="http:"?80:443))!=(ajaxLocParts[3]||(ajaxLocParts[1]==="http:"?80:443))));}
if(s.data&&s.processData&&typeof s.data!=="string"){s.data=jQuery.param(s.data,s.traditional);}
inspectPrefiltersOrTransports(prefilters,s,options,jqXHR);if(state===2){return jqXHR;}
fireGlobals=s.global;if(fireGlobals&&jQuery.active++===0){jQuery.event.trigger("ajaxStart");}
s.type=s.type.toUpperCase();s.hasContent=!rnoContent.test(s.type);cacheURL=s.url;if(!s.hasContent){if(s.data){cacheURL=(s.url+=(ajax_rquery.test(cacheURL)?"&":"?")+s.data);delete s.data;}
if(s.cache===false){s.url=rts.test(cacheURL)?cacheURL.replace(rts,"$1_="+ajax_nonce++):cacheURL+(ajax_rquery.test(cacheURL)?"&":"?")+"_="+ajax_nonce++;}}
if(s.ifModified){if(jQuery.lastModified[cacheURL]){jqXHR.setRequestHeader("If-Modified-Since",jQuery.lastModified[cacheURL]);}
if(jQuery.etag[cacheURL]){jqXHR.setRequestHeader("If-None-Match",jQuery.etag[cacheURL]);}}
if(s.data&&s.hasContent&&s.contentType!==false||options.contentType){jqXHR.setRequestHeader("Content-Type",s.contentType);}
jqXHR.setRequestHeader("Accept",s.dataTypes[0]&&s.accepts[s.dataTypes[0]]?s.accepts[s.dataTypes[0]]+(s.dataTypes[0]!=="*"?", "+allTypes+"; q=0.01":""):s.accepts["*"]);for(i in s.headers){jqXHR.setRequestHeader(i,s.headers[i]);}
if(s.beforeSend&&(s.beforeSend.call(callbackContext,jqXHR,s)===false||state===2)){return jqXHR.abort();}
strAbort="abort";for(i in{success:1,error:1,complete:1}){jqXHR[i](s[i]);}
transport=inspectPrefiltersOrTransports(transports,s,options,jqXHR);if(!transport){done(-1,"No Transport");}else{jqXHR.readyState=1;if(fireGlobals){globalEventContext.trigger("ajaxSend",[jqXHR,s]);}
if(s.async&&s.timeout>0){timeoutTimer=setTimeout(function(){jqXHR.abort("timeout");},s.timeout);}
try{state=1;transport.send(requestHeaders,done);}catch(e){if(state<2){done(-1,e);}else{throw e;}}}
function done(status,nativeStatusText,responses,headers){var isSuccess,success,error,response,modified,statusText=nativeStatusText;if(state===2){return;}
state=2;if(timeoutTimer){clearTimeout(timeoutTimer);}
transport=undefined;responseHeadersString=headers||"";jqXHR.readyState=status>0?4:0;if(responses){response=ajaxHandleResponses(s,jqXHR,responses);}
if(status>=200&&status<300||status===304){if(s.ifModified){modified=jqXHR.getResponseHeader("Last-Modified");if(modified){jQuery.lastModified[cacheURL]=modified;}
modified=jqXHR.getResponseHeader("etag");if(modified){jQuery.etag[cacheURL]=modified;}}
if(status===204){isSuccess=true;statusText="nocontent";}else if(status===304){isSuccess=true;statusText="notmodified";}else{isSuccess=ajaxConvert(s,response);statusText=isSuccess.state;success=isSuccess.data;error=isSuccess.error;isSuccess=!error;}}else{error=statusText;if(status||!statusText){statusText="error";if(status<0){status=0;}}}
jqXHR.status=status;jqXHR.statusText=(nativeStatusText||statusText)+"";if(isSuccess){deferred.resolveWith(callbackContext,[success,statusText,jqXHR]);}else{deferred.rejectWith(callbackContext,[jqXHR,statusText,error]);}
jqXHR.statusCode(statusCode);statusCode=undefined;if(fireGlobals){globalEventContext.trigger(isSuccess?"ajaxSuccess":"ajaxError",[jqXHR,s,isSuccess?success:error]);}
completeDeferred.fireWith(callbackContext,[jqXHR,statusText]);if(fireGlobals){globalEventContext.trigger("ajaxComplete",[jqXHR,s]);if(!(--jQuery.active)){jQuery.event.trigger("ajaxStop");}}}
return jqXHR;},getScript:function(url,callback){return jQuery.get(url,undefined,callback,"script");},getJSON:function(url,data,callback){return jQuery.get(url,data,callback,"json");}});function ajaxHandleResponses(s,jqXHR,responses){var firstDataType,ct,finalDataType,type,contents=s.contents,dataTypes=s.dataTypes,responseFields=s.responseFields;for(type in responseFields){if(type in responses){jqXHR[responseFields[type]]=responses[type];}}
while(dataTypes[0]==="*"){dataTypes.shift();if(ct===undefined){ct=s.mimeType||jqXHR.getResponseHeader("Content-Type");}}
if(ct){for(type in contents){if(contents[type]&&contents[type].test(ct)){dataTypes.unshift(type);break;}}}
if(dataTypes[0]in responses){finalDataType=dataTypes[0];}else{for(type in responses){if(!dataTypes[0]||s.converters[type+" "+dataTypes[0]]){finalDataType=type;break;}
if(!firstDataType){firstDataType=type;}}
finalDataType=finalDataType||firstDataType;}
if(finalDataType){if(finalDataType!==dataTypes[0]){dataTypes.unshift(finalDataType);}
return responses[finalDataType];}}
function ajaxConvert(s,response){var conv2,current,conv,tmp,converters={},i=0,dataTypes=s.dataTypes.slice(),prev=dataTypes[0];if(s.dataFilter){response=s.dataFilter(response,s.dataType);}
if(dataTypes[1]){for(conv in s.converters){converters[conv.toLowerCase()]=s.converters[conv];}}
for(;(current=dataTypes[++i]);){if(current!=="*"){if(prev!=="*"&&prev!==current){conv=converters[prev+" "+current]||converters["* "+current];if(!conv){for(conv2 in converters){tmp=conv2.split(" ");if(tmp[1]===current){conv=converters[prev+" "+tmp[0]]||converters["* "+tmp[0]];if(conv){if(conv===true){conv=converters[conv2];}else if(converters[conv2]!==true){current=tmp[0];dataTypes.splice(i--,0,current);}
break;}}}}
if(conv!==true){if(conv&&s["throws"]){response=conv(response);}else{try{response=conv(response);}catch(e){return{state:"parsererror",error:conv?e:"No conversion from "+prev+" to "+current};}}}}
prev=current;}}
return{state:"success",data:response};}
jQuery.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/(?:java|ecma)script/},converters:{"text script":function(text){jQuery.globalEval(text);return text;}}});jQuery.ajaxPrefilter("script",function(s){if(s.cache===undefined){s.cache=false;}
if(s.crossDomain){s.type="GET";s.global=false;}});jQuery.ajaxTransport("script",function(s){if(s.crossDomain){var script,head=document.head||jQuery("head")[0]||document.documentElement;return{send:function(_,callback){script=document.createElement("script");script.async=true;if(s.scriptCharset){script.charset=s.scriptCharset;}
script.src=s.url;script.onload=script.onreadystatechange=function(_,isAbort){if(isAbort||!script.readyState||/loaded|complete/.test(script.readyState)){script.onload=script.onreadystatechange=null;if(script.parentNode){script.parentNode.removeChild(script);}
script=null;if(!isAbort){callback(200,"success");}}};head.insertBefore(script,head.firstChild);},abort:function(){if(script){script.onload(undefined,true);}}};}});var oldCallbacks=[],rjsonp=/(=)\?(?=&|$)|\?\?/;jQuery.ajaxSetup({jsonp:"callback",jsonpCallback:function(){var callback=oldCallbacks.pop()||(jQuery.expando+"_"+(ajax_nonce++));this[callback]=true;return callback;}});jQuery.ajaxPrefilter("json jsonp",function(s,originalSettings,jqXHR){var callbackName,overwritten,responseContainer,jsonProp=s.jsonp!==false&&(rjsonp.test(s.url)?"url":typeof s.data==="string"&&!(s.contentType||"").indexOf("application/x-www-form-urlencoded")&&rjsonp.test(s.data)&&"data");if(jsonProp||s.dataTypes[0]==="jsonp"){callbackName=s.jsonpCallback=jQuery.isFunction(s.jsonpCallback)?s.jsonpCallback():s.jsonpCallback;if(jsonProp){s[jsonProp]=s[jsonProp].replace(rjsonp,"$1"+callbackName);}else if(s.jsonp!==false){s.url+=(ajax_rquery.test(s.url)?"&":"?")+s.jsonp+"="+callbackName;}
s.converters["script json"]=function(){if(!responseContainer){jQuery.error(callbackName+" was not called");}
return responseContainer[0];};s.dataTypes[0]="json";overwritten=window[callbackName];window[callbackName]=function(){responseContainer=arguments;};jqXHR.always(function(){window[callbackName]=overwritten;if(s[callbackName]){s.jsonpCallback=originalSettings.jsonpCallback;oldCallbacks.push(callbackName);}
if(responseContainer&&jQuery.isFunction(overwritten)){overwritten(responseContainer[0]);}
responseContainer=overwritten=undefined;});return"script";}});var xhrCallbacks,xhrSupported,xhrId=0,xhrOnUnloadAbort=window.ActiveXObject&&function(){var key;for(key in xhrCallbacks){xhrCallbacks[key](undefined,true);}};function createStandardXHR(){try{return new window.XMLHttpRequest();}catch(e){}}
function createActiveXHR(){try{return new window.ActiveXObject("Microsoft.XMLHTTP");}catch(e){}}
jQuery.ajaxSettings.xhr=window.ActiveXObject?function(){return!this.isLocal&&createStandardXHR()||createActiveXHR();}:createStandardXHR;xhrSupported=jQuery.ajaxSettings.xhr();jQuery.support.cors=!!xhrSupported&&("withCredentials"in xhrSupported);xhrSupported=jQuery.support.ajax=!!xhrSupported;if(xhrSupported){jQuery.ajaxTransport(function(s){if(!s.crossDomain||jQuery.support.cors){var callback;return{send:function(headers,complete){var handle,i,xhr=s.xhr();if(s.username){xhr.open(s.type,s.url,s.async,s.username,s.password);}else{xhr.open(s.type,s.url,s.async);}
if(s.xhrFields){for(i in s.xhrFields){xhr[i]=s.xhrFields[i];}}
if(s.mimeType&&xhr.overrideMimeType){xhr.overrideMimeType(s.mimeType);}
if(!s.crossDomain&&!headers["X-Requested-With"]){headers["X-Requested-With"]="XMLHttpRequest";}
try{for(i in headers){xhr.setRequestHeader(i,headers[i]);}}catch(err){}
xhr.send((s.hasContent&&s.data)||null);callback=function(_,isAbort){var status,responseHeaders,statusText,responses;try{if(callback&&(isAbort||xhr.readyState===4)){callback=undefined;if(handle){xhr.onreadystatechange=jQuery.noop;if(xhrOnUnloadAbort){delete xhrCallbacks[handle];}}
if(isAbort){if(xhr.readyState!==4){xhr.abort();}}else{responses={};status=xhr.status;responseHeaders=xhr.getAllResponseHeaders();if(typeof xhr.responseText==="string"){responses.text=xhr.responseText;}
try{statusText=xhr.statusText;}catch(e){statusText="";}
if(!status&&s.isLocal&&!s.crossDomain){status=responses.text?200:404;}else if(status===1223){status=204;}}}}catch(firefoxAccessException){if(!isAbort){complete(-1,firefoxAccessException);}}
if(responses){complete(status,statusText,responses,responseHeaders);}};if(!s.async){callback();}else if(xhr.readyState===4){setTimeout(callback);}else{handle=++xhrId;if(xhrOnUnloadAbort){if(!xhrCallbacks){xhrCallbacks={};jQuery(window).unload(xhrOnUnloadAbort);}
xhrCallbacks[handle]=callback;}
xhr.onreadystatechange=callback;}},abort:function(){if(callback){callback(undefined,true);}}};}});}
var fxNow,timerId,rfxtypes=/^(?:toggle|show|hide)$/,rfxnum=new RegExp("^(?:([+-])=|)("+core_pnum+")([a-z%]*)$","i"),rrun=/queueHooks$/,animationPrefilters=[defaultPrefilter],tweeners={"*":[function(prop,value){var end,unit,tween=this.createTween(prop,value),parts=rfxnum.exec(value),target=tween.cur(),start=+target||0,scale=1,maxIterations=20;if(parts){end=+parts[2];unit=parts[3]||(jQuery.cssNumber[prop]?"":"px");if(unit!=="px"&&start){start=jQuery.css(tween.elem,prop,true)||end||1;do{scale=scale||".5";start=start/scale;jQuery.style(tween.elem,prop,start+unit);}while(scale!==(scale=tween.cur()/target)&&scale!==1&&--maxIterations);}
tween.unit=unit;tween.start=start;tween.end=parts[1]?start+(parts[1]+1)*end:end;}
return tween;}]};function createFxNow(){setTimeout(function(){fxNow=undefined;});return(fxNow=jQuery.now());}
function createTweens(animation,props){jQuery.each(props,function(prop,value){var collection=(tweeners[prop]||[]).concat(tweeners["*"]),index=0,length=collection.length;for(;index<length;index++){if(collection[index].call(animation,prop,value)){return;}}});}
function Animation(elem,properties,options){var result,stopped,index=0,length=animationPrefilters.length,deferred=jQuery.Deferred().always(function(){delete tick.elem;}),tick=function(){if(stopped){return false;}
var currentTime=fxNow||createFxNow(),remaining=Math.max(0,animation.startTime+animation.duration-currentTime),temp=remaining/animation.duration||0,percent=1-temp,index=0,length=animation.tweens.length;for(;index<length;index++){animation.tweens[index].run(percent);}
deferred.notifyWith(elem,[animation,percent,remaining]);if(percent<1&&length){return remaining;}else{deferred.resolveWith(elem,[animation]);return false;}},animation=deferred.promise({elem:elem,props:jQuery.extend({},properties),opts:jQuery.extend(true,{specialEasing:{}},options),originalProperties:properties,originalOptions:options,startTime:fxNow||createFxNow(),duration:options.duration,tweens:[],createTween:function(prop,end){var tween=jQuery.Tween(elem,animation.opts,prop,end,animation.opts.specialEasing[prop]||animation.opts.easing);animation.tweens.push(tween);return tween;},stop:function(gotoEnd){var index=0,length=gotoEnd?animation.tweens.length:0;if(stopped){return this;}
stopped=true;for(;index<length;index++){animation.tweens[index].run(1);}
if(gotoEnd){deferred.resolveWith(elem,[animation,gotoEnd]);}else{deferred.rejectWith(elem,[animation,gotoEnd]);}
return this;}}),props=animation.props;propFilter(props,animation.opts.specialEasing);for(;index<length;index++){result=animationPrefilters[index].call(animation,elem,props,animation.opts);if(result){return result;}}
createTweens(animation,props);if(jQuery.isFunction(animation.opts.start)){animation.opts.start.call(elem,animation);}
jQuery.fx.timer(jQuery.extend(tick,{elem:elem,anim:animation,queue:animation.opts.queue}));return animation.progress(animation.opts.progress).done(animation.opts.done,animation.opts.complete).fail(animation.opts.fail).always(animation.opts.always);}
function propFilter(props,specialEasing){var value,name,index,easing,hooks;for(index in props){name=jQuery.camelCase(index);easing=specialEasing[name];value=props[index];if(jQuery.isArray(value)){easing=value[1];value=props[index]=value[0];}
if(index!==name){props[name]=value;delete props[index];}
hooks=jQuery.cssHooks[name];if(hooks&&"expand"in hooks){value=hooks.expand(value);delete props[name];for(index in value){if(!(index in props)){props[index]=value[index];specialEasing[index]=easing;}}}else{specialEasing[name]=easing;}}}
jQuery.Animation=jQuery.extend(Animation,{tweener:function(props,callback){if(jQuery.isFunction(props)){callback=props;props=["*"];}else{props=props.split(" ");}
var prop,index=0,length=props.length;for(;index<length;index++){prop=props[index];tweeners[prop]=tweeners[prop]||[];tweeners[prop].unshift(callback);}},prefilter:function(callback,prepend){if(prepend){animationPrefilters.unshift(callback);}else{animationPrefilters.push(callback);}}});function defaultPrefilter(elem,props,opts){var prop,index,length,value,dataShow,toggle,tween,hooks,oldfire,anim=this,style=elem.style,orig={},handled=[],hidden=elem.nodeType&&isHidden(elem);if(!opts.queue){hooks=jQuery._queueHooks(elem,"fx");if(hooks.unqueued==null){hooks.unqueued=0;oldfire=hooks.empty.fire;hooks.empty.fire=function(){if(!hooks.unqueued){oldfire();}};}
hooks.unqueued++;anim.always(function(){anim.always(function(){hooks.unqueued--;if(!jQuery.queue(elem,"fx").length){hooks.empty.fire();}});});}
if(elem.nodeType===1&&("height"in props||"width"in props)){opts.overflow=[style.overflow,style.overflowX,style.overflowY];if(jQuery.css(elem,"display")==="inline"&&jQuery.css(elem,"float")==="none"){if(!jQuery.support.inlineBlockNeedsLayout||css_defaultDisplay(elem.nodeName)==="inline"){style.display="inline-block";}else{style.zoom=1;}}}
if(opts.overflow){style.overflow="hidden";if(!jQuery.support.shrinkWrapBlocks){anim.always(function(){style.overflow=opts.overflow[0];style.overflowX=opts.overflow[1];style.overflowY=opts.overflow[2];});}}
for(index in props){value=props[index];if(rfxtypes.exec(value)){delete props[index];toggle=toggle||value==="toggle";if(value===(hidden?"hide":"show")){continue;}
handled.push(index);}}
length=handled.length;if(length){dataShow=jQuery._data(elem,"fxshow")||jQuery._data(elem,"fxshow",{});if("hidden"in dataShow){hidden=dataShow.hidden;}
if(toggle){dataShow.hidden=!hidden;}
if(hidden){jQuery(elem).show();}else{anim.done(function(){jQuery(elem).hide();});}
anim.done(function(){var prop;jQuery._removeData(elem,"fxshow");for(prop in orig){jQuery.style(elem,prop,orig[prop]);}});for(index=0;index<length;index++){prop=handled[index];tween=anim.createTween(prop,hidden?dataShow[prop]:0);orig[prop]=dataShow[prop]||jQuery.style(elem,prop);if(!(prop in dataShow)){dataShow[prop]=tween.start;if(hidden){tween.end=tween.start;tween.start=prop==="width"||prop==="height"?1:0;}}}}}
function Tween(elem,options,prop,end,easing){return new Tween.prototype.init(elem,options,prop,end,easing);}
jQuery.Tween=Tween;Tween.prototype={constructor:Tween,init:function(elem,options,prop,end,easing,unit){this.elem=elem;this.prop=prop;this.easing=easing||"swing";this.options=options;this.start=this.now=this.cur();this.end=end;this.unit=unit||(jQuery.cssNumber[prop]?"":"px");},cur:function(){var hooks=Tween.propHooks[this.prop];return hooks&&hooks.get?hooks.get(this):Tween.propHooks._default.get(this);},run:function(percent){var eased,hooks=Tween.propHooks[this.prop];if(this.options.duration){this.pos=eased=jQuery.easing[this.easing](percent,this.options.duration*percent,0,1,this.options.duration);}else{this.pos=eased=percent;}
this.now=(this.end-this.start)*eased+this.start;if(this.options.step){this.options.step.call(this.elem,this.now,this);}
if(hooks&&hooks.set){hooks.set(this);}else{Tween.propHooks._default.set(this);}
return this;}};Tween.prototype.init.prototype=Tween.prototype;Tween.propHooks={_default:{get:function(tween){var result;if(tween.elem[tween.prop]!=null&&(!tween.elem.style||tween.elem.style[tween.prop]==null)){return tween.elem[tween.prop];}
result=jQuery.css(tween.elem,tween.prop,"");return!result||result==="auto"?0:result;},set:function(tween){if(jQuery.fx.step[tween.prop]){jQuery.fx.step[tween.prop](tween);}else if(tween.elem.style&&(tween.elem.style[jQuery.cssProps[tween.prop]]!=null||jQuery.cssHooks[tween.prop])){jQuery.style(tween.elem,tween.prop,tween.now+tween.unit);}else{tween.elem[tween.prop]=tween.now;}}}};Tween.propHooks.scrollTop=Tween.propHooks.scrollLeft={set:function(tween){if(tween.elem.nodeType&&tween.elem.parentNode){tween.elem[tween.prop]=tween.now;}}};jQuery.each(["toggle","show","hide"],function(i,name){var cssFn=jQuery.fn[name];jQuery.fn[name]=function(speed,easing,callback){return speed==null||typeof speed==="boolean"?cssFn.apply(this,arguments):this.animate(genFx(name,true),speed,easing,callback);};});jQuery.fn.extend({fadeTo:function(speed,to,easing,callback){return this.filter(isHidden).css("opacity",0).show().end().animate({opacity:to},speed,easing,callback);},animate:function(prop,speed,easing,callback){var empty=jQuery.isEmptyObject(prop),optall=jQuery.speed(speed,easing,callback),doAnimation=function(){var anim=Animation(this,jQuery.extend({},prop),optall);doAnimation.finish=function(){anim.stop(true);};if(empty||jQuery._data(this,"finish")){anim.stop(true);}};doAnimation.finish=doAnimation;return empty||optall.queue===false?this.each(doAnimation):this.queue(optall.queue,doAnimation);},stop:function(type,clearQueue,gotoEnd){var stopQueue=function(hooks){var stop=hooks.stop;delete hooks.stop;stop(gotoEnd);};if(typeof type!=="string"){gotoEnd=clearQueue;clearQueue=type;type=undefined;}
if(clearQueue&&type!==false){this.queue(type||"fx",[]);}
return this.each(function(){var dequeue=true,index=type!=null&&type+"queueHooks",timers=jQuery.timers,data=jQuery._data(this);if(index){if(data[index]&&data[index].stop){stopQueue(data[index]);}}else{for(index in data){if(data[index]&&data[index].stop&&rrun.test(index)){stopQueue(data[index]);}}}
for(index=timers.length;index--;){if(timers[index].elem===this&&(type==null||timers[index].queue===type)){timers[index].anim.stop(gotoEnd);dequeue=false;timers.splice(index,1);}}
if(dequeue||!gotoEnd){jQuery.dequeue(this,type);}});},finish:function(type){if(type!==false){type=type||"fx";}
return this.each(function(){var index,data=jQuery._data(this),queue=data[type+"queue"],hooks=data[type+"queueHooks"],timers=jQuery.timers,length=queue?queue.length:0;data.finish=true;jQuery.queue(this,type,[]);if(hooks&&hooks.cur&&hooks.cur.finish){hooks.cur.finish.call(this);}
for(index=timers.length;index--;){if(timers[index].elem===this&&timers[index].queue===type){timers[index].anim.stop(true);timers.splice(index,1);}}
for(index=0;index<length;index++){if(queue[index]&&queue[index].finish){queue[index].finish.call(this);}}
delete data.finish;});}});function genFx(type,includeWidth){var which,attrs={height:type},i=0;includeWidth=includeWidth?1:0;for(;i<4;i+=2-includeWidth){which=cssExpand[i];attrs["margin"+which]=attrs["padding"+which]=type;}
if(includeWidth){attrs.opacity=attrs.width=type;}
return attrs;}
jQuery.each({slideDown:genFx("show"),slideUp:genFx("hide"),slideToggle:genFx("toggle"),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(name,props){jQuery.fn[name]=function(speed,easing,callback){return this.animate(props,speed,easing,callback);};});jQuery.speed=function(speed,easing,fn){var opt=speed&&typeof speed==="object"?jQuery.extend({},speed):{complete:fn||!fn&&easing||jQuery.isFunction(speed)&&speed,duration:speed,easing:fn&&easing||easing&&!jQuery.isFunction(easing)&&easing};opt.duration=jQuery.fx.off?0:typeof opt.duration==="number"?opt.duration:opt.duration in jQuery.fx.speeds?jQuery.fx.speeds[opt.duration]:jQuery.fx.speeds._default;if(opt.queue==null||opt.queue===true){opt.queue="fx";}
opt.old=opt.complete;opt.complete=function(){if(jQuery.isFunction(opt.old)){opt.old.call(this);}
if(opt.queue){jQuery.dequeue(this,opt.queue);}};return opt;};jQuery.easing={linear:function(p){return p;},swing:function(p){return 0.5-Math.cos(p*Math.PI)/2;}};jQuery.timers=[];jQuery.fx=Tween.prototype.init;jQuery.fx.tick=function(){var timer,timers=jQuery.timers,i=0;fxNow=jQuery.now();for(;i<timers.length;i++){timer=timers[i];if(!timer()&&timers[i]===timer){timers.splice(i--,1);}}
if(!timers.length){jQuery.fx.stop();}
fxNow=undefined;};jQuery.fx.timer=function(timer){if(timer()&&jQuery.timers.push(timer)){jQuery.fx.start();}};jQuery.fx.interval=13;jQuery.fx.start=function(){if(!timerId){timerId=setInterval(jQuery.fx.tick,jQuery.fx.interval);}};jQuery.fx.stop=function(){clearInterval(timerId);timerId=null;};jQuery.fx.speeds={slow:600,fast:200,_default:400};jQuery.fx.step={};if(jQuery.expr&&jQuery.expr.filters){jQuery.expr.filters.animated=function(elem){return jQuery.grep(jQuery.timers,function(fn){return elem===fn.elem;}).length;};}
jQuery.fn.offset=function(options){if(arguments.length){return options===undefined?this:this.each(function(i){jQuery.offset.setOffset(this,options,i);});}
var docElem,win,box={top:0,left:0},elem=this[0],doc=elem&&elem.ownerDocument;if(!doc){return;}
docElem=doc.documentElement;if(!jQuery.contains(docElem,elem)){return box;}
if(typeof elem.getBoundingClientRect!==core_strundefined){box=elem.getBoundingClientRect();}
win=getWindow(doc);return{top:box.top+(win.pageYOffset||docElem.scrollTop)-(docElem.clientTop||0),left:box.left+(win.pageXOffset||docElem.scrollLeft)-(docElem.clientLeft||0)};};jQuery.offset={setOffset:function(elem,options,i){var position=jQuery.css(elem,"position");if(position==="static"){elem.style.position="relative";}
var curElem=jQuery(elem),curOffset=curElem.offset(),curCSSTop=jQuery.css(elem,"top"),curCSSLeft=jQuery.css(elem,"left"),calculatePosition=(position==="absolute"||position==="fixed")&&jQuery.inArray("auto",[curCSSTop,curCSSLeft])>-1,props={},curPosition={},curTop,curLeft;if(calculatePosition){curPosition=curElem.position();curTop=curPosition.top;curLeft=curPosition.left;}else{curTop=parseFloat(curCSSTop)||0;curLeft=parseFloat(curCSSLeft)||0;}
if(jQuery.isFunction(options)){options=options.call(elem,i,curOffset);}
if(options.top!=null){props.top=(options.top-curOffset.top)+curTop;}
if(options.left!=null){props.left=(options.left-curOffset.left)+curLeft;}
if("using"in options){options.using.call(elem,props);}else{curElem.css(props);}}};jQuery.fn.extend({position:function(){if(!this[0]){return;}
var offsetParent,offset,parentOffset={top:0,left:0},elem=this[0];if(jQuery.css(elem,"position")==="fixed"){offset=elem.getBoundingClientRect();}else{offsetParent=this.offsetParent();offset=this.offset();if(!jQuery.nodeName(offsetParent[0],"html")){parentOffset=offsetParent.offset();}
parentOffset.top+=jQuery.css(offsetParent[0],"borderTopWidth",true);parentOffset.left+=jQuery.css(offsetParent[0],"borderLeftWidth",true);}
return{top:offset.top-parentOffset.top-jQuery.css(elem,"marginTop",true),left:offset.left-parentOffset.left-jQuery.css(elem,"marginLeft",true)};},offsetParent:function(){return this.map(function(){var offsetParent=this.offsetParent||document.documentElement;while(offsetParent&&(!jQuery.nodeName(offsetParent,"html")&&jQuery.css(offsetParent,"position")==="static")){offsetParent=offsetParent.offsetParent;}
return offsetParent||document.documentElement;});}});jQuery.each({scrollLeft:"pageXOffset",scrollTop:"pageYOffset"},function(method,prop){var top=/Y/.test(prop);jQuery.fn[method]=function(val){return jQuery.access(this,function(elem,method,val){var win=getWindow(elem);if(val===undefined){return win?(prop in win)?win[prop]:win.document.documentElement[method]:elem[method];}
if(win){win.scrollTo(!top?val:jQuery(win).scrollLeft(),top?val:jQuery(win).scrollTop());}else{elem[method]=val;}},method,val,arguments.length,null);};});function getWindow(elem){return jQuery.isWindow(elem)?elem:elem.nodeType===9?elem.defaultView||elem.parentWindow:false;}
jQuery.each({Height:"height",Width:"width"},function(name,type){jQuery.each({padding:"inner"+name,content:type,"":"outer"+name},function(defaultExtra,funcName){jQuery.fn[funcName]=function(margin,value){var chainable=arguments.length&&(defaultExtra||typeof margin!=="boolean"),extra=defaultExtra||(margin===true||value===true?"margin":"border");return jQuery.access(this,function(elem,type,value){var doc;if(jQuery.isWindow(elem)){return elem.document.documentElement["client"+name];}
if(elem.nodeType===9){doc=elem.documentElement;return Math.max(elem.body["scroll"+name],doc["scroll"+name],elem.body["offset"+name],doc["offset"+name],doc["client"+name]);}
return value===undefined?jQuery.css(elem,type,extra):jQuery.style(elem,type,value,extra);},type,chainable?margin:undefined,chainable,null);};});});window.jQuery=window.$=jQuery;if(typeof define==="function"&&define.amd&&define.amd.jQuery){define("jquery",[],function(){return jQuery;});}})(window);jQuery(function($){var _oldShow=$.fn.show;$.fn.show=function(speed,oldCallback){return $(this).each(function(){var obj=$(this),newCallback=function(){if($.isFunction(oldCallback)){oldCallback.apply(obj);}
    obj.trigger('afterShow');
}; obj.trigger('beforeShow'); _oldShow.apply(obj, [speed, newCallback]);
});
}
});
$(document).bind("mobileinit", function () {

    $.mobile.ajaxEnabled = false;

});

/*
 * Superclick v1.0.0 - jQuery menu widget
 * Copyright (c) 2013 Joel Birch
 *
 * Dual licensed under the MIT and GPL licenses:
 * 	http://www.opensource.org/licenses/mit-license.php
 * 	http://www.gnu.org/licenses/gpl.html
 */

; (function ($) {

    var methods = (function () {
        // private properties and methods go here
        var c = {
            bcClass: 'sf-breadcrumb',
            menuClass: 'sf-js-enabled',
            anchorClass: 'sf-with-ul',
            menuArrowClass: 'sf-arrows'
        },
			outerClick = (function () {
			    $(window).load(function () {
			        $('body').children().on('click.superclick', function () {
			            var $allMenus = $('.sf-js-enabled');
			            $allMenus.superclick('reset');
			        });
			    });
			})(),
			toggleMenuClasses = function ($menu, o) {
			    var classes = c.menuClass;
			    if (o.cssArrows) {
			        classes += ' ' + c.menuArrowClass;
			    }
			    $menu.toggleClass(classes);
			},
			setPathToCurrent = function ($menu, o) {
			    return $menu.find('li.' + o.pathClass).slice(0, o.pathLevels)
					.addClass(o.activeClass + ' ' + c.bcClass)
						.filter(function () {
						    return ($(this).children('ul').hide().show().length);
						}).removeClass(o.pathClass);
			},
			toggleAnchorClass = function ($li) {
			    $li.children('a').toggleClass(c.anchorClass);
			},
			toggleTouchAction = function ($menu) {
			    var touchAction = $menu.css('ms-touch-action');
			    touchAction = (touchAction === 'pan-y') ? 'auto' : 'pan-y';
			    $menu.css('ms-touch-action', touchAction);
			},
			clickHandler = function (e) {
			    var $this = $(this),
					$ul = $this.siblings('ul'),
					func;

			    if ($ul.length) {
			        func = ($ul.is(':hidden')) ? over : out;
			        $.proxy(func, $this.parent('li'))();
			        return false;
			    }
			},
			over = function () {
			    var $this = $(this),
					o = getOptions($this);
			    $this.siblings().superclick('hide').end().superclick('show');
			},
			out = function () {
			    var $this = $(this),
					o = getOptions($this);
			    $.proxy(close, $this, o)();
			},
			close = function (o) {
			    o.retainPath = ($.inArray(this[0], o.$path) > -1);
			    this.superclick('hide');

			    if (!this.parents('.' + o.activeClass).length) {
			        o.onIdle.call(getMenu(this));
			        if (o.$path.length) {
			            $.proxy(over, o.$path)();
			        }
			    }
			},
			getMenu = function ($el) {
			    return $el.closest('.' + c.menuClass);
			},
			getOptions = function ($el) {
			    return getMenu($el).data('sf-options');
			};

        return {
            // public methods
            hide: function (instant) {
                if (this.length) {
                    var $this = this,
						o = getOptions($this);
                    if (!o) {
                        return this;
                    }
                    var not = (o.retainPath === true) ? o.$path : '',
						$ul = $this.find('li.' + o.activeClass).add(this).not(not).removeClass(o.activeClass).children('ul'),
						speed = o.speedOut;

                    if (instant) {
                        $ul.show();
                        speed = 0;
                    }
                    o.retainPath = false;
                    o.onBeforeHide.call($ul);
                    $ul.stop(true, true).animate(o.animationOut, speed, function () {
                        var $this = $(this);
                        o.onHide.call($this);
                    });
                }
                return this;
            },
            show: function () {
                var o = getOptions(this);
                if (!o) {
                    return this;
                }
                var $this = this.addClass(o.activeClass),
					$ul = $this.children('ul');

                o.onBeforeShow.call($ul);
                $ul.stop(true, true).animate(o.animation, o.speed, function () {
                    o.onShow.call($ul);
                });
                return this;
            },
            destroy: function () {
                return this.each(function () {
                    var $this = $(this),
						o = $this.data('sf-options'),
						$liHasUl = $this.find('li:has(ul)');
                    if (!o) {
                        return false;
                    }
                    toggleMenuClasses($this, o);
                    toggleAnchorClass($liHasUl);
                    toggleTouchAction($this);
                    // remove event handlers
                    $this.off('.superclick');
                    // clear animation's inline display style
                    $liHasUl.children('ul').attr('style', function (i, style) {
                        return style.replace(/display[^;]+;?/g, '');
                    });
                    // reset 'current' path classes
                    o.$path.removeClass(o.activeClass + ' ' + c.bcClass).addClass(o.pathClass);
                    $this.find('.' + o.activeClass).removeClass(o.activeClass);
                    o.onDestroy.call($this);
                    $this.removeData('sf-options');
                });
            },
            reset: function () {
                return this.each(function () {
                    var $menu = $(this),
						o = getOptions($menu),
						$openLis = $($menu.find('.' + o.activeClass).toArray().reverse());
                    $openLis.children('a').trigger('click');
                });
            },
            init: function (op) {
                return this.each(function () {
                    var $this = $(this);
                    if ($this.data('sf-options')) {
                        return false;
                    }
                    var o = $.extend({}, $.fn.superclick.defaults, op),
						$liHasUl = $this.find('li:has(ul)');
                    o.$path = setPathToCurrent($this, o);

                    $this.data('sf-options', o);

                    toggleMenuClasses($this, o);
                    toggleAnchorClass($liHasUl);
                    toggleTouchAction($this);
                    $this.on('click.superclick', 'a', clickHandler);

                    $liHasUl.not('.' + c.bcClass).superclick('hide', true);

                    o.onInit.call(this);
                });
            }
        };
    })();

    $.fn.superclick = function (method, args) {
        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        }
        else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        }
        else {
            return $.error('Method ' + method + ' does not exist on jQuery.fn.superclick');
        }
    };

    $.fn.superclick.defaults = {
        activeClass: 'sfHover', // keep 'hover' in classname for compatibility reasons
        pathClass: 'overrideThisToUse',
        pathLevels: 1,
        animation: { opacity: 'show' },
        animationOut: { opacity: 'hide' },
        speed: 'normal',
        speedOut: 'fast',
        cssArrows: true,
        onInit: $.noop,
        onBeforeShow: $.noop,
        onShow: $.noop,
        onBeforeHide: $.noop,
        onHide: $.noop,
        onIdle: $.noop,
        onDestroy: $.noop
    };

})(jQuery); 
(function (a, b, c) { typeof define == "function" && define.amd ? define(["jquery"], function (d) { return c(d, a, b), d.mobile }) : c(a.jQuery, a, b) })(this, document, function (a, b, c, d) { (function (a, b, d) { function k(a) { return a = a || location.href, "#" + a.replace(/^[^#]*#?(.*)$/, "$1") } var e = "hashchange", f = c, g, h = a.event.special, i = f.documentMode, j = "on" + e in b && (i === d || i > 7); a.fn[e] = function (a) { return a ? this.bind(e, a) : this.trigger(e) }, a.fn[e].delay = 50, h[e] = a.extend(h[e], { setup: function () { if (j) return !1; a(g.start) }, teardown: function () { if (j) return !1; a(g.stop) } }), g = function () { function n() { var c = k(), d = m(h); c !== h ? (l(h = c, d), a(b).trigger(e)) : d !== h && (location.href = location.href.replace(/#.*/, "") + d), g = setTimeout(n, a.fn[e].delay) } var c = {}, g, h = k(), i = function (a) { return a }, l = i, m = i; return c.start = function () { g || n() }, c.stop = function () { g && clearTimeout(g), g = d }, b.attachEvent && !b.addEventListener && !j && function () { var b, d; c.start = function () { b || (d = a.fn[e].src, d = d && d + k(), b = a('<iframe tabindex="-1" title="empty"/>').hide().one("load", function () { d || l(k()), n() }).attr("src", d || "javascript:0").insertAfter("body")[0].contentWindow, f.onpropertychange = function () { try { event.propertyName === "title" && (b.document.title = f.title) } catch (a) { } }) }, c.stop = i, m = function () { return k(b.location.href) }, l = function (c, d) { var g = b.document, h = a.fn[e].domain; c !== d && (g.title = f.title, g.open(), h && g.write('<script>document.domain="' + h + '"</script>'), g.close(), b.location.hash = c) } }(), c }() })(a, this), function (a) { a.event.special.throttledresize = { setup: function () { a(this).bind("resize", c) }, teardown: function () { a(this).unbind("resize", c) } }; var b = 250, c = function () { f = (new Date).getTime(), g = f - d, g >= b ? (d = f, a(this).trigger("throttledresize")) : (e && clearTimeout(e), e = setTimeout(c, b - g)) }, d = 0, e, f, g }(a), function (a, b) { a.fn.fieldcontain = function (a) { return this.addClass("ui-field-contain ui-body ui-br").contents().filter(function () { return this.nodeType === 3 && !/\S/.test(this.nodeValue) }).remove() }, a(c).bind("pagecreate create", function (b) { a(":jqmData(role='fieldcontain')", b.target).jqmEnhanceable().fieldcontain() }) }(a), function (a, b) { a.fn.grid = function (b) { return this.each(function () { var c = a(this), d = a.extend({ grid: null }, b), e = c.children(), f = { solo: 1, a: 2, b: 3, c: 4, d: 5 }, g = d.grid, h; if (!g) if (e.length <= 5) for (var i in f) f[i] === e.length && (g = i); else g = "a", c.addClass("ui-grid-duo"); h = f[g], c.addClass("ui-grid-" + g), e.filter(":nth-child(" + h + "n+1)").addClass("ui-block-a"), h > 1 && e.filter(":nth-child(" + h + "n+2)").addClass("ui-block-b"), h > 2 && e.filter(":nth-child(" + h + "n+3)").addClass("ui-block-c"), h > 3 && e.filter(":nth-child(" + h + "n+4)").addClass("ui-block-d"), h > 4 && e.filter(":nth-child(" + h + "n+5)").addClass("ui-block-e") }) } }(a), function (a, b) { a(c).bind("pagecreate create", function (b) { a(b.target).find("a").jqmEnhanceable().not(".ui-btn, .ui-link-inherit, :jqmData(role='none'), :jqmData(role='nojs')").addClass("ui-link") }) }(a), function (a, b) { a(c).bind("pagecreate create", function (b) { a(":jqmData(role='nojs')", b.target).addClass("ui-nojs") }) }(a), function (a) { a.mobile = {} }(a), function (a, b, d) { var e = {}; a.mobile = a.extend(a.mobile, { version: "1.3.0", ns: "", subPageUrlKey: "ui-page", activePageClass: "ui-page-active", activeBtnClass: "ui-btn-active", focusClass: "ui-focus", ajaxEnabled: !0, hashListeningEnabled: !0, linkBindingEnabled: !0, defaultPageTransition: "fade", maxTransitionWidth: !1, minScrollBack: 250, touchOverflowEnabled: !1, defaultDialogTransition: "pop", pageLoadErrorMessage: "Error Loading Page", pageLoadErrorMessageTheme: "e", phonegapNavigationEnabled: !1, autoInitializePage: !0, pushStateEnabled: !0, ignoreContentEnabled: !1, orientationChangeEnabled: !0, buttonMarkup: { hoverDelay: 200 }, window: a(b), document: a(c), keyCode: { ALT: 18, BACKSPACE: 8, CAPS_LOCK: 20, COMMA: 188, COMMAND: 91, COMMAND_LEFT: 91, COMMAND_RIGHT: 93, CONTROL: 17, DELETE: 46, DOWN: 40, END: 35, ENTER: 13, ESCAPE: 27, HOME: 36, INSERT: 45, LEFT: 37, MENU: 93, NUMPAD_ADD: 107, NUMPAD_DECIMAL: 110, NUMPAD_DIVIDE: 111, NUMPAD_ENTER: 108, NUMPAD_MULTIPLY: 106, NUMPAD_SUBTRACT: 109, PAGE_DOWN: 34, PAGE_UP: 33, PERIOD: 190, RIGHT: 39, SHIFT: 16, SPACE: 32, TAB: 9, UP: 38, WINDOWS: 91 }, behaviors: {}, silentScroll: function (c) { a.type(c) !== "number" && (c = a.mobile.defaultHomeScroll), a.event.special.scrollstart.enabled = !1, setTimeout(function () { b.scrollTo(0, c), a.mobile.document.trigger("silentscroll", { x: 0, y: c }) }, 20), setTimeout(function () { a.event.special.scrollstart.enabled = !0 }, 150) }, nsNormalizeDict: e, nsNormalize: function (b) { if (!b) return; return e[b] || (e[b] = a.camelCase(a.mobile.ns + b)) }, getInheritedTheme: function (a, b) { var c = a[0], d = "", e = /ui-(bar|body|overlay)-([a-z])\b/, f, g; while (c) { f = c.className || ""; if (f && (g = e.exec(f)) && (d = g[2])) break; c = c.parentNode } return d || b || "a" }, closestPageData: function (a) { return a.closest(':jqmData(role="page"), :jqmData(role="dialog")').data("mobile-page") }, enhanceable: function (a) { return this.haveParents(a, "enhance") }, hijackable: function (a) { return this.haveParents(a, "ajax") }, haveParents: function (b, c) { if (!a.mobile.ignoreContentEnabled) return b; var d = b.length, e = a(), f, g, h; for (var i = 0; i < d; i++) { g = b.eq(i), h = !1, f = b[i]; while (f) { var j = f.getAttribute ? f.getAttribute("data-" + a.mobile.ns + c) : ""; if (j === "false") { h = !0; break } f = f.parentNode } h || (e = e.add(g)) } return e }, getScreenHeight: function () { return b.innerHeight || a.mobile.window.height() } }, a.mobile), a.fn.jqmData = function (b, c) { var e; return typeof b != "undefined" && (b && (b = a.mobile.nsNormalize(b)), arguments.length < 2 || c === d ? e = this.data(b) : e = this.data(b, c)), e }, a.jqmData = function (b, c, d) { var e; return typeof c != "undefined" && (e = a.data(b, c ? a.mobile.nsNormalize(c) : c, d)), e }, a.fn.jqmRemoveData = function (b) { return this.removeData(a.mobile.nsNormalize(b)) }, a.jqmRemoveData = function (b, c) { return a.removeData(b, a.mobile.nsNormalize(c)) }, a.fn.removeWithDependents = function () { a.removeWithDependents(this) }, a.removeWithDependents = function (b) { var c = a(b); (c.jqmData("dependents") || a()).remove(), c.remove() }, a.fn.addDependents = function (b) { a.addDependents(a(this), b) }, a.addDependents = function (b, c) { var d = a(b).jqmData("dependents") || a(); a(b).jqmData("dependents", a.merge(d, c)) }, a.fn.getEncodedText = function () { return a("<div/>").text(a(this).text()).html() }, a.fn.jqmEnhanceable = function () { return a.mobile.enhanceable(this) }, a.fn.jqmHijackable = function () { return a.mobile.hijackable(this) }; var f = a.find, g = /:jqmData\(([^)]*)\)/g; a.find = function (b, c, d, e) { return b = b.replace(g, "[data-" + (a.mobile.ns || "") + "$1]"), f.call(this, b, c, d, e) }, a.extend(a.find, f), a.find.matches = function (b, c) { return a.find(b, null, null, c) }, a.find.matchesSelector = function (b, c) { return a.find(c, null, null, [b]).length > 0 } }(a, this), function (a, d) { b.matchMedia = b.matchMedia || function (a, b) { var c, d = a.documentElement, e = d.firstElementChild || d.firstChild, f = a.createElement("body"), g = a.createElement("div"); return g.id = "mq-test-1", g.style.cssText = "position:absolute;top:-100em", f.style.background = "none", f.appendChild(g), function (a) { return g.innerHTML = '&shy;<style media="' + a + '"> #mq-test-1 { width: 42px; }</style>', d.insertBefore(f, e), c = g.offsetWidth === 42, d.removeChild(f), { matches: c, media: a } } }(c), a.mobile.media = function (a) { return b.matchMedia(a).matches } }(a), function (a, c) { a.extend(a.support, { orientation: "orientation" in b && "onorientationchange" in b }) }(a), function (a, b) { function o() { var a = g(); a !== h && (h = a, d.trigger(e)) } var d = a(b), e = "orientationchange", f, g, h, i, j, k = { 0: !0, 180: !0 }; if (a.support.orientation) { var l = b.innerWidth || d.width(), m = b.innerHeight || d.height(), n = 50; i = l > m && l - m > n, j = k[b.orientation]; if (i && j || !i && !j) k = { "-90": !0, 90: !0 } } a.event.special.orientationchange = a.extend({}, a.event.special.orientationchange, { setup: function () { if (a.support.orientation && !a.event.special.orientationchange.disabled) return !1; h = g(), d.bind("throttledresize", o) }, teardown: function () { if (a.support.orientation && !a.event.special.orientationchange.disabled) return !1; d.unbind("throttledresize", o) }, add: function (a) { var b = a.handler; a.handler = function (a) { return a.orientation = g(), b.apply(this, arguments) } } }), a.event.special.orientationchange.orientation = g = function () { var d = !0, e = c.documentElement; return a.support.orientation ? d = k[b.orientation] : d = e && e.clientWidth / e.clientHeight < 1.1, d ? "portrait" : "landscape" }, a.fn[e] = function (a) { return a ? this.bind(e, a) : this.trigger(e) }, a.attrFn && (a.attrFn[e] = !0) }(a, this), function (a, b) { var d = { touch: "ontouchend" in c }; a.mobile.support = a.mobile.support || {}, a.extend(a.support, d), a.extend(a.mobile.support, d) }(a), function (a, d) { function e(a) { var b = a.charAt(0).toUpperCase() + a.substr(1), c = (a + " " + h.join(b + " ") + b).split(" "); for (var e in c) if (g[c[e]] !== d) return !0 } function m(a, b, d) { var e = c.createElement("div"), f = function (a) { return a.charAt(0).toUpperCase() + a.substr(1) }, g = function (a) { return a === "" ? "" : "-" + a.charAt(0).toLowerCase() + a.substr(1) + "-" }, i = function (c) { var d = g(c) + a + ": " + b + ";", h = f(c), i = h + (h === "" ? a : f(a)); e.setAttribute("style", d), !e.style[i] || (k = !0) }, j = d ? d : h, k; for (var l = 0; l < j.length; l++) i(j[l]); return !!k } function n() { var e = "transform-3d", g = a.mobile.media("(-" + h.join("-" + e + "),(-") + "-" + e + "),(" + e + ")"); if (g) return !!g; var i = c.createElement("div"), j = { MozTransform: "-moz-transform", transform: "transform" }; f.append(i); for (var k in j) i.style[k] !== d && (i.style[k] = "translate3d( 100px, 1px, 1px )", g = b.getComputedStyle(i).getPropertyValue(j[k])); return !!g && g !== "none" } function o() { var b = location.protocol + "//" + location.host + location.pathname + "ui-dir/", c = a("head base"), d = null, e = "", g, h; return c.length ? e = c.attr("href") : c = d = a("<base>", { href: b }).appendTo("head"), g = a("<a href='testurl' />").prependTo(f), h = g[0].href, c[0].href = e || location.pathname, d && d.remove(), h.indexOf(b) === 0 } function p() { var a = c.createElement("x"), d = c.documentElement, e = b.getComputedStyle, f; return "pointerEvents" in a.style ? (a.style.pointerEvents = "auto", a.style.pointerEvents = "x", d.appendChild(a), f = e && e(a, "").pointerEvents === "auto", d.removeChild(a), !!f) : !1 } function q() { var a = c.createElement("div"); return typeof a.getBoundingClientRect != "undefined" } function r() { var a = b, c = navigator.userAgent, d = navigator.platform, e = c.match(/AppleWebKit\/([0-9]+)/), f = !!e && e[1], g = c.match(/Fennec\/([0-9]+)/), h = !!g && g[1], i = c.match(/Opera Mobi\/([0-9]+)/), j = !!i && i[1]; return (d.indexOf("iPhone") > -1 || d.indexOf("iPad") > -1 || d.indexOf("iPod") > -1) && f && f < 534 || a.operamini && {}.toString.call(a.operamini) === "[object OperaMini]" || i && j < 7458 || c.indexOf("Android") > -1 && f && f < 533 || h && h < 6 || "palmGetResource" in b && f && f < 534 || c.indexOf("MeeGo") > -1 && c.indexOf("NokiaBrowser/8.5.0") > -1 ? !1 : !0 } var f = a("<body>").prependTo("html"), g = f[0].style, h = ["Webkit", "Moz", "O"], i = "palmGetResource" in b, j = b.opera, k = b.operamini && {}.toString.call(b.operamini) === "[object OperaMini]", l = b.blackberry && !e("-webkit-transform"); a.extend(a.mobile, { browser: {} }), a.mobile.browser.oldIE = function () { var a = 3, b = c.createElement("div"), d = b.all || []; do b.innerHTML = "<!--[if gt IE " + ++a + "]><br><![endif]-->"; while (d[0]); return a > 4 ? a : !a }(), a.extend(a.support, { cssTransitions: "WebKitTransitionEvent" in b || m("transition", "height 100ms linear", ["Webkit", "Moz", ""]) && !a.mobile.browser.oldIE && !j, pushState: "pushState" in history && "replaceState" in history && b.navigator.userAgent.search(/CriOS/) === -1, mediaquery: a.mobile.media("only all"), cssPseudoElement: !!e("content"), touchOverflow: !!e("overflowScrolling"), cssTransform3d: n(), boxShadow: !!e("boxShadow") && !l, fixedPosition: r(), scrollTop: ("pageXOffset" in b || "scrollTop" in c.documentElement || "scrollTop" in f[0]) && !i && !k, dynamicBaseTag: o(), cssPointerEvents: p(), boundingRect: q() }), f.remove(); var s = function () { var a = b.navigator.userAgent; return a.indexOf("Nokia") > -1 && (a.indexOf("Symbian/3") > -1 || a.indexOf("Series60/5") > -1) && a.indexOf("AppleWebKit") > -1 && a.match(/(BrowserNG|NokiaBrowser)\/7\.[0-3]/) }(); a.mobile.gradeA = function () { return (a.support.mediaquery || a.mobile.browser.oldIE && a.mobile.browser.oldIE >= 7) && (a.support.boundingRect || a.fn.jquery.match(/1\.[0-7+]\.[0-9+]?/) !== null) }, a.mobile.ajaxBlacklist = b.blackberry && !b.WebKitPoint || k || s, s && a(function () { a("head link[rel='stylesheet']").attr("rel", "alternate stylesheet").attr("rel", "stylesheet") }), a.support.boxShadow || a("html").addClass("ui-mobile-nosupport-boxshadow") }(a), function (a, b) { var c = a.mobile.window, d, e; a.event.special.navigate = d = { bound: !1, pushStateEnabled: !0, originalEventName: b, isPushStateEnabled: function () { return a.support.pushState && a.mobile.pushStateEnabled === !0 && this.isHashChangeEnabled() }, isHashChangeEnabled: function () { return a.mobile.hashListeningEnabled === !0 }, popstate: function (b) { var d = new a.Event("navigate"), e = new a.Event("beforenavigate"), f = b.originalEvent.state || {}, g = location.href; c.trigger(e); if (e.isDefaultPrevented()) return; b.historyState && a.extend(f, b.historyState), d.originalEvent = b, setTimeout(function () { c.trigger(d, { state: f }) }, 0) }, hashchange: function (b, d) { var e = new a.Event("navigate"), f = new a.Event("beforenavigate"); c.trigger(f); if (f.isDefaultPrevented()) return; e.originalEvent = b, c.trigger(e, { state: b.hashchangeState || {} }) }, setup: function (a, b) { if (d.bound) return; d.bound = !0, d.isPushStateEnabled() ? (d.originalEventName = "popstate", c.bind("popstate.navigate", d.popstate)) : d.isHashChangeEnabled() && (d.originalEventName = "hashchange", c.bind("hashchange.navigate", d.hashchange)) } } }(a), function (a, b, c) { var d = function (d) { return d === c && (d = !0), function (c, e, f, g) { var h = new a.Deferred, i = e ? " reverse" : "", j = a.mobile.urlHistory.getActive(), k = j.lastScroll || a.mobile.defaultHomeScroll, l = a.mobile.getScreenHeight(), m = a.mobile.maxTransitionWidth !== !1 && a.mobile.window.width() > a.mobile.maxTransitionWidth, n = !a.support.cssTransitions || m || !c || c === "none" || Math.max(a.mobile.window.scrollTop(), k) > a.mobile.getMaxScrollForTransition(), o = " ui-page-pre-in", p = function () { a.mobile.pageContainer.toggleClass("ui-mobile-viewport-transitioning viewport-" + c) }, q = function () { a.event.special.scrollstart.enabled = !1, b.scrollTo(0, k), setTimeout(function () { a.event.special.scrollstart.enabled = !0 }, 150) }, r = function () { g.removeClass(a.mobile.activePageClass + " out in reverse " + c).height("") }, s = function () { d ? g.animationComplete(t) : t(), g.height(l + a.mobile.window.scrollTop()).addClass(c + " out" + i) }, t = function () { g && d && r(), u() }, u = function () { f.css("z-index", -10), f.addClass(a.mobile.activePageClass + o), a.mobile.focusPage(f), f.height(l + k), q(), f.css("z-index", ""), n || f.animationComplete(v), f.removeClass(o).addClass(c + " in" + i), n && v() }, v = function () { d || g && r(), f.removeClass("out in reverse " + c).height(""), p(), a.mobile.window.scrollTop() !== k && q(), h.resolve(c, e, f, g, !0) }; return p(), g && !n ? s() : t(), h.promise() } }, e = d(), f = d(!1), g = function () { return a.mobile.getScreenHeight() * 3 }; a.mobile.defaultTransitionHandler = e, a.mobile.transitionHandlers = { "default": a.mobile.defaultTransitionHandler, sequential: e, simultaneous: f }, a.mobile.transitionFallbacks = {}, a.mobile._maybeDegradeTransition = function (b) { return b && !a.support.cssTransform3d && a.mobile.transitionFallbacks[b] && (b = a.mobile.transitionFallbacks[b]), b }, a.mobile.getMaxScrollForTransition = a.mobile.getMaxScrollForTransition || g }(a, this), function (a, b, c, d) { function x(a) { while (a && typeof a.originalEvent != "undefined") a = a.originalEvent; return a } function y(b, c) { var e = b.type, f, g, i, k, l, m, n, o, p; b = a.Event(b), b.type = c, f = b.originalEvent, g = a.event.props, e.search(/^(mouse|click)/) > -1 && (g = j); if (f) for (n = g.length, k; n;) k = g[--n], b[k] = f[k]; e.search(/mouse(down|up)|click/) > -1 && !b.which && (b.which = 1); if (e.search(/^touch/) !== -1) { i = x(f), e = i.touches, l = i.changedTouches, m = e && e.length ? e[0] : l && l.length ? l[0] : d; if (m) for (o = 0, p = h.length; o < p; o++) k = h[o], b[k] = m[k] } return b } function z(b) { var c = {}, d, f; while (b) { d = a.data(b, e); for (f in d) d[f] && (c[f] = c.hasVirtualBinding = !0); b = b.parentNode } return c } function A(b, c) { var d; while (b) { d = a.data(b, e); if (d && (!c || d[c])) return b; b = b.parentNode } return null } function B() { r = !1 } function C() { r = !0 } function D() { v = 0, p.length = 0, q = !1, C() } function E() { B() } function F() { G(), l = setTimeout(function () { l = 0, D() }, a.vmouse.resetTimerDuration) } function G() { l && (clearTimeout(l), l = 0) } function H(b, c, d) { var e; if (d && d[b] || !d && A(c.target, b)) e = y(c, b), a(c.target).trigger(e); return e } function I(b) { var c = a.data(b.target, f); if (!q && (!v || v !== c)) { var d = H("v" + b.type, b); d && (d.isDefaultPrevented() && b.preventDefault(), d.isPropagationStopped() && b.stopPropagation(), d.isImmediatePropagationStopped() && b.stopImmediatePropagation()) } } function J(b) { var c = x(b).touches, d, e; if (c && c.length === 1) { d = b.target, e = z(d); if (e.hasVirtualBinding) { v = u++, a.data(d, f, v), G(), E(), o = !1; var g = x(b).touches[0]; m = g.pageX, n = g.pageY, H("vmouseover", b, e), H("vmousedown", b, e) } } } function K(a) { if (r) return; o || H("vmousecancel", a, z(a.target)), o = !0, F() } function L(b) { if (r) return; var c = x(b).touches[0], d = o, e = a.vmouse.moveDistanceThreshold, f = z(b.target); o = o || Math.abs(c.pageX - m) > e || Math.abs(c.pageY - n) > e, o && !d && H("vmousecancel", b, f), H("vmousemove", b, f), F() } function M(a) { if (r) return; C(); var b = z(a.target), c; H("vmouseup", a, b); if (!o) { var d = H("vclick", a, b); d && d.isDefaultPrevented() && (c = x(a).changedTouches[0], p.push({ touchID: v, x: c.clientX, y: c.clientY }), q = !0) } H("vmouseout", a, b), o = !1, F() } function N(b) { var c = a.data(b, e), d; if (c) for (d in c) if (c[d]) return !0; return !1 } function O() { } function P(b) { var c = b.substr(1); return { setup: function (d, f) { N(this) || a.data(this, e, {}); var g = a.data(this, e); g[b] = !0, k[b] = (k[b] || 0) + 1, k[b] === 1 && t.bind(c, I), a(this).bind(c, O), s && (k.touchstart = (k.touchstart || 0) + 1, k.touchstart === 1 && t.bind("touchstart", J).bind("touchend", M).bind("touchmove", L).bind("scroll", K)) }, teardown: function (d, f) { --k[b], k[b] || t.unbind(c, I), s && (--k.touchstart, k.touchstart || t.unbind("touchstart", J).unbind("touchmove", L).unbind("touchend", M).unbind("scroll", K)); var g = a(this), h = a.data(this, e); h && (h[b] = !1), g.unbind(c, O), N(this) || g.removeData(e) } } } var e = "virtualMouseBindings", f = "virtualTouchID", g = "vmouseover vmousedown vmousemove vmouseup vclick vmouseout vmousecancel".split(" "), h = "clientX clientY pageX pageY screenX screenY".split(" "), i = a.event.mouseHooks ? a.event.mouseHooks.props : [], j = a.event.props.concat(i), k = {}, l = 0, m = 0, n = 0, o = !1, p = [], q = !1, r = !1, s = "addEventListener" in c, t = a(c), u = 1, v = 0, w; a.vmouse = { moveDistanceThreshold: 10, clickDistanceThreshold: 10, resetTimerDuration: 1500 }; for (var Q = 0; Q < g.length; Q++) a.event.special[g[Q]] = P(g[Q]); s && c.addEventListener("click", function (b) { var c = p.length, d = b.target, e, g, h, i, j, k; if (c) { e = b.clientX, g = b.clientY, w = a.vmouse.clickDistanceThreshold, h = d; while (h) { for (i = 0; i < c; i++) { j = p[i], k = 0; if (h === d && Math.abs(j.x - e) < w && Math.abs(j.y - g) < w || a.data(h, f) === j.touchID) { b.preventDefault(), b.stopPropagation(); return } } h = h.parentNode } } }, !0) }(a, b, c), function (a, b, d) { function k(b, c, d) { var e = d.type; d.type = c, a.event.dispatch.call(b, d), d.type = e } var e = a(c); a.each("touchstart touchmove touchend tap taphold swipe swipeleft swiperight scrollstart scrollstop".split(" "), function (b, c) { a.fn[c] = function (a) { return a ? this.bind(c, a) : this.trigger(c) }, a.attrFn && (a.attrFn[c] = !0) }); var f = a.mobile.support.touch, g = "touchmove scroll", h = f ? "touchstart" : "mousedown", i = f ? "touchend" : "mouseup", j = f ? "touchmove" : "mousemove"; a.event.special.scrollstart = { enabled: !0, setup: function () { function f(a, c) { d = c, k(b, d ? "scrollstart" : "scrollstop", a) } var b = this, c = a(b), d, e; c.bind(g, function (b) { if (!a.event.special.scrollstart.enabled) return; d || f(b, !0), clearTimeout(e), e = setTimeout(function () { f(b, !1) }, 50) }) } }, a.event.special.tap = { tapholdThreshold: 750, setup: function () { var b = this, c = a(b); c.bind("vmousedown", function (d) { function i() { clearTimeout(h) } function j() { i(), c.unbind("vclick", l).unbind("vmouseup", i), e.unbind("vmousecancel", j) } function l(a) { j(), f === a.target && k(b, "tap", a) } if (d.which && d.which !== 1) return !1; var f = d.target, g = d.originalEvent, h; c.bind("vmouseup", i).bind("vclick", l), e.bind("vmousecancel", j), h = setTimeout(function () { k(b, "taphold", a.Event("taphold", { target: f })) }, a.event.special.tap.tapholdThreshold) }) } }, a.event.special.swipe = { scrollSupressionThreshold: 30, durationThreshold: 1e3, horizontalDistanceThreshold: 30, verticalDistanceThreshold: 75, start: function (b) { var c = b.originalEvent.touches ? b.originalEvent.touches[0] : b; return { time: (new Date).getTime(), coords: [c.pageX, c.pageY], origin: a(b.target) } }, stop: function (a) { var b = a.originalEvent.touches ? a.originalEvent.touches[0] : a; return { time: (new Date).getTime(), coords: [b.pageX, b.pageY] } }, handleSwipe: function (b, c) { c.time - b.time < a.event.special.swipe.durationThreshold && Math.abs(b.coords[0] - c.coords[0]) > a.event.special.swipe.horizontalDistanceThreshold && Math.abs(b.coords[1] - c.coords[1]) < a.event.special.swipe.verticalDistanceThreshold && b.origin.trigger("swipe").trigger(b.coords[0] > c.coords[0] ? "swipeleft" : "swiperight") }, setup: function () { var b = this, c = a(b); c.bind(h, function (b) { function g(b) { if (!e) return; f = a.event.special.swipe.stop(b), Math.abs(e.coords[0] - f.coords[0]) > a.event.special.swipe.scrollSupressionThreshold && b.preventDefault() } var e = a.event.special.swipe.start(b), f; c.bind(j, g).one(i, function () { c.unbind(j, g), e && f && a.event.special.swipe.handleSwipe(e, f), e = f = d }) }) } }, a.each({ scrollstop: "scrollstart", taphold: "tap", swipeleft: "swipe", swiperight: "swipe" }, function (b, c) { a.event.special[b] = { setup: function () { a(this).bind(c, a.noop) } } }) }(a, this), function (a, b) { function e(a) { var b; while (a) { b = typeof a.className == "string" && a.className + " "; if (b && b.indexOf("ui-btn ") > -1 && b.indexOf("ui-disabled ") < 0) break; a = a.parentNode } return a } function f(d, e, f, g, h) { var i = a.data(d[0], "buttonElements"); d.removeClass(e).addClass(f), i && (i.bcls = a(c.createElement("div")).addClass(i.bcls + " " + f).removeClass(e).attr("class"), g !== b && (i.hover = g), i.state = h) } var d = function (a, c) { var d = a.getAttribute(c); return d === "true" ? !0 : d === "false" ? !1 : d === null ? b : d }; a.fn.buttonMarkup = function (e) { var f = this, h = "data-" + a.mobile.ns, i; e = e && a.type(e) === "object" ? e : {}; for (var j = 0; j < f.length; j++) { var k = f.eq(j), l = k[0], m = a.extend({}, a.fn.buttonMarkup.defaults, { icon: e.icon !== b ? e.icon : d(l, h + "icon"), iconpos: e.iconpos !== b ? e.iconpos : d(l, h + "iconpos"), theme: e.theme !== b ? e.theme : d(l, h + "theme") || a.mobile.getInheritedTheme(k, "c"), inline: e.inline !== b ? e.inline : d(l, h + "inline"), shadow: e.shadow !== b ? e.shadow : d(l, h + "shadow"), corners: e.corners !== b ? e.corners : d(l, h + "corners"), iconshadow: e.iconshadow !== b ? e.iconshadow : d(l, h + "iconshadow"), mini: e.mini !== b ? e.mini : d(l, h + "mini") }, e), n = "ui-btn-inner", o = "ui-btn-text", p, q, r = !1, s = "up", t, u, v, w; for (i in m) l.setAttribute(h + i, m[i]); d(l, h + "rel") === "popup" && k.attr("href") && (l.setAttribute("aria-haspopup", !0), l.setAttribute("aria-owns", k.attr("href"))), w = a.data(l.tagName === "INPUT" || l.tagName === "BUTTON" ? l.parentNode : l, "buttonElements"), w ? (l = w.outer, k = a(l), t = w.inner, u = w.text, a(w.icon).remove(), w.icon = null, r = w.hover, s = w.state) : (t = c.createElement(m.wrapperEls), u = c.createElement(m.wrapperEls)), v = m.icon ? c.createElement("span") : null, g && !w && g(), m.theme || (m.theme = a.mobile.getInheritedTheme(k, "c")), p = "ui-btn ", p += r ? "ui-btn-hover-" + m.theme : "", p += s ? " ui-btn-" + s + "-" + m.theme : "", p += m.shadow ? " ui-shadow" : "", p += m.corners ? " ui-btn-corner-all" : "", m.mini !== b && (p += m.mini === !0 ? " ui-mini" : " ui-fullsize"), m.inline !== b && (p += m.inline === !0 ? " ui-btn-inline" : " ui-btn-block"), m.icon && (m.icon = "ui-icon-" + m.icon, m.iconpos = m.iconpos || "left", q = "ui-icon " + m.icon, m.iconshadow && (q += " ui-icon-shadow")), m.iconpos && (p += " ui-btn-icon-" + m.iconpos, m.iconpos === "notext" && !k.attr("title") && k.attr("title", k.getEncodedText())), m.iconpos && m.iconpos === "notext" && !k.attr("title") && k.attr("title", k.getEncodedText()), w && k.removeClass(w.bcls || ""), k.removeClass("ui-link").addClass(p), t.className = n, u.className = o, w || t.appendChild(u); if (v) { v.className = q; if (!w || !w.icon) v.innerHTML = "&#160;", t.appendChild(v) } while (l.firstChild && !w) u.appendChild(l.firstChild); w || l.appendChild(t), w = { hover: r, state: s, bcls: p, outer: l, inner: t, text: u, icon: v }, a.data(l, "buttonElements", w), a.data(t, "buttonElements", w), a.data(u, "buttonElements", w), v && a.data(v, "buttonElements", w) } return this }, a.fn.buttonMarkup.defaults = { corners: !0, shadow: !0, iconshadow: !0, wrapperEls: "span" }; var g = function () { var c = a.mobile.buttonMarkup.hoverDelay, d, h; a.mobile.document.bind({ "vmousedown vmousecancel vmouseup vmouseover vmouseout focus blur scrollstart": function (g) { var i, j = a(e(g.target)), k = g.originalEvent && /^touch/.test(g.originalEvent.type), l = g.type; if (j.length) { i = j.attr("data-" + a.mobile.ns + "theme"); if (l === "vmousedown") k ? d = setTimeout(function () { f(j, "ui-btn-up-" + i, "ui-btn-down-" + i, b, "down") }, c) : f(j, "ui-btn-up-" + i, "ui-btn-down-" + i, b, "down"); else if (l === "vmousecancel" || l === "vmouseup") f(j, "ui-btn-down-" + i, "ui-btn-up-" + i, b, "up"); else if (l === "vmouseover" || l === "focus") k ? h = setTimeout(function () { f(j, "ui-btn-up-" + i, "ui-btn-hover-" + i, !0, "") }, c) : f(j, "ui-btn-up-" + i, "ui-btn-hover-" + i, !0, ""); else if (l === "vmouseout" || l === "blur" || l === "scrollstart") f(j, "ui-btn-hover-" + i + " ui-btn-down-" + i, "ui-btn-up-" + i, !1, "up"), d && clearTimeout(d), h && clearTimeout(h) } }, "focusin focus": function (b) { a(e(b.target)).addClass(a.mobile.focusClass) }, "focusout blur": function (b) { a(e(b.target)).removeClass(a.mobile.focusClass) } }), g = null }; a.mobile.document.bind("pagecreate create", function (b) { a(":jqmData(role='button'), .ui-bar > a, .ui-header > a, .ui-footer > a, .ui-bar > :jqmData(role='controlgroup') > a", b.target).jqmEnhanceable().not("button, input, .ui-btn, :jqmData(role='none'), :jqmData(role='nojs')").buttonMarkup() }) }(a), function (a, b) { var c = 0, d = Array.prototype.slice, e = a.cleanData; a.cleanData = function (b) { for (var c = 0, d; (d = b[c]) != null; c++) try { a(d).triggerHandler("remove") } catch (f) { } e(b) }, a.widget = function (b, c, d) { var e, f, g, h, i = b.split(".")[0]; b = b.split(".")[1], e = i + "-" + b, d || (d = c, c = a.Widget), a.expr[":"][e.toLowerCase()] = function (b) { return !!a.data(b, e) }, a[i] = a[i] || {}, f = a[i][b], g = a[i][b] = function (a, b) { if (!this._createWidget) return new g(a, b); arguments.length && this._createWidget(a, b) }, a.extend(g, f, { version: d.version, _proto: a.extend({}, d), _childConstructors: [] }), h = new c, h.options = a.widget.extend({}, h.options), a.each(d, function (b, e) { a.isFunction(e) && (d[b] = function () { var a = function () { return c.prototype[b].apply(this, arguments) }, d = function (a) { return c.prototype[b].apply(this, a) }; return function () { var b = this._super, c = this._superApply, f; return this._super = a, this._superApply = d, f = e.apply(this, arguments), this._super = b, this._superApply = c, f } }()) }), g.prototype = a.widget.extend(h, { widgetEventPrefix: f ? h.widgetEventPrefix : b }, d, { constructor: g, namespace: i, widgetName: b, widgetFullName: e }), f ? (a.each(f._childConstructors, function (b, c) { var d = c.prototype; a.widget(d.namespace + "." + d.widgetName, g, c._proto) }), delete f._childConstructors) : c._childConstructors.push(g), a.widget.bridge(b, g) }, a.widget.extend = function (c) { var e = d.call(arguments, 1), f = 0, g = e.length, h, i; for (; f < g; f++) for (h in e[f]) i = e[f][h], e[f].hasOwnProperty(h) && i !== b && (a.isPlainObject(i) ? c[h] = a.isPlainObject(c[h]) ? a.widget.extend({}, c[h], i) : a.widget.extend({}, i) : c[h] = i); return c }, a.widget.bridge = function (c, e) { var f = e.prototype.widgetFullName || c; a.fn[c] = function (g) { var h = typeof g == "string", i = d.call(arguments, 1), j = this; return g = !h && i.length ? a.widget.extend.apply(null, [g].concat(i)) : g, h ? this.each(function () { var d, e = a.data(this, f); if (!e) return a.error("cannot call methods on " + c + " prior to initialization; " + "attempted to call method '" + g + "'"); if (!a.isFunction(e[g]) || g.charAt(0) === "_") return a.error("no such method '" + g + "' for " + c + " widget instance"); d = e[g].apply(e, i); if (d !== e && d !== b) return j = d && d.jquery ? j.pushStack(d.get()) : d, !1 }) : this.each(function () { var b = a.data(this, f); b ? b.option(g || {})._init() : a.data(this, f, new e(g, this)) }), j } }, a.Widget = function () { }, a.Widget._childConstructors = [], a.Widget.prototype = { widgetName: "widget", widgetEventPrefix: "", defaultElement: "<div>", options: { disabled: !1, create: null }, _createWidget: function (b, d) { d = a(d || this.defaultElement || this)[0], this.element = a(d), this.uuid = c++, this.eventNamespace = "." + this.widgetName + this.uuid, this.options = a.widget.extend({}, this.options, this._getCreateOptions(), b), this.bindings = a(), this.hoverable = a(), this.focusable = a(), d !== this && (a.data(d, this.widgetFullName, this), this._on(!0, this.element, { remove: function (a) { a.target === d && this.destroy() } }), this.document = a(d.style ? d.ownerDocument : d.document || d), this.window = a(this.document[0].defaultView || this.document[0].parentWindow)), this._create(), this._trigger("create", null, this._getCreateEventData()), this._init() }, _getCreateOptions: a.noop, _getCreateEventData: a.noop, _create: a.noop, _init: a.noop, destroy: function () { this._destroy(), this.element.unbind(this.eventNamespace).removeData(this.widgetName).removeData(this.widgetFullName).removeData(a.camelCase(this.widgetFullName)), this.widget().unbind(this.eventNamespace).removeAttr("aria-disabled").removeClass(this.widgetFullName + "-disabled " + "ui-state-disabled"), this.bindings.unbind(this.eventNamespace), this.hoverable.removeClass("ui-state-hover"), this.focusable.removeClass("ui-state-focus") }, _destroy: a.noop, widget: function () { return this.element }, option: function (c, d) { var e = c, f, g, h; if (arguments.length === 0) return a.widget.extend({}, this.options); if (typeof c == "string") { e = {}, f = c.split("."), c = f.shift(); if (f.length) { g = e[c] = a.widget.extend({}, this.options[c]); for (h = 0; h < f.length - 1; h++) g[f[h]] = g[f[h]] || {}, g = g[f[h]]; c = f.pop(); if (d === b) return g[c] === b ? null : g[c]; g[c] = d } else { if (d === b) return this.options[c] === b ? null : this.options[c]; e[c] = d } } return this._setOptions(e), this }, _setOptions: function (a) { var b; for (b in a) this._setOption(b, a[b]); return this }, _setOption: function (a, b) { return this.options[a] = b, a === "disabled" && (this.widget().toggleClass(this.widgetFullName + "-disabled ui-state-disabled", !!b).attr("aria-disabled", b), this.hoverable.removeClass("ui-state-hover"), this.focusable.removeClass("ui-state-focus")), this }, enable: function () { return this._setOption("disabled", !1) }, disable: function () { return this._setOption("disabled", !0) }, _on: function (b, c, d) { var e, f = this; typeof b != "boolean" && (d = c, c = b, b = !1), d ? (c = e = a(c), this.bindings = this.bindings.add(c)) : (d = c, c = this.element, e = this.widget()), a.each(d, function (d, g) { function h() { if (!b && (f.options.disabled === !0 || a(this).hasClass("ui-state-disabled"))) return; return (typeof g == "string" ? f[g] : g).apply(f, arguments) } typeof g != "string" && (h.guid = g.guid = g.guid || h.guid || a.guid++); var i = d.match(/^(\w+)\s*(.*)$/), j = i[1] + f.eventNamespace, k = i[2]; k ? e.delegate(k, j, h) : c.bind(j, h) }) }, _off: function (a, b) { b = (b || "").split(" ").join(this.eventNamespace + " ") + this.eventNamespace, a.unbind(b).undelegate(b) }, _delay: function (a, b) { function c() { return (typeof a == "string" ? d[a] : a).apply(d, arguments) } var d = this; return setTimeout(c, b || 0) }, _hoverable: function (b) { this.hoverable = this.hoverable.add(b), this._on(b, { mouseenter: function (b) { a(b.currentTarget).addClass("ui-state-hover") }, mouseleave: function (b) { a(b.currentTarget).removeClass("ui-state-hover") } }) }, _focusable: function (b) { this.focusable = this.focusable.add(b), this._on(b, { focusin: function (b) { a(b.currentTarget).addClass("ui-state-focus") }, focusout: function (b) { a(b.currentTarget).removeClass("ui-state-focus") } }) }, _trigger: function (b, c, d) { var e, f, g = this.options[b]; d = d || {}, c = a.Event(c), c.type = (b === this.widgetEventPrefix ? b : this.widgetEventPrefix + b).toLowerCase(), c.target = this.element[0], f = c.originalEvent; if (f) for (e in f) e in c || (c[e] = f[e]); return this.element.trigger(c, d), !(a.isFunction(g) && g.apply(this.element[0], [c].concat(d)) === !1 || c.isDefaultPrevented()) } }, a.each({ show: "fadeIn", hide: "fadeOut" }, function (b, c) { a.Widget.prototype["_" + b] = function (d, e, f) { typeof e == "string" && (e = { effect: e }); var g, h = e ? e === !0 || typeof e == "number" ? c : e.effect || c : b; e = e || {}, typeof e == "number" && (e = { duration: e }), g = !a.isEmptyObject(e), e.complete = f, e.delay && d.delay(e.delay), g && a.effects && a.effects.effect[h] ? d[b](e) : h !== b && d[h] ? d[h](e.duration, e.easing, f) : d.queue(function (c) { a(this)[b](), f && f.call(d[0]), c() }) } }) }(a), function (a, b) { a.widget("mobile.widget", { _createWidget: function () { a.Widget.prototype._createWidget.apply(this, arguments), this._trigger("init") }, _getCreateOptions: function () { var c = this.element, d = {}; return a.each(this.options, function (a) { var e = c.jqmData(a.replace(/[A-Z]/g, function (a) { return "-" + a.toLowerCase() })); e !== b && (d[a] = e) }), d }, enhanceWithin: function (b, c) { this.enhance(a(this.options.initSelector, a(b)), c) }, enhance: function (b, c) { var d, e, f = a(b), g = this; f = a.mobile.enhanceable(f), c && f.length && (d = a.mobile.closestPageData(f), e = d && d.keepNativeSelector() || "", f = f.not(e)), f[this.widgetName]() }, raise: function (a) { throw "Widget [" + this.widgetName + "]: " + a } }) }(a), function (a) { var b = a("meta[name=viewport]"), c = b.attr("content"), d = c + ",maximum-scale=1, user-scalable=no", e = c + ",maximum-scale=10, user-scalable=yes", f = /(user-scalable[\s]*=[\s]*no)|(maximum-scale[\s]*=[\s]*1)[$,\s]/.test(c); a.mobile.zoom = a.extend({}, { enabled: !f, locked: !1, disable: function (c) { !f && !a.mobile.zoom.locked && (b.attr("content", d), a.mobile.zoom.enabled = !1, a.mobile.zoom.locked = c || !1) }, enable: function (c) { !f && (!a.mobile.zoom.locked || c === !0) && (b.attr("content", e), a.mobile.zoom.enabled = !0, a.mobile.zoom.locked = !1) }, restore: function () { f || (b.attr("content", c), a.mobile.zoom.enabled = !0) } }) }(a), function (a, b) { function j(a) { e = a.originalEvent, i = e.accelerationIncludingGravity, f = Math.abs(i.x), g = Math.abs(i.y), h = Math.abs(i.z), !b.orientation && (f > 7 || (h > 6 && g < 8 || h < 8 && g > 6) && f > 5) ? d.enabled && d.disable() : d.enabled || d.enable() } a.mobile.iosorientationfixEnabled = !0; var c = navigator.userAgent; if (!(/iPhone|iPad|iPod/.test(navigator.platform) && /OS [1-5]_[0-9_]* like Mac OS X/i.test(c) && c.indexOf("AppleWebKit") > -1)) { a.mobile.iosorientationfixEnabled = !1; return } var d = a.mobile.zoom, e, f, g, h, i; a.mobile.document.on("mobileinit", function () { a.mobile.iosorientationfixEnabled && a.mobile.window.bind("orientationchange.iosorientationfix", d.enable).bind("devicemotion.iosorientationfix", j) }) }(a, this), function (a, c) { var d, e, f, g = "&ui-state=dialog"; a.mobile.path = d = { uiStateKey: "&ui-state", urlParseRE: /^\s*(((([^:\/#\?]+:)?(?:(\/\/)((?:(([^:@\/#\?]+)(?:\:([^:@\/#\?]+))?)@)?(([^:\/#\?\]\[]+|\[[^\/\]@#?]+\])(?:\:([0-9]+))?))?)?)?((\/?(?:[^\/\?#]+\/+)*)([^\?#]*)))?(\?[^#]+)?)(#.*)?/, getLocation: function (a) { var b = a ? this.parseUrl(a) : location, c = this.parseUrl(a || location.href).hash; return c = c === "#" ? "" : c, b.protocol + "//" + b.host + b.pathname + b.search + c }, parseLocation: function () { return this.parseUrl(this.getLocation()) }, parseUrl: function (b) { if (a.type(b) === "object") return b; var c = d.urlParseRE.exec(b || "") || []; return { href: c[0] || "", hrefNoHash: c[1] || "", hrefNoSearch: c[2] || "", domain: c[3] || "", protocol: c[4] || "", doubleSlash: c[5] || "", authority: c[6] || "", username: c[8] || "", password: c[9] || "", host: c[10] || "", hostname: c[11] || "", port: c[12] || "", pathname: c[13] || "", directory: c[14] || "", filename: c[15] || "", search: c[16] || "", hash: c[17] || "" } }, makePathAbsolute: function (a, b) { if (a && a.charAt(0) === "/") return a; a = a || "", b = b ? b.replace(/^\/|(\/[^\/]*|[^\/]+)$/g, "") : ""; var c = b ? b.split("/") : [], d = a.split("/"); for (var e = 0; e < d.length; e++) { var f = d[e]; switch (f) { case ".": break; case "..": c.length && c.pop(); break; default: c.push(f) } } return "/" + c.join("/") }, isSameDomain: function (a, b) { return d.parseUrl(a).domain === d.parseUrl(b).domain }, isRelativeUrl: function (a) { return d.parseUrl(a).protocol === "" }, isAbsoluteUrl: function (a) { return d.parseUrl(a).protocol !== "" }, makeUrlAbsolute: function (a, b) { if (!d.isRelativeUrl(a)) return a; b === c && (b = this.documentBase); var e = d.parseUrl(a), f = d.parseUrl(b), g = e.protocol || f.protocol, h = e.protocol ? e.doubleSlash : e.doubleSlash || f.doubleSlash, i = e.authority || f.authority, j = e.pathname !== "", k = d.makePathAbsolute(e.pathname || f.filename, f.pathname), l = e.search || !j && f.search || "", m = e.hash; return g + h + i + k + l + m }, addSearchParams: function (b, c) { var e = d.parseUrl(b), f = typeof c == "object" ? a.param(c) : c, g = e.search || "?"; return e.hrefNoSearch + g + (g.charAt(g.length - 1) !== "?" ? "&" : "") + f + (e.hash || "") }, convertUrlToDataUrl: function (a) { var c = d.parseUrl(a); return d.isEmbeddedPage(c) ? c.hash.split(g)[0].replace(/^#/, "").replace(/\?.*$/, "") : d.isSameDomain(c, this.documentBase) ? c.hrefNoHash.replace(this.documentBase.domain, "").split(g)[0] : b.decodeURIComponent(a) }, get: function (a) { return a === c && (a = d.parseLocation().hash), d.stripHash(a).replace(/[^\/]*\.[^\/*]+$/, "") }, set: function (a) { location.hash = a }, isPath: function (a) { return /\//.test(a) }, clean: function (a) { return a.replace(this.documentBase.domain, "") }, stripHash: function (a) { return a.replace(/^#/, "") }, stripQueryParams: function (a) { return a.replace(/\?.*$/, "") }, cleanHash: function (a) { return d.stripHash(a.replace(/\?.*$/, "").replace(g, "")) }, isHashValid: function (a) { return /^#[^#]+$/.test(a) }, isExternal: function (a) { var b = d.parseUrl(a); return b.protocol && b.domain !== this.documentUrl.domain ? !0 : !1 }, hasProtocol: function (a) { return /^(:?\w+:)/.test(a) }, isEmbeddedPage: function (a) { var b = d.parseUrl(a); return b.protocol !== "" ? !this.isPath(b.hash) && b.hash && (b.hrefNoHash === this.documentUrl.hrefNoHash || this.documentBaseDiffers && b.hrefNoHash === this.documentBase.hrefNoHash) : /^#/.test(b.href) }, squash: function (a, b) { var c, e, f, g, h, i = this.isPath(a), j = this.parseUrl(a), k = j.hash, l = ""; b = b || (d.isPath(a) ? d.getLocation() : d.getDocumentUrl()), f = i ? d.stripHash(a) : a, f = d.isPath(j.hash) ? d.stripHash(j.hash) : f, h = f.indexOf(this.uiStateKey), h > -1 && (l = f.slice(h), f = f.slice(0, h)), e = d.makeUrlAbsolute(f, b), g = this.parseUrl(e).search; if (i) { if (d.isPath(k) || k.replace("#", "").indexOf(this.uiStateKey) === 0) k = ""; l && k.indexOf(this.uiStateKey) === -1 && (k += l), k.indexOf("#") === -1 && k !== "" && (k = "#" + k), e = d.parseUrl(e), e = e.protocol + "//" + e.host + e.pathname + g + k } else e += e.indexOf("#") > -1 ? l : "#" + l; return e }, isPreservableHash: function (a) { return a.replace("#", "").indexOf(this.uiStateKey) === 0 } }, d.documentUrl = d.parseLocation(), f = a("head").find("base"), d.documentBase = f.length ? d.parseUrl(d.makeUrlAbsolute(f.attr("href"), d.documentUrl.href)) : d.documentUrl, d.documentBaseDiffers = d.documentUrl.hrefNoHash !== d.documentBase.hrefNoHash, d.getDocumentUrl = function (b) { return b ? a.extend({}, d.documentUrl) : d.documentUrl.href }, d.getDocumentBase = function (b) { return b ? a.extend({}, d.documentBase) : d.documentBase.href } }(a), function (a, b) { var c = a.mobile.path; a.mobile.History = function (a, b) { this.stack = a || [], this.activeIndex = b || 0 }, a.extend(a.mobile.History.prototype, { getActive: function () { return this.stack[this.activeIndex] }, getLast: function () { return this.stack[this.previousIndex] }, getNext: function () { return this.stack[this.activeIndex + 1] }, getPrev: function () { return this.stack[this.activeIndex - 1] }, add: function (a, b) { b = b || {}, this.getNext() && this.clearForward(), b.hash && b.hash.indexOf("#") === -1 && (b.hash = "#" + b.hash), b.url = a, this.stack.push(b), this.activeIndex = this.stack.length - 1 }, clearForward: function () { this.stack = this.stack.slice(0, this.activeIndex + 1) }, find: function (a, b, c) { b = b || this.stack; var d, e, f = b.length, g; for (e = 0; e < f; e++) { d = b[e]; if (decodeURIComponent(a) === decodeURIComponent(d.url) || decodeURIComponent(a) === decodeURIComponent(d.hash)) { g = e; if (c) return g } } return g }, closest: function (a) { var c, d = this.activeIndex; return c = this.find(a, this.stack.slice(0, d)), c === b && (c = this.find(a, this.stack.slice(d), !0), c = c === b ? c : c + d), c }, direct: function (c) { var d = this.closest(c.url), e = this.activeIndex; d !== b && (this.activeIndex = d, this.previousIndex = e), d < e ? (c.present || c.back || a.noop)(this.getActive(), "back") : d > e ? (c.present || c.forward || a.noop)(this.getActive(), "forward") : d === b && c.missing && c.missing(this.getActive()) } }) }(a), function (a, d) { var e = a.mobile.path; a.mobile.Navigator = function (b) { this.history = b, this.ignoreInitialHashChange = !0, setTimeout(a.proxy(function () { this.ignoreInitialHashChange = !1 }, this), 200), a.mobile.window.bind({ "popstate.history": a.proxy(this.popstate, this), "hashchange.history": a.proxy(this.hashchange, this) }) }, a.extend(a.mobile.Navigator.prototype, { squash: function (d, f) { var g, h, i = e.isPath(d) ? e.stripHash(d) : d; return h = e.squash(d), g = a.extend({ hash: i, url: h }, f), b.history.replaceState(g, g.title || c.title, h), g }, hash: function (a, b) { var c, d, f; c = e.parseUrl(a), d = e.parseLocation(); if (d.pathname + d.search === c.pathname + c.search) f = c.hash ? c.hash : c.pathname + c.search; else if (e.isPath(a)) { var g = e.parseUrl(b); f = g.pathname + g.search + (e.isPreservableHash(g.hash) ? g.hash.replace("#", "") : "") } else f = a; return f }, go: function (d, f, g) { var h, i, j, k, l = a.event.special.navigate.isPushStateEnabled(); i = e.squash(d), j = this.hash(d, i), g && j !== e.stripHash(e.parseLocation().hash) && (this.preventNextHashChange = g), this.preventHashAssignPopState = !0, b.location.hash = j, this.preventHashAssignPopState = !1, h = a.extend({ url: i, hash: j, title: c.title }, f), l && (k = new a.Event("popstate"), k.originalEvent = { type: "popstate", state: null }, this.squash(d, h), g || (this.ignorePopState = !0, a.mobile.window.trigger(k))), this.history.add(h.url, h) }, popstate: function (b) { var c, d, f, g; if (!a.event.special.navigate.isPushStateEnabled()) return; if (this.preventHashAssignPopState) { this.preventHashAssignPopState = !1, b.stopImmediatePropagation(); return } if (this.ignorePopState) { this.ignorePopState = !1; return } if (!b.originalEvent.state && this.history.stack.length === 1 && this.ignoreInitialHashChange) { this.ignoreInitialHashChange = !1; return } d = e.parseLocation().hash; if (!b.originalEvent.state && d) { f = this.squash(d), this.history.add(f.url, f), b.historyState = f; return } this.history.direct({ url: (b.originalEvent.state || {}).url || d, present: function (c, d) { b.historyState = a.extend({}, c), b.historyState.direction = d } }) }, hashchange: function (b) { var d, f; if (!a.event.special.navigate.isHashChangeEnabled() || a.event.special.navigate.isPushStateEnabled()) return; if (this.preventNextHashChange) { this.preventNextHashChange = !1, b.stopImmediatePropagation(); return } d = this.history, f = e.parseLocation().hash, this.history.direct({ url: f, present: function (c, d) { b.hashchangeState = a.extend({}, c), b.hashchangeState.direction = d }, missing: function () { d.add(f, { hash: f, title: c.title }) } }) } }) }(a), function (a, b) { a.mobile.navigate = function (b, c, d) { a.mobile.navigate.navigator.go(b, c, d) }, a.mobile.navigate.history = new a.mobile.History, a.mobile.navigate.navigator = new a.mobile.Navigator(a.mobile.navigate.history); var c = a.mobile.path.parseLocation(); a.mobile.navigate.history.add(c.href, { hash: c.hash }) }(a), function (a, b, c) { a.mobile.transitionFallbacks.flip = "fade" }(a, this), function (a, b, c) { a.mobile.transitionFallbacks.flow = "fade" }(a, this), function (a, b, c) { a.mobile.transitionFallbacks.pop = "fade" }(a, this), function (a, b, c) { a.mobile.transitionHandlers.slide = a.mobile.transitionHandlers.simultaneous, a.mobile.transitionFallbacks.slide = "fade" }(a, this), function (a, b, c) { a.mobile.transitionFallbacks.slidedown = "fade" }(a, this), function (a, b, c) { a.mobile.transitionFallbacks.slidefade = "fade" }(a, this), function (a, b, c) { a.mobile.transitionFallbacks.slideup = "fade" }(a, this), function (a, b, c) { a.mobile.transitionFallbacks.turn = "fade" }(a, this), function (a, b) { a.mobile.behaviors.addFirstLastClasses = { _getVisibles: function (a, b) { var c; return b ? c = a.not(".ui-screen-hidden") : (c = a.filter(":visible"), c.length === 0 && (c = a.not(".ui-screen-hidden"))), c }, _addFirstLastClasses: function (a, b, c) { a.removeClass("ui-first-child ui-last-child"), b.eq(0).addClass("ui-first-child").end().last().addClass("ui-last-child"), c || this.element.trigger("updatelayout") } } }(a), function (a, b) { a.widget("mobile.collapsible", a.mobile.widget, { options: { expandCueText: " click to expand contents", collapseCueText: " click to collapse contents", collapsed: !0, heading: "h1,h2,h3,h4,h5,h6,legend", collapsedIcon: "plus", expandedIcon: "minus", iconpos: "left", theme: null, contentTheme: null, inset: !0, corners: !0, mini: !1, initSelector: ":jqmData(role='collapsible')" }, _create: function () { var c = this.element, d = this.options, e = c.addClass("ui-collapsible"), f = c.children(d.heading).first(), g = e.wrapInner("<div class='ui-collapsible-content'></div>").children(".ui-collapsible-content"), h = c.closest(":jqmData(role='collapsible-set')").addClass("ui-collapsible-set"), i = ""; f.is("legend") && (f = a("<div role='heading'>" + f.html() + "</div>").insertBefore(f), f.next().remove()), h.length ? (d.theme || (d.theme = h.jqmData("theme") || a.mobile.getInheritedTheme(h, "c")), d.contentTheme || (d.contentTheme = h.jqmData("content-theme")), d.collapsedIcon = c.jqmData("collapsed-icon") || h.jqmData("collapsed-icon") || d.collapsedIcon, d.expandedIcon = c.jqmData("expanded-icon") || h.jqmData("expanded-icon") || d.expandedIcon, d.iconpos = c.jqmData("iconpos") || h.jqmData("iconpos") || d.iconpos, h.jqmData("inset") !== b ? d.inset = h.jqmData("inset") : d.inset = !0, d.corners = !1, d.mini || (d.mini = h.jqmData("mini"))) : d.theme || (d.theme = a.mobile.getInheritedTheme(c, "c")), !d.inset || (i += " ui-collapsible-inset", !d.corners || (i += " ui-corner-all")), d.contentTheme && (i += " ui-collapsible-themed-content", g.addClass("ui-body-" + d.contentTheme)), i !== "" && e.addClass(i), f.insertBefore(g).addClass("ui-collapsible-heading").append("<span class='ui-collapsible-heading-status'></span>").wrapInner("<a href='#' class='ui-collapsible-heading-toggle'></a>").find("a").first().buttonMarkup({ shadow: !1, corners: !1, iconpos: d.iconpos, icon: d.collapsedIcon, mini: d.mini, theme: d.theme }), e.bind("expand collapse", function (b) { if (!b.isDefaultPrevented()) { var c = a(this), e = b.type === "collapse"; b.preventDefault(), f.toggleClass("ui-collapsible-heading-collapsed", e).find(".ui-collapsible-heading-status").text(e ? d.expandCueText : d.collapseCueText).end().find(".ui-icon").toggleClass("ui-icon-" + d.expandedIcon, !e).toggleClass("ui-icon-" + d.collapsedIcon, e || d.expandedIcon === d.collapsedIcon).end().find("a").first().removeClass(a.mobile.activeBtnClass), c.toggleClass("ui-collapsible-collapsed", e), g.toggleClass("ui-collapsible-content-collapsed", e).attr("aria-hidden", e), g.trigger("updatelayout") } }).trigger(d.collapsed ? "collapse" : "expand"), f.bind("tap", function (b) { f.find("a").first().addClass(a.mobile.activeBtnClass) }).bind("click", function (a) { var b = f.is(".ui-collapsible-heading-collapsed") ? "expand" : "collapse"; e.trigger(b), a.preventDefault(), a.stopPropagation() }) } }), a.mobile.document.bind("pagecreate create", function (b) { a.mobile.collapsible.prototype.enhanceWithin(b.target) }) }(a), function (a, b) { a.widget("mobile.collapsibleset", a.mobile.widget, { options: { initSelector: ":jqmData(role='collapsible-set')" }, _create: function () { var c = this.element.addClass("ui-collapsible-set"), d = this.options; d.theme || (d.theme = a.mobile.getInheritedTheme(c, "c")), d.contentTheme || (d.contentTheme = c.jqmData("content-theme")), d.corners || (d.corners = c.jqmData("corners")), c.jqmData("inset") !== b && (d.inset = c.jqmData("inset")), d.inset = d.inset !== b ? d.inset : !0, d.corners = d.corners !== b ? d.corners : !0, !!d.corners && !!d.inset && c.addClass("ui-corner-all"), c.jqmData("collapsiblebound") || c.jqmData("collapsiblebound", !0).bind("expand", function (b) { var c = a(b.target).closest(".ui-collapsible"); c.parent().is(":jqmData(role='collapsible-set')") && c.siblings(".ui-collapsible").trigger("collapse") }) }, _init: function () { var a = this.element, b = a.children(":jqmData(role='collapsible')"), c = b.filter(":jqmData(collapsed='false')"); this._refresh("true"), c.trigger("expand") }, _refresh: function (b) { var c = this.element.children(":jqmData(role='collapsible')"); a.mobile.collapsible.prototype.enhance(c.not(".ui-collapsible")), this._addFirstLastClasses(c, this._getVisibles(c, b), b) }, refresh: function () { this._refresh(!1) } }), a.widget("mobile.collapsibleset", a.mobile.collapsibleset, a.mobile.behaviors.addFirstLastClasses), a.mobile.document.bind("pagecreate create", function (b) { a.mobile.collapsibleset.prototype.enhanceWithin(b.target) }) }(a), function (a, b) { a.widget("mobile.controlgroup", a.mobile.widget, { options: { shadow: !1, corners: !0, excludeInvisible: !0, type: "vertical", mini: !1, initSelector: ":jqmData(role='controlgroup')" }, _create: function () { var c = this.element, d = { inner: a("<div class='ui-controlgroup-controls'></div>"), legend: a("<div role='heading' class='ui-controlgroup-label'></div>") }, e = c.children("legend"), f = this; c.wrapInner(d.inner), e.length && d.legend.append(e).insertBefore(c.children(0)), c.addClass("ui-corner-all ui-controlgroup"), a.extend(this, { _initialRefresh: !0 }), a.each(this.options, function (a, c) { f.options[a] = b, f._setOption(a, c, !0) }) }, _init: function () { this.refresh() }, _setOption: function (c, d) { var e = "_set" + c.charAt(0).toUpperCase() + c.slice(1); this[e] !== b && this[e](d), this._super(c, d), this.element.attr("data-" + (a.mobile.ns || "") + c.replace(/([A-Z])/, "-$1").toLowerCase(), d) }, _setType: function (a) { this.element.removeClass("ui-controlgroup-horizontal ui-controlgroup-vertical").addClass("ui-controlgroup-" + a), this.refresh() }, _setCorners: function (a) { this.element.toggleClass("ui-corner-all", a) }, _setShadow: function (a) { this.element.toggleClass("ui-shadow", a) }, _setMini: function (a) { this.element.toggleClass("ui-mini", a) }, container: function () { return this.element.children(".ui-controlgroup-controls") }, refresh: function () { var b = this.element.find(".ui-btn").not(".ui-slider-handle"), c = this._initialRefresh; a.mobile.checkboxradio && this.element.find(":mobile-checkboxradio").checkboxradio("refresh"), this._addFirstLastClasses(b, this.options.excludeInvisible ? this._getVisibles(b, c) : b, c), this._initialRefresh = !1 } }), a.widget("mobile.controlgroup", a.mobile.controlgroup, a.mobile.behaviors.addFirstLastClasses), a(function () { a.mobile.document.bind("pagecreate create", function (b) { a.mobile.controlgroup.prototype.enhanceWithin(b.target, !0) }) }) }(a), function (a, b) { a.widget("mobile.button", a.mobile.widget, { options: { theme: null, icon: null, iconpos: null, corners: !0, shadow: !0, iconshadow: !0, inline: null, mini: null, initSelector: "button, [type='button'], [type='submit'], [type='reset']" }, _create: function () { var b = this.element, c, d = function (a) { var b, c = {}; for (b in a) a[b] !== null && b !== "initSelector" && (c[b] = a[b]); return c }(this.options), e = "", f; if (b[0].tagName === "A") { b.hasClass("ui-btn") || b.buttonMarkup(); return } this.options.theme || (this.options.theme = a.mobile.getInheritedTheme(this.element, "c")), !~b[0].className.indexOf("ui-btn-left") || (e = "ui-btn-left"), !~b[0].className.indexOf("ui-btn-right") || (e = "ui-btn-right"); if (b.attr("type") === "submit" || b.attr("type") === "reset") e ? e += " ui-submit" : e = "ui-submit"; a("label[for='" + b.attr("id") + "']").addClass("ui-submit"), this.button = a("<div></div>")[b.html() ? "html" : "text"](b.html() || b.val()).insertBefore(b).buttonMarkup(d).addClass(e).append(b.addClass("ui-btn-hidden")), c = this.button, b.bind({ focus: function () { c.addClass(a.mobile.focusClass) }, blur: function () { c.removeClass(a.mobile.focusClass) } }), this.refresh() }, _setOption: function (b, c) { var d = {}; d[b] = c, b !== "initSelector" && (this.button.buttonMarkup(d), this.element.attr("data-" + (a.mobile.ns || "") + b.replace(/([A-Z])/, "-$1").toLowerCase(), c)), this._super("_setOption", b, c) }, enable: function () { return this.element.attr("disabled", !1), this.button.removeClass("ui-disabled").attr("aria-disabled", !1), this._setOption("disabled", !1) }, disable: function () { return this.element.attr("disabled", !0), this.button.addClass("ui-disabled").attr("aria-disabled", !0), this._setOption("disabled", !0) }, refresh: function () { var b = this.element; b.prop("disabled") ? this.disable() : this.enable(), a(this.button.data("buttonElements").text)[b.html() ? "html" : "text"](b.html() || b.val()) } }), a.mobile.document.bind("pagecreate create", function (b) { a.mobile.button.prototype.enhanceWithin(b.target, !0) }) }(a), function (a, b) { a.mobile.behaviors.formReset = { _handleFormReset: function () { this._on(this.element.closest("form"), { reset: function () { this._delay("_reset") } }) } } }(a), function (a, b) { a.widget("mobile.checkboxradio", a.mobile.widget, { options: { theme: null, mini: !1, initSelector: "input[type='checkbox'],input[type='radio']" }, _create: function () { var b = this, d = this.element, e = this.options, f = function (a, b) { return a.jqmData(b) || a.closest("form, fieldset").jqmData(b) }, g = a(d).closest("label"), h = g.length ? g : a(d).closest("form, fieldset, :jqmData(role='page'), :jqmData(role='dialog')").find("label").filter("[for='" + d[0].id + "']").first(), i = d[0].type, j = f(d, "mini") || e.mini, k = i + "-on", l = i + "-off", m = f(d, "iconpos"), n = "ui-" + k, o = "ui-" + l; if (i !== "checkbox" && i !== "radio") return; a.extend(this, { label: h, inputtype: i, checkedClass: n, uncheckedClass: o, checkedicon: k, uncheckedicon: l }), e.theme || (e.theme = a.mobile.getInheritedTheme(this.element, "c")), h.buttonMarkup({ theme: e.theme, icon: l, shadow: !1, mini: j, iconpos: m }); var p = c.createElement("div"); p.className = "ui-" + i, d.add(h).wrapAll(p), h.bind({ vmouseover: function (b) { a(this).parent().is(".ui-disabled") && b.stopPropagation() }, vclick: function (a) { if (d.is(":disabled")) { a.preventDefault(); return } return b._cacheVals(), d.prop("checked", i === "radio" && !0 || !d.prop("checked")), d.triggerHandler("click"), b._getInputSet().not(d).prop("checked", !1), b._updateAll(), !1 } }), d.bind({ vmousedown: function () { b._cacheVals() }, vclick: function () { var c = a(this); c.is(":checked") ? (c.prop("checked", !0), b._getInputSet().not(c).prop("checked", !1)) : c.prop("checked", !1), b._updateAll() }, focus: function () { h.addClass(a.mobile.focusClass) }, blur: function () { h.removeClass(a.mobile.focusClass) } }), this._handleFormReset && this._handleFormReset(), this.refresh() }, _cacheVals: function () { this._getInputSet().each(function () { a(this).jqmData("cacheVal", this.checked) }) }, _getInputSet: function () { return this.inputtype === "checkbox" ? this.element : this.element.closest("form, :jqmData(role='page'), :jqmData(role='dialog')").find("input[name='" + this.element[0].name + "'][type='" + this.inputtype + "']") }, _updateAll: function () { var b = this; this._getInputSet().each(function () { var c = a(this); (this.checked || b.inputtype === "checkbox") && c.trigger("change") }).checkboxradio("refresh") }, _reset: function () { this.refresh() }, refresh: function () { var b = this.element[0], c = " " + a.mobile.activeBtnClass, d = this.checkedClass + (this.element.parents(".ui-controlgroup-horizontal").length ? c : ""), e = this.label; b.checked ? e.removeClass(this.uncheckedClass + c).addClass(d).buttonMarkup({ icon: this.checkedicon }) : e.removeClass(d).addClass(this.uncheckedClass).buttonMarkup({ icon: this.uncheckedicon }), b.disabled ? this.disable() : this.enable() }, disable: function () { this.element.prop("disabled", !0).parent().addClass("ui-disabled") }, enable: function () { this.element.prop("disabled", !1).parent().removeClass("ui-disabled") } }), a.widget("mobile.checkboxradio", a.mobile.checkboxradio, a.mobile.behaviors.formReset), a.mobile.document.bind("pagecreate create", function (b) { a.mobile.checkboxradio.prototype.enhanceWithin(b.target, !0) }) }(a), function (a, d) { a.widget("mobile.selectmenu", a.mobile.widget, { options: { theme: null, disabled: !1, icon: "arrow-d", iconpos: "right", inline: !1, corners: !0, shadow: !0, iconshadow: !0, overlayTheme: "a", dividerTheme: "b", hidePlaceholderMenuItems: !0, closeText: "Close", nativeMenu: !0, preventFocusZoom: /iPhone|iPad|iPod/.test(navigator.platform) && navigator.userAgent.indexOf("AppleWebKit") > -1, initSelector: "select:not( :jqmData(role='slider') )", mini: !1 }, _button: function () { return a("<div/>") }, _setDisabled: function (a) { return this.element.attr("disabled", a), this.button.attr("aria-disabled", a), this._setOption("disabled", a) }, _focusButton: function () { var a = this; setTimeout(function () { a.button.focus() }, 40) }, _selectOptions: function () { return this.select.find("option") }, _preExtension: function () { var b = ""; !~this.element[0].className.indexOf("ui-btn-left") || (b = " ui-btn-left"), !~this.element[0].className.indexOf("ui-btn-right") || (b = " ui-btn-right"), this.select = this.element.removeClass("ui-btn-left ui-btn-right").wrap("<div class='ui-select" + b + "'>"), this.selectID = this.select.attr("id"), this.label = a("label[for='" + this.selectID + "']").addClass("ui-select"), this.isMultiple = this.select[0].multiple, this.options.theme || (this.options.theme = a.mobile.getInheritedTheme(this.select, "c")) }, _destroy: function () { var a = this.element.parents(".ui-select"); a.length > 0 && (a.is(".ui-btn-left, .ui-btn-right") && this.element.addClass(a.is(".ui-btn-left") ? "ui-btn-left" : "ui-btn-right"), this.element.insertAfter(a), a.remove()) }, _create: function () { this._preExtension(), this._trigger("beforeCreate"), this.button = this._button(); var c = this, d = this.options, e = d.inline || this.select.jqmData("inline"), f = d.mini || this.select.jqmData("mini"), g = d.icon ? d.iconpos || this.select.jqmData("iconpos") : !1, h = this.select[0].selectedIndex === -1 ? 0 : this.select[0].selectedIndex, i = this.button.insertBefore(this.select).buttonMarkup({ theme: d.theme, icon: d.icon, iconpos: g, inline: e, corners: d.corners, shadow: d.shadow, iconshadow: d.iconshadow, mini: f }); this.setButtonText(), d.nativeMenu && b.opera && b.opera.version && i.addClass("ui-select-nativeonly"), this.isMultiple && (this.buttonCount = a("<span>").addClass("ui-li-count ui-btn-up-c ui-btn-corner-all").hide().appendTo(i.addClass("ui-li-has-count"))), (d.disabled || this.element.attr("disabled")) && this.disable(), this.select.change(function () { c.refresh() }), this._handleFormReset && this._handleFormReset(), this.build() }, build: function () { var b = this; this.select.appendTo(b.button).bind("vmousedown", function () { b.button.addClass(a.mobile.activeBtnClass) }).bind("focus", function () { b.button.addClass(a.mobile.focusClass) }).bind("blur", function () { b.button.removeClass(a.mobile.focusClass) }).bind("focus vmouseover", function () { b.button.trigger("vmouseover") }).bind("vmousemove", function () { b.button.removeClass(a.mobile.activeBtnClass) }).bind("change blur vmouseout", function () { b.button.trigger("vmouseout").removeClass(a.mobile.activeBtnClass) }).bind("change blur", function () { b.button.removeClass("ui-btn-down-" + b.options.theme) }), b.button.bind("vmousedown", function () { b.options.preventFocusZoom && a.mobile.zoom.disable(!0) }), b.label.bind("click focus", function () { b.options.preventFocusZoom && a.mobile.zoom.disable(!0) }), b.select.bind("focus", function () { b.options.preventFocusZoom && a.mobile.zoom.disable(!0) }), b.button.bind("mouseup", function () { b.options.preventFocusZoom && setTimeout(function () { a.mobile.zoom.enable(!0) }, 0) }), b.select.bind("blur", function () { b.options.preventFocusZoom && a.mobile.zoom.enable(!0) }) }, selected: function () { return this._selectOptions().filter(":selected") }, selectedIndices: function () { var a = this; return this.selected().map(function () { return a._selectOptions().index(this) }).get() }, setButtonText: function () { var b = this, d = this.selected(), e = this.placeholder, f = a(c.createElement("span")); this.button.find(".ui-btn-text").html(function () { return d.length ? e = d.map(function () { return a(this).text() }).get().join(", ") : e = b.placeholder, f.text(e).addClass(b.select.attr("class")).addClass(d.attr("class")) }) }, setButtonCount: function () { var a = this.selected(); this.isMultiple && this.buttonCount[a.length > 1 ? "show" : "hide"]().text(a.length) }, _reset: function () { this.refresh() }, refresh: function () { this.setButtonText(), this.setButtonCount() }, open: a.noop, close: a.noop, disable: function () { this._setDisabled(!0), this.button.addClass("ui-disabled") }, enable: function () { this._setDisabled(!1), this.button.removeClass("ui-disabled") } }), a.widget("mobile.selectmenu", a.mobile.selectmenu, a.mobile.behaviors.formReset), a.mobile.document.bind("pagecreate create", function (b) { a.mobile.selectmenu.prototype.enhanceWithin(b.target, !0) }) }(a), function (a, b) { a.extend(a.mobile, { loadingMessageTextVisible: d, loadingMessageTheme: d, loadingMessage: d, showPageLoadingMsg: function (b, c, d) { a.mobile.loading("show", b, c, d) }, hidePageLoadingMsg: function () { a.mobile.loading("hide") }, loading: function () { this.loaderWidget.loader.apply(this.loaderWidget, arguments) } }); var c = "ui-loader", e = a("html"), f = a.mobile.window; a.widget("mobile.loader", { options: { theme: "a", textVisible: !1, html: "", text: "loading" }, defaultHtml: "<div class='" + c + "'>" + "<span class='ui-icon ui-icon-loading'></span>" + "<h1></h1>" + "</div>", fakeFixLoader: function () { var b = a("." + a.mobile.activeBtnClass).first(); this.element.css({ top: a.support.scrollTop && f.scrollTop() + f.height() / 2 || b.length && b.offset().top || 100 }) }, checkLoaderPosition: function () { var b = this.element.offset(), c = f.scrollTop(), d = a.mobile.getScreenHeight(); if (b.top < c || b.top - c > d) this.element.addClass("ui-loader-fakefix"), this.fakeFixLoader(), f.unbind("scroll", this.checkLoaderPosition).bind("scroll", a.proxy(this.fakeFixLoader, this)) }, resetHtml: function () { this.element.html(a(this.defaultHtml).html()) }, show: function (b, g, h) { var i, j, k, l; this.resetHtml(), a.type(b) === "object" ? (l = a.extend({}, this.options, b), b = l.theme || a.mobile.loadingMessageTheme) : (l = this.options, b = b || a.mobile.loadingMessageTheme || l.theme), j = g || a.mobile.loadingMessage || l.text, e.addClass("ui-loading"); if (a.mobile.loadingMessage !== !1 || l.html) a.mobile.loadingMessageTextVisible !== d ? i = a.mobile.loadingMessageTextVisible : i = l.textVisible, this.element.attr("class", c + " ui-corner-all ui-body-" + b + " ui-loader-" + (i || g || b.text ? "verbose" : "default") + (l.textonly || h ? " ui-loader-textonly" : "")), l.html ? this.element.html(l.html) : this.element.find("h1").text(j), this.element.appendTo(a.mobile.pageContainer), this.checkLoaderPosition(), f.bind("scroll", a.proxy(this.checkLoaderPosition, this)) }, hide: function () { e.removeClass("ui-loading"), a.mobile.loadingMessage && this.element.removeClass("ui-loader-fakefix"), a.mobile.window.unbind("scroll", this.fakeFixLoader), a.mobile.window.unbind("scroll", this.checkLoaderPosition) } }), f.bind("pagecontainercreate", function () { a.mobile.loaderWidget = a.mobile.loaderWidget || a(a.mobile.loader.prototype.defaultHtml).loader() }) }(a, this), function (a, b) { a.widget("mobile.navbar", a.mobile.widget, { options: { iconpos: "top", grid: null, initSelector: ":jqmData(role='navbar')" }, _create: function () { var d = this.element, e = d.find("a"), f = e.filter(":jqmData(icon)").length ? this.options.iconpos : b; d.addClass("ui-navbar ui-mini").attr("role", "navigation").find("ul").jqmEnhanceable().grid({ grid: this.options.grid }), e.buttonMarkup({ corners: !1, shadow: !1, inline: !0, iconpos: f }), d.delegate("a", "vclick", function (b) { if (!a(b.target).hasClass("ui-disabled")) { e.removeClass(a.mobile.activeBtnClass), a(this).addClass(a.mobile.activeBtnClass); var d = a(this); a(c).one("pagechange", function (b) { d.removeClass(a.mobile.activeBtnClass) }) } }), d.closest(".ui-page").bind("pagebeforeshow", function () { e.filter(".ui-state-persist").addClass(a.mobile.activeBtnClass) }) } }), a.mobile.document.bind("pagecreate create", function (b) { a.mobile.navbar.prototype.enhanceWithin(b.target) }) }(a), function (a, b) { a.widget("mobile.page", a.mobile.widget, { options: { theme: "c", domCache: !1, keepNativeDefault: ":jqmData(role='none'), :jqmData(role='nojs')" }, _create: function () { if (this._trigger("beforecreate") === !1) return !1; this.element.attr("tabindex", "0").addClass("ui-page ui-body-" + this.options.theme), this._on(this.element, { pagebeforehide: "removeContainerBackground", pagebeforeshow: "_handlePageBeforeShow" }) }, _handlePageBeforeShow: function (a) { this.setContainerBackground() }, removeContainerBackground: function () { a.mobile.pageContainer.removeClass("ui-overlay-" + a.mobile.getInheritedTheme(this.element.parent())) }, setContainerBackground: function (b) { this.options.theme && a.mobile.pageContainer.addClass("ui-overlay-" + (b || this.options.theme)) }, keepNativeSelector: function () { var b = this.options, c = b.keepNative && a.trim(b.keepNative); return c && b.keepNative !== b.keepNativeDefault ? [b.keepNative, b.keepNativeDefault].join(", ") : b.keepNativeDefault } }) }(a), function (a, b) { a.mobile.page.prototype.options.degradeInputs = { color: !1, date: !1, datetime: !1, "datetime-local": !1, email: !1, month: !1, number: !1, range: "number", search: "text", tel: !1, time: !1, url: !1, week: !1 }, a.mobile.document.bind("pagecreate create", function (b) { var c = a.mobile.closestPageData(a(b.target)), d; if (!c) return; d = c.options, a(b.target).find("input").not(c.keepNativeSelector()).each(function () { var b = a(this), c = this.getAttribute("type"), e = d.degradeInputs[c] || "text"; if (d.degradeInputs[c]) { var f = a("<div>").html(b.clone()).html(), g = f.indexOf(" type=") > -1, h = g ? /\s+type=["']?\w+['"]?/ : /\/?>/, i = ' type="' + e + '" data-' + a.mobile.ns + 'type="' + c + '"' + (g ? "" : ">"); b.replaceWith(f.replace(h, i)) } }) }) }(a), function (a, b) { a.widget("mobile.textinput", a.mobile.widget, { options: { theme: null, mini: !1, preventFocusZoom: /iPhone|iPad|iPod/.test(navigator.platform) && navigator.userAgent.indexOf("AppleWebKit") > -1, initSelector: "input[type='text'], input[type='search'], :jqmData(type='search'), input[type='number'], :jqmData(type='number'), input[type='password'], input[type='email'], input[type='url'], input[type='tel'], textarea, input[type='time'], input[type='date'], input[type='month'], input[type='week'], input[type='datetime'], input[type='datetime-local'], input[type='color'], input:not([type]), input[type='file']", clearBtn: !1, clearSearchButtonText: null, clearBtnText: "clear text", disabled: !1 }, _create: function () { function o() { setTimeout(function () { j.toggleClass("ui-input-clear-hidden", !c.val()) }, 0) } var b = this, c = this.element, d = this.options, e = d.theme || a.mobile.getInheritedTheme(this.element, "c"), f = " ui-body-" + e, g = d.mini ? " ui-mini" : "", h = c.is("[type='search'], :jqmData(type='search')"), i, j, k = d.clearSearchButtonText || d.clearBtnText, l = c.is("textarea, :jqmData(type='range')"), m = !!d.clearBtn && !l, n = c.is("input") && !c.is(":jqmData(type='range')"); a("label[for='" + c.attr("id") + "']").addClass("ui-input-text"), i = c.addClass("ui-input-text ui-body-" + e), typeof c[0].autocorrect != "undefined" && !a.support.touchOverflow && (c[0].setAttribute("autocorrect", "off"), c[0].setAttribute("autocomplete", "off")), h ? i = c.wrap("<div class='ui-input-search ui-shadow-inset ui-btn-corner-all ui-btn-shadow ui-icon-searchfield" + f + g + "'></div>").parent() : n && (i = c.wrap("<div class='ui-input-text ui-shadow-inset ui-corner-all ui-btn-shadow" + f + g + "'></div>").parent()), m || h ? (j = a("<a href='#' class='ui-input-clear' title='" + k + "'>" + k + "</a>").bind("click", function (a) { c.val("").focus().trigger("change"), j.addClass("ui-input-clear-hidden"), a.preventDefault() }).appendTo(i).buttonMarkup({ icon: "delete", iconpos: "notext", corners: !0, shadow: !0, mini: d.mini }), h || i.addClass("ui-input-has-clear"), o(), c.bind("paste cut keyup input focus change blur", o)) : !n && !h && c.addClass("ui-corner-all ui-shadow-inset" + f + g), c.focus(function () { d.preventFocusZoom && a.mobile.zoom.disable(!0), i.addClass(a.mobile.focusClass) }).blur(function () { i.removeClass(a.mobile.focusClass), d.preventFocusZoom && a.mobile.zoom.enable(!0) }); if (c.is("textarea")) { var p = 15, q = 100, r; this._keyup = function () { var a = c[0].scrollHeight, b = c[0].clientHeight; b < a && c.height(a + p) }, c.on("keyup change input paste", function () { clearTimeout(r), r = setTimeout(b._keyup, q) }), this._on(a.mobile.document, { pagechange: "_keyup" }), a.trim(c.val()) && this._on(a.mobile.window, { load: "_keyup" }) } c.attr("disabled") && this.disable() }, disable: function () { var a, b = this.element.is("[type='search'], :jqmData(type='search')"), c = this.element.is("input") && !this.element.is(":jqmData(type='range')"), d = this.element.attr("disabled", !0) && (c || b); return d ? a = this.element.parent() : a = this.element, a.addClass("ui-disabled"), this._setOption("disabled", !0) }, enable: function () { var a, b = this.element.is("[type='search'], :jqmData(type='search')"), c = this.element.is("input") && !this.element.is(":jqmData(type='range')"), d = this.element.attr("disabled", !1) && (c || b); return d ? a = this.element.parent() : a = this.element, a.removeClass("ui-disabled"), this._setOption("disabled", !1) } }), a.mobile.document.bind("pagecreate create", function (b) { a.mobile.textinput.prototype.enhanceWithin(b.target, !0) }) }(a), function (a, d) { a.widget("mobile.slider", a.mobile.widget, { widgetEventPrefix: "slide", options: { theme: null, trackTheme: null, disabled: !1, initSelector: "input[type='range'], :jqmData(type='range'), :jqmData(role='slider')", mini: !1, highlight: !1 }, _create: function () { var e = this, f = this.element, g = a.mobile.getInheritedTheme(f, "c"), h = this.options.theme || g, i = this.options.trackTheme || g, j = f[0].nodeName.toLowerCase(), k = this.isToggleSwitch = j === "select", l = f.parent().is(":jqmData(role='rangeslider')"), m = this.isToggleSwitch ? "ui-slider-switch" : "", n = f.attr("id"), o = a("[for='" + n + "']"), p = o.attr("id") || n + "-label", q = o.attr("id", p), r = this.isToggleSwitch ? 0 : parseFloat(f.attr("min")), s = this.isToggleSwitch ? f.find("option").length - 1 : parseFloat(f.attr("max")), t = b.parseFloat(f.attr("step") || 1), u = this.options.mini || f.jqmData("mini") ? " ui-mini" : "", v = c.createElement("a"), w = a(v), x = c.createElement("div"), y = a(x), z = this.options.highlight && !this.isToggleSwitch ? function () { var b = c.createElement("div"); return b.className = "ui-slider-bg " + a.mobile.activeBtnClass + " ui-btn-corner-all", a(b).prependTo(y) }() : !1, A; v.setAttribute("href", "#"), x.setAttribute("role", "application"), x.className = [this.isToggleSwitch ? "ui-slider " : "ui-slider-track ", m, " ui-btn-down-", i, " ui-btn-corner-all", u].join(""), v.className = "ui-slider-handle", x.appendChild(v), w.buttonMarkup({ corners: !0, theme: h, shadow: !0 }).attr({ role: "slider", "aria-valuemin": r, "aria-valuemax": s, "aria-valuenow": this._value(), "aria-valuetext": this._value(), title: this._value(), "aria-labelledby": p }), a.extend(this, { slider: y, handle: w, type: j, step: t, max: s, min: r, valuebg: z, isRangeslider: l, dragging: !1, beforeStart: null, userModified: !1, mouseMoved: !1 }); if (this.isToggleSwitch) { var B = c.createElement("div"); B.className = "ui-slider-inneroffset"; for (var C = 0, D = x.childNodes.length; C < D; C++) B.appendChild(x.childNodes[C]); x.appendChild(B), w.addClass("ui-slider-handle-snapping"), A = f.find("option"); for (var E = 0, F = A.length; E < F; E++) { var G = E ? "a" : "b", H = E ? " " + a.mobile.activeBtnClass : " ui-btn-down-" + i, I = c.createElement("div"), J = c.createElement("span"); J.className = ["ui-slider-label ui-slider-label-", G, H, " ui-btn-corner-all"].join(""), J.setAttribute("role", "img"), J.appendChild(c.createTextNode(A[E].innerHTML)), a(J).prependTo(y) } e._labels = a(".ui-slider-label", y) } q.addClass("ui-slider"), f.addClass(this.isToggleSwitch ? "ui-slider-switch" : "ui-slider-input"), this._on(f, { change: "_controlChange", keyup: "_controlKeyup", blur: "_controlBlur", vmouseup: "_controlVMouseUp" }), y.bind("vmousedown", a.proxy(this._sliderVMouseDown, this)).bind("vclick", !1), this._on(c, { vmousemove: "_preventDocumentDrag" }), this._on(y.add(c), { vmouseup: "_sliderVMouseUp" }), y.insertAfter(f); if (!this.isToggleSwitch && !l) { var B = this.options.mini ? "<div class='ui-slider ui-mini'>" : "<div class='ui-slider'>"; f.add(y).wrapAll(B) } this.isToggleSwitch && this.handle.bind({ focus: function () { y.addClass(a.mobile.focusClass) }, blur: function () { y.removeClass(a.mobile.focusClass) } }), this._on(this.handle, { vmousedown: "_handleVMouseDown", keydown: "_handleKeydown", keyup: "_handleKeyup" }), this.handle.bind("vclick", !1), this._handleFormReset && this._handleFormReset(), this.refresh(d, d, !0) }, _controlChange: function (a) { if (this._trigger("controlchange", a) === !1) return !1; this.mouseMoved || this.refresh(this._value(), !0) }, _controlKeyup: function (a) { this.refresh(this._value(), !0, !0) }, _controlBlur: function (a) { this.refresh(this._value(), !0) }, _controlVMouseUp: function (a) { this._checkedRefresh() }, _handleVMouseDown: function (a) { this.handle.focus() }, _handleKeydown: function (b) { var c = this._value(); if (this.options.disabled) return; switch (b.keyCode) { case a.mobile.keyCode.HOME: case a.mobile.keyCode.END: case a.mobile.keyCode.PAGE_UP: case a.mobile.keyCode.PAGE_DOWN: case a.mobile.keyCode.UP: case a.mobile.keyCode.RIGHT: case a.mobile.keyCode.DOWN: case a.mobile.keyCode.LEFT: b.preventDefault(), this._keySliding || (this._keySliding = !0, this.handle.addClass("ui-state-active")) } switch (b.keyCode) { case a.mobile.keyCode.HOME: this.refresh(this.min); break; case a.mobile.keyCode.END: this.refresh(this.max); break; case a.mobile.keyCode.PAGE_UP: case a.mobile.keyCode.UP: case a.mobile.keyCode.RIGHT: this.refresh(c + this.step); break; case a.mobile.keyCode.PAGE_DOWN: case a.mobile.keyCode.DOWN: case a.mobile.keyCode.LEFT: this.refresh(c - this.step) } }, _handleKeyup: function (a) { this._keySliding && (this._keySliding = !1, this.handle.removeClass("ui-state-active")) }, _sliderVMouseDown: function (a) { return this.options.disabled ? !1 : this._trigger("beforestart", a) === !1 ? !1 : (this.dragging = !0, this.userModified = !1, this.mouseMoved = !1, this.isToggleSwitch && (this.beforeStart = this.element[0].selectedIndex), this.refresh(a), this._trigger("start"), !1) }, _sliderVMouseUp: function () { if (this.dragging) return this.dragging = !1, this.isToggleSwitch && (this.handle.addClass("ui-slider-handle-snapping"), this.mouseMoved ? this.userModified ? this.refresh(this.beforeStart === 0 ? 1 : 0) : this.refresh(this.beforeStart) : this.refresh(this.beforeStart === 0 ? 1 : 0)), this.mouseMoved = !1, this._trigger("stop"), !1 }, _preventDocumentDrag: function (a) { if (this._trigger("drag", a) === !1) return !1; if (this.dragging && !this.options.disabled) return this.mouseMoved = !0, this.isToggleSwitch && this.handle.removeClass("ui-slider-handle-snapping"), this.refresh(a), this.userModified = this.beforeStart !== this.element[0].selectedIndex, !1 }, _checkedRefresh: function () { this.value != this._value() && this.refresh(this._value()) }, _value: function () { return this.isToggleSwitch ? this.element[0].selectedIndex : parseFloat(this.element.val()) }, _reset: function () { this.refresh(d, !1, !0) }, refresh: function (b, d, e) { var f = this, g = a.mobile.getInheritedTheme(this.element, "c"), h = this.options.theme || g, i = this.options.trackTheme || g; f.slider[0].className = [this.isToggleSwitch ? "ui-slider ui-slider-switch" : "ui-slider-track", " ui-btn-down-" + i, " ui-btn-corner-all", this.options.mini ? " ui-mini" : ""].join(""), (this.options.disabled || this.element.attr("disabled")) && this.disable(), this.value = this._value(), this.options.highlight && !this.isToggleSwitch && this.slider.find(".ui-slider-bg").length === 0 && (this.valuebg = function () { var b = c.createElement("div"); return b.className = "ui-slider-bg " + a.mobile.activeBtnClass + " ui-btn-corner-all", a(b).prependTo(f.slider) }()), this.handle.buttonMarkup({ corners: !0, theme: h, shadow: !0 }); var j, k, l = this.element, m = !this.isToggleSwitch, n = m ? [] : l.find("option"), o = m ? parseFloat(l.attr("min")) : 0, p = m ? parseFloat(l.attr("max")) : n.length - 1, q = m && parseFloat(l.attr("step")) > 0 ? parseFloat(l.attr("step")) : 1; if (typeof b == "object") { var r, s, t = b, u = 8; r = this.slider.offset().left, s = this.slider.width(), j = s / ((p - o) / q); if (!this.dragging || t.pageX < r - u || t.pageX > r + s + u) return; j > 1 ? k = (t.pageX - r) / s * 100 : k = Math.round((t.pageX - r) / s * 100) } else b == null && (b = m ? parseFloat(l.val() || 0) : l[0].selectedIndex), k = (parseFloat(b) - o) / (p - o) * 100; if (isNaN(k)) return; var v = k / 100 * (p - o) + o, w = (v - o) % q, x = v - w; Math.abs(w) * 2 >= q && (x += w > 0 ? q : -q); var y = 100 / ((p - o) / q); v = parseFloat(x.toFixed(5)), typeof j == "undefined" && (j = s / ((p - o) / q)), j > 1 && m && (k = (v - o) * y * (1 / q)), k < 0 && (k = 0), k > 100 && (k = 100), v < o && (v = o), v > p && (v = p), this.handle.css("left", k + "%"), this.handle[0].setAttribute("aria-valuenow", m ? v : n.eq(v).attr("value")), this.handle[0].setAttribute("aria-valuetext", m ? v : n.eq(v).getEncodedText()), this.handle[0].setAttribute("title", m ? v : n.eq(v).getEncodedText()), this.valuebg && this.valuebg.css("width", k + "%"); if (this._labels) { var z = this.handle.width() / this.slider.width() * 100, A = k && z + (100 - z) * k / 100, B = k === 100 ? 0 : Math.min(z + 100 - A, 100); this._labels.each(function () { var b = a(this).is(".ui-slider-label-a"); a(this).width((b ? A : B) + "%") }) } if (!e) { var C = !1; m ? (C = l.val() !== v, l.val(v)) : (C = l[0].selectedIndex !== v, l[0].selectedIndex = v); if (this._trigger("beforechange", b) === !1) return !1; !d && C && l.trigger("change") } }, enable: function () { return this.element.attr("disabled", !1), this.slider.removeClass("ui-disabled").attr("aria-disabled", !1), this._setOption("disabled", !1) }, disable: function () { return this.element.attr("disabled", !0), this.slider.addClass("ui-disabled").attr("aria-disabled", !0), this._setOption("disabled", !0) } }), a.widget("mobile.slider", a.mobile.slider, a.mobile.behaviors.formReset), a.mobile.document.bind("pagecreate create", function (b) { a.mobile.slider.prototype.enhanceWithin(b.target, !0) }) }(a), function (a, b) { a.widget("mobile.rangeslider", a.mobile.widget, { options: { theme: null, trackTheme: null, disabled: !1, initSelector: ":jqmData(role='rangeslider')", mini: !1, highlight: !0 }, _create: function () { var b, c = this.element, d = this.options.mini ? "ui-rangeslider ui-mini" : "ui-rangeslider", e = c.find("input").first(), f = c.find("input").last(), g = c.find("label").first(), h = a.data(e.get(0), "mobileSlider").slider, i = a.data(f.get(0), "mobileSlider").slider, j = a.data(e.get(0), "mobileSlider").handle, k = a('<div class="ui-rangeslider-sliders" />').appendTo(c); c.find("label").length > 1 && (b = c.find("label").last().hide()), e.addClass("ui-rangeslider-first"), f.addClass("ui-rangeslider-last"), c.addClass(d), h.appendTo(k), i.appendTo(k), g.prependTo(c), j.prependTo(i), a.extend(this, { _inputFirst: e, _inputLast: f, _sliderFirst: h, _sliderLast: i, _targetVal: null, _sliderTarget: !1, _sliders: k, _proxy: !1 }), this.refresh(), this._on(this.element.find("input.ui-slider-input"), { slidebeforestart: "_slidebeforestart", slidestop: "_slidestop", slidedrag: "_slidedrag", slidebeforechange: "_change", blur: "_change", keyup: "_change" }), this._on(j, { vmousedown: "_dragFirstHandle" }) }, _dragFirstHandle: function (b) { return a.data(this._inputFirst.get(0), "mobileSlider").dragging = !0, a.data(this._inputFirst.get(0), "mobileSlider").refresh(b), !1 }, _slidedrag: function (b) { var c = a(b.target).is(this._inputFirst), d = c ? this._inputLast : this._inputFirst; this._sliderTarget = !1; if (this._proxy === "first" && c || this._proxy === "last" && !c) return a.data(d.get(0), "mobileSlider").dragging = !0, a.data(d.get(0), "mobileSlider").refresh(b), !1 }, _slidestop: function (b) { var c = a(b.target).is(this._inputFirst); this._proxy = !1, this.element.find("input").trigger("vmouseup"), this._sliderFirst.css("z-index", c ? 1 : "") }, _slidebeforestart: function (b) { this._sliderTarget = !1, a(b.originalEvent.target).hasClass("ui-slider-track") && (this._sliderTarget = !0, this._targetVal = a(b.target).val()) }, _setOption: function (a) { this._superApply(a), this.refresh() }, refresh: function () { var a = this.element, b = this.options; a.find("input").slider({ theme: b.theme, trackTheme: b.trackTheme, disabled: b.disabled, mini: b.mini, highlight: b.highlight }).slider("refresh"), this._updateHighlight() }, _change: function (b) { if (b.type == "keyup") return this._updateHighlight(), !1; var c = parseFloat(this._inputFirst.val(), 10), d = parseFloat(this._inputLast.val(), 10), e = a(b.target).hasClass("ui-rangeslider-first"), f = e ? this._inputFirst : this._inputLast, g = e ? this._inputLast : this._inputFirst; if (c > d && !this._sliderTarget) f.val(e ? d : c).slider("refresh"), this._trigger("normalize"); else if (c > d) { f.val(this._targetVal).slider("refresh"); var h = this; setTimeout(function () { g.val(e ? c : d).slider("refresh"), a.data(g.get(0), "mobileSlider").handle.focus(), h._sliderFirst.css("z-index", e ? "" : 1), h._trigger("normalize") }, 0), this._proxy = e ? "first" : "last" } c === d ? (a.data(f.get(0), "mobileSlider").handle.css("z-index", 1), a.data(g.get(0), "mobileSlider").handle.css("z-index", 0)) : (a.data(g.get(0), "mobileSlider").handle.css("z-index", ""), a.data(f.get(0), "mobileSlider").handle.css("z-index", "")), this._updateHighlight(); if (c >= d) return !1 }, _updateHighlight: function () { var b = parseInt(a.data(this._inputFirst.get(0), "mobileSlider").handle.get(0).style.left, 10), c = parseInt(a.data(this._inputLast.get(0), "mobileSlider").handle.get(0).style.left, 10), d = c - b; this.element.find(".ui-slider-bg").css({ "margin-left": b + "%", width: d + "%" }) }, _destroy: function () { this.element.removeClass("ui-rangeslider ui-mini").find("label").show(), this._inputFirst.after(this._sliderFirst), this._inputLast.after(this._sliderLast), this._sliders.remove(), this.element.find("input").removeClass("ui-rangeslider-first ui-rangeslider-last").slider("destroy") } }), a.widget("mobile.rangeslider", a.mobile.rangeslider, a.mobile.behaviors.formReset), a(c).bind("pagecreate create", function (b) { a.mobile.rangeslider.prototype.enhanceWithin(b.target, !0) }) }(a), function (a, d) { function w(b) { !!j && (!j.closest("." + a.mobile.activePageClass).length || b) && j.removeClass(a.mobile.activeBtnClass), j = null } function x() { o = !1, n.length > 0 && a.mobile.changePage.apply(null, n.pop()) } function B(b, c, d, e) { c && c.data("mobile-page")._trigger("beforehide", null, { nextPage: b }), b.data("mobile-page")._trigger("beforeshow", null, { prevPage: c || a("") }), a.mobile.hidePageLoadingMsg(), d = a.mobile._maybeDegradeTransition(d); var f = a.mobile.transitionHandlers[d || "default"] || a.mobile.defaultTransitionHandler, g = f(d, e, b, c); return g.done(function () { c && c.data("mobile-page")._trigger("hide", null, { nextPage: b }), b.data("mobile-page")._trigger("show", null, { prevPage: c || a("") }) }), g } function C(b, c) { c && b.attr("data-" + a.mobile.ns + "role", c), b.page() } function D() { var b = a.mobile.activePage && F(a.mobile.activePage); return b || s.hrefNoHash } function E(a) { while (a) { if (typeof a.nodeName == "string" && a.nodeName.toLowerCase() === "a") break; a = a.parentNode } return a } function F(b) { var c = a(b).closest(".ui-page").jqmData("url"), d = s.hrefNoHash; if (!c || !h.isPath(c)) c = d; return h.makeUrlAbsolute(c, d) } var e = a.mobile.window, f = a("html"), g = a("head"), h = a.extend(a.mobile.path, { getFilePath: function (b) { var c = "&" + a.mobile.subPageUrlKey; return b && b.split(c)[0].split(p)[0] }, isFirstPageUrl: function (b) { var c = h.parseUrl(h.makeUrlAbsolute(b, this.documentBase)), e = c.hrefNoHash === this.documentUrl.hrefNoHash || this.documentBaseDiffers && c.hrefNoHash === this.documentBase.hrefNoHash, f = a.mobile.firstPage, g = f && f[0] ? f[0].id : d; return e && (!c.hash || c.hash === "#" || g && c.hash.replace(/^#/, "") === g) }, isPermittedCrossDomainRequest: function (b, c) { return a.mobile.allowCrossDomainPages && b.protocol === "file:" && c.search(/^https?:/) !== -1 } }), i = null, j = null, k = a.Deferred(), l = a.mobile.navigate.history, m = "[tabindex],a,button:visible,select:visible,input", n = [], o = !1, p = "&ui-state=dialog", q = g.children("base"), r = h.documentUrl, s = h.documentBase, t = h.documentBaseDiffers, u = a.mobile.getScreenHeight, v = a.support.dynamicBaseTag ? { element: q.length ? q : a("<base>", { href: s.hrefNoHash }).prependTo(g), set: function (a) { a = h.parseUrl(a).hrefNoHash, v.element.attr("href", h.makeUrlAbsolute(a, s)) }, reset: function () { v.element.attr("href", s.hrefNoSearch) } } : d; a.mobile.getDocumentUrl = h.getDocumentUrl, a.mobile.getDocumentBase = h.getDocumentBase, a.mobile.back = function () { var a = b.navigator; this.phonegapNavigationEnabled && a && a.app && a.app.backHistory ? a.app.backHistory() : b.history.back() }, a.mobile.focusPage = function (a) { var b = a.find("[autofocus]"), c = a.find(".ui-title:eq(0)"); if (b.length) { b.focus(); return } c.length ? c.focus() : a.focus() }; var y = !0, z, A; z = function () { if (!y) return; var b = a.mobile.urlHistory.getActive(); if (b) { var c = e.scrollTop(); b.lastScroll = c < a.mobile.minScrollBack ? a.mobile.defaultHomeScroll : c } }, A = function () { setTimeout(z, 100) }, e.bind(a.support.pushState ? "popstate" : "hashchange", function () { y = !1 }), e.one(a.support.pushState ? "popstate" : "hashchange", function () { y = !0 }), e.one("pagecontainercreate", function () { a.mobile.pageContainer.bind("pagechange", function () { y = !0, e.unbind("scrollstop", A), e.bind("scrollstop", A) }) }), e.bind("scrollstop", A), a.mobile._maybeDegradeTransition = a.mobile._maybeDegradeTransition || function (a) { return a }, a.mobile.resetActivePageHeight = function (c) { var d = a("." + a.mobile.activePageClass), e = parseFloat(d.css("padding-top")), f = parseFloat(d.css("padding-bottom")), g = parseFloat(d.css("border-top-width")), h = parseFloat(d.css("border-bottom-width")); c = typeof c == "number" ? c : u(), d.css("min-height", c - e - f - g - h) }, a.fn.animationComplete = function (b) { return a.support.cssTransitions ? a(this).one("webkitAnimationEnd animationend", b) : (setTimeout(b, 0), a(this)) }, a.mobile.path = h, a.mobile.base = v, a.mobile.urlHistory = l, a.mobile.dialogHashKey = p, a.mobile.allowCrossDomainPages = !1, a.mobile._bindPageRemove = function () { var b = a(this); !b.data("mobile-page").options.domCache && b.is(":jqmData(external-page='true')") && b.bind("pagehide.remove", function (b) { var c = a(this), d = new a.Event("pageremove"); c.trigger(d), d.isDefaultPrevented() || c.removeWithDependents() }) }, a.mobile.loadPage = function (b, c) { var e = a.Deferred(), f = a.extend({}, a.mobile.loadPage.defaults, c), g = null, i = null, j = h.makeUrlAbsolute(b, D()); f.data && f.type === "get" && (j = h.addSearchParams(j, f.data), f.data = d), f.data && f.type === "post" && (f.reloadPage = !0); var k = h.getFilePath(j), l = h.convertUrlToDataUrl(j); f.pageContainer = f.pageContainer || a.mobile.pageContainer, g = f.pageContainer.children("[data-" + a.mobile.ns + "url='" + l + "']"), g.length === 0 && l && !h.isPath(l) && (g = f.pageContainer.children("#" + l).attr("data-" + a.mobile.ns + "url", l).jqmData("url", l)); if (g.length === 0) if (a.mobile.firstPage && h.isFirstPageUrl(k)) a.mobile.firstPage.parent().length && (g = a(a.mobile.firstPage)); else if (h.isEmbeddedPage(k)) return e.reject(j, c), e.promise(); if (g.length) { if (!f.reloadPage) return C(g, f.role), e.resolve(j, c, g), e.promise(); i = g } var m = f.pageContainer, n = new a.Event("pagebeforeload"), o = { url: b, absUrl: j, dataUrl: l, deferred: e, options: f }; m.trigger(n, o); if (n.isDefaultPrevented()) return e.promise(); if (f.showLoadMsg) var p = setTimeout(function () { a.mobile.showPageLoadingMsg() }, f.loadMsgDelay), q = function () { clearTimeout(p), a.mobile.hidePageLoadingMsg() }; return v && v.reset(), !a.mobile.allowCrossDomainPages && !h.isSameDomain(r, j) ? e.reject(j, c) : a.ajax({ url: k, type: f.type, data: f.data, dataType: "html", success: function (d, m, n) { var p = a("<div></div>"), r = d.match(/<title[^>]*>([^<]*)/) && RegExp.$1, s = new RegExp("(<[^>]+\\bdata-" + a.mobile.ns + "role=[\"']?page[\"']?[^>]*>)"), t = new RegExp("\\bdata-" + a.mobile.ns + "url=[\"']?([^\"'>]*)[\"']?"); s.test(d) && RegExp.$1 && t.test(RegExp.$1) && RegExp.$1 && (b = k = h.getFilePath(a("<div>" + RegExp.$1 + "</div>").text())), v && v.set(k), p.get(0).innerHTML = d, g = p.find(":jqmData(role='page'), :jqmData(role='dialog')").first(), g.length || (g = a("<div data-" + a.mobile.ns + "role='page'>" + (d.split(/<\/?body[^>]*>/gmi)[1] || "") + "</div>")), r && !g.jqmData("title") && (~r.indexOf("&") && (r = a("<div>" + r + "</div>").text()), g.jqmData("title", r)); if (!a.support.dynamicBaseTag) { var u = h.get(k); g.find("[src], link[href], a[rel='external'], :jqmData(ajax='false'), a[target]").each(function () { var b = a(this).is("[href]") ? "href" : a(this).is("[src]") ? "src" : "action", c = a(this).attr(b); c = c.replace(location.protocol + "//" + location.host + location.pathname, ""), /^(\w+:|#|\/)/.test(c) || a(this).attr(b, u + c) }) } g.attr("data-" + a.mobile.ns + "url", h.convertUrlToDataUrl(k)).attr("data-" + a.mobile.ns + "external-page", !0).appendTo(f.pageContainer), g.one("pagecreate", a.mobile._bindPageRemove), C(g, f.role), j.indexOf("&" + a.mobile.subPageUrlKey) > -1 && (g = f.pageContainer.children("[data-" + a.mobile.ns + "url='" + l + "']")), f.showLoadMsg && q(), o.xhr = n, o.textStatus = m, o.page = g, f.pageContainer.trigger("pageload", o), e.resolve(j, c, g, i) }, error: function (b, d, g) { v && v.set(h.get()), o.xhr = b, o.textStatus = d, o.errorThrown = g; var i = new a.Event("pageloadfailed"); f.pageContainer.trigger(i, o); if (i.isDefaultPrevented()) return; f.showLoadMsg && (q(), a.mobile.showPageLoadingMsg(a.mobile.pageLoadErrorMessageTheme, a.mobile.pageLoadErrorMessage, !0), setTimeout(a.mobile.hidePageLoadingMsg, 1500)), e.reject(j, c) } }), e.promise() }, a.mobile.loadPage.defaults = { type: "get", data: d, reloadPage: !1, role: d, showLoadMsg: !1, pageContainer: d, loadMsgDelay: 50 }, a.mobile.changePage = function (b, e) { if (o) { n.unshift(arguments); return } var f = a.extend({}, a.mobile.changePage.defaults, e), g; f.pageContainer = f.pageContainer || a.mobile.pageContainer, f.fromPage = f.fromPage || a.mobile.activePage, g = typeof b == "string"; var i = f.pageContainer, j = new a.Event("pagebeforechange"), k = { toPage: b, options: f }; g ? k.absUrl = h.makeUrlAbsolute(b, D()) : k.absUrl = b.data("absUrl"), i.trigger(j, k); if (j.isDefaultPrevented()) return; b = k.toPage, g = typeof b == "string", o = !0; if (g) { f.target = b, a.mobile.loadPage(b, f).done(function (b, c, d, e) { o = !1, c.duplicateCachedPage = e, d.data("absUrl", k.absUrl), a.mobile.changePage(d, c) }).fail(function (a, b) { o = !1, w(!0), x(), f.pageContainer.trigger("pagechangefailed", k) }); return } b[0] === a.mobile.firstPage[0] && !f.dataUrl && (f.dataUrl = r.hrefNoHash); var m = f.fromPage, q = f.dataUrl && h.convertUrlToDataUrl(f.dataUrl) || b.jqmData("url"), s = q, t = h.getFilePath(q), u = l.getActive(), v = l.activeIndex === 0, y = 0, z = c.title, A = f.role === "dialog" || b.jqmData("role") === "dialog"; if (m && m[0] === b[0] && !f.allowSamePageTransition) { o = !1, i.trigger("pagechange", k), f.fromHashChange && l.direct({ url: q }); return } C(b, f.role), f.fromHashChange && (y = e.direction === "back" ? -1 : 1); try { c.activeElement && c.activeElement.nodeName.toLowerCase() !== "body" ? a(c.activeElement).blur() : a("input:focus, textarea:focus, select:focus").blur() } catch (E) { } var F = !1; A && u && (u.url && u.url.indexOf(p) > -1 && a.mobile.activePage && !a.mobile.activePage.is(".ui-dialog") && l.activeIndex > 0 && (f.changeHash = !1, F = !0), q = u.url || "", !F && q.indexOf("#") > -1 ? q += p : q += "#" + p, l.activeIndex === 0 && q === l.initialDst && (q += p)); var G = u ? b.jqmData("title") || b.children(":jqmData(role='header')").find(".ui-title").getEncodedText() : z; !!G && z === c.title && (z = G), b.jqmData("title") || b.jqmData("title", z), f.transition = f.transition || (y && !v ? u.transition : d) || (A ? a.mobile.defaultDialogTransition : a.mobile.defaultPageTransition), !y && F && (l.getActive().pageUrl = s); if (q && !f.fromHashChange) { var H; !h.isPath(q) && q.indexOf("#") < 0 && (q = "#" + q), H = { transition: f.transition, title: z, pageUrl: s, role: f.role }, f.changeHash !== !1 && a.mobile.hashListeningEnabled ? a.mobile.navigate(q, H, !0) : b[0] !== a.mobile.firstPage[0] && a.mobile.navigate.history.add(q, H) } c.title = z, a.mobile.activePage = b, f.reverse = f.reverse || y < 0, B(b, m, f.transition, f.reverse).done(function (c, d, e, g, h) { w(), f.duplicateCachedPage && f.duplicateCachedPage.remove(), h || a.mobile.focusPage(b), x(), i.trigger("pagechange", k) }) }, a.mobile.changePage.defaults = { transition: d, reverse: !1, changeHash: !0, fromHashChange: !1, role: d, duplicateCachedPage: d, pageContainer: d, showLoadMsg: !0, dataUrl: d, fromPage: d, allowSamePageTransition: !1 }, a.mobile.navreadyDeferred = a.Deferred(), a.mobile._registerInternalEvents = function () { var c = function (b, c) { var d, e, f, g = !0, j, k; return !a.mobile.ajaxEnabled || b.is(":jqmData(ajax='false')") || !b.jqmHijackable().length ? !1 : (e = b.attr("target"), f = b.attr("action"), f || (f = F(b), f === s.hrefNoHash && (f = r.hrefNoSearch)), f = h.makeUrlAbsolute(f, F(b)), h.isExternal(f) && !h.isPermittedCrossDomainRequest(r, f) || e ? !1 : (c || (d = b.attr("method"), j = b.serializeArray(), i && i[0].form === b[0] && (k = i.attr("name"), k && (a.each(j, function (a, b) { if (b.name === k) return k = "", !1 }), k && j.push({ name: k, value: i.attr("value") }))), g = { url: f, options: { type: d && d.length && d.toLowerCase() || "get", data: a.param(j), transition: b.jqmData("transition"), reverse: b.jqmData("direction") === "reverse", reloadPage: !0 } }), g)) }; a.mobile.document.delegate("form", "submit", function (b) { var d = c(a(this)); d && (a.mobile.changePage(d.url, d.options), b.preventDefault()) }), a.mobile.document.bind("vclick", function (b) { var d, e, f = b.target, g = !1; if (b.which > 1 || !a.mobile.linkBindingEnabled) return; i = a(f); if (a.data(f, "mobile-button")) { if (!c(a(f).closest("form"), !0)) return; f.parentNode && (f = f.parentNode) } else { f = E(f); if (!f || h.parseUrl(f.getAttribute("href") || "#").hash === "#") return; if (!a(f).jqmHijackable().length) return } ~f.className.indexOf("ui-link-inherit") ? f.parentNode && (e = a.data(f.parentNode, "buttonElements")) : e = a.data(f, "buttonElements"), e ? f = e.outer : g = !0, d = a(f), g && (d = d.closest(".ui-btn")), d.length > 0 && !d.hasClass("ui-disabled") && (w(!0), j = d, j.addClass(a.mobile.activeBtnClass)) }), a.mobile.document.bind("click", function (c) { if (!a.mobile.linkBindingEnabled || c.isDefaultPrevented()) return; var e = E(c.target), f = a(e), g; if (!e || c.which > 1 || !f.jqmHijackable().length) return; g = function () { b.setTimeout(function () { w(!0) }, 200) }; if (f.is(":jqmData(rel='back')")) return a.mobile.back(), !1; var i = F(f), j = h.makeUrlAbsolute(f.attr("href") || "#", i); if (!a.mobile.ajaxEnabled && !h.isEmbeddedPage(j)) { g(); return } if (j.search("#") !== -1) { j = j.replace(/[^#]*#/, ""); if (!j) { c.preventDefault(); return } h.isPath(j) ? j = h.makeUrlAbsolute(j, i) : j = h.makeUrlAbsolute("#" + j, r.hrefNoHash) } var k = f.is("[rel='external']") || f.is(":jqmData(ajax='false')") || f.is("[target]"), l = k || h.isExternal(j) && !h.isPermittedCrossDomainRequest(r, j); if (l) { g(); return } var m = f.jqmData("transition"), n = f.jqmData("direction") === "reverse" || f.jqmData("back"), o = f.attr("data-" + a.mobile.ns + "rel") || d; a.mobile.changePage(j, { transition: m, reverse: n, role: o, link: f }), c.preventDefault() }), a.mobile.document.delegate(".ui-page", "pageshow.prefetch", function () { var b = []; a(this).find("a:jqmData(prefetch)").each(function () { var c = a(this), d = c.attr("href"); d && a.inArray(d, b) === -1 && (b.push(d), a.mobile.loadPage(d, { role: c.attr("data-" + a.mobile.ns + "rel") })) }) }), a.mobile._handleHashChange = function (c, e) { var f = h.stripHash(c), g = a.mobile.urlHistory.stack.length === 0 ? "none" : d, i = { changeHash: !1, fromHashChange: !0, reverse: e.direction === "back" }; a.extend(i, e, { transition: (l.getLast() || {}).transition || g }); if (l.activeIndex > 0 && f.indexOf(p) > -1 && l.initialDst !== f) { if (a.mobile.activePage && !a.mobile.activePage.is(".ui-dialog")) { e.direction === "back" ? a.mobile.back() : b.history.forward(); return } f = e.pageUrl; var j = a.mobile.urlHistory.getActive(); a.extend(i, { role: j.role, transition: j.transition, reverse: e.direction === "back" }) } f ? (f = h.isPath(f) ? f : h.makeUrlAbsolute("#" + f, s), f === h.makeUrlAbsolute("#" + l.initialDst, s) && l.stack.length && l.stack[0].url !== l.initialDst.replace(p, "") && (f = a.mobile.firstPage), a.mobile.changePage(f, i)) : a.mobile.changePage(a.mobile.firstPage, i) }, e.bind("navigate", function (b, c) { var d = a.event.special.navigate.originalEventName.indexOf("hashchange") > -1 ? c.state.hash : c.state.url; d || (d = a.mobile.path.parseLocation().hash); if (!d || d === "#" || d.indexOf("#" + a.mobile.path.uiStateKey) === 0) d = location.href; a.mobile._handleHashChange(d, c.state) }), a.mobile.document.bind("pageshow", a.mobile.resetActivePageHeight), a.mobile.window.bind("throttledresize", a.mobile.resetActivePageHeight) }, a(function () { k.resolve() }), a.when(k, a.mobile.navreadyDeferred).done(function () { a.mobile._registerInternalEvents() }) }(a), function (a, b, d) { function h() { e.removeClass("ui-mobile-rendering") } var e = a("html"), f = a("head"), g = a.mobile.window; a(b.document).trigger("mobileinit"); if (!a.mobile.gradeA()) return; a.mobile.ajaxBlacklist && (a.mobile.ajaxEnabled = !1), e.addClass("ui-mobile ui-mobile-rendering"), setTimeout(h, 5e3), a.extend(a.mobile, { initializePage: function () { var b = a.mobile.path, d = a(":jqmData(role='page'), :jqmData(role='dialog')"), e = b.stripHash(b.stripQueryParams(b.parseLocation().hash)), f = c.getElementById(e); d.length || (d = a("body").wrapInner("<div data-" + a.mobile.ns + "role='page'></div>").children(0)), d.each(function () { var b = a(this); b.jqmData("url") || b.attr("data-" + a.mobile.ns + "url", b.attr("id") || location.pathname + location.search) }), a.mobile.firstPage = d.first(), a.mobile.pageContainer = a.mobile.firstPage.parent().addClass("ui-mobile-viewport"), g.trigger("pagecontainercreate"), a.mobile.showPageLoadingMsg(), h(), !a.mobile.hashListeningEnabled || !a.mobile.path.isHashValid(location.hash) || !a(f).is(':jqmData(role="page")') && !a.mobile.path.isPath(e) && e !== a.mobile.dialogHashKey ? (a.mobile.path.isHashValid(location.hash) && (a.mobile.urlHistory.initialDst = e.replace("#", "")), a.event.special.navigate.isPushStateEnabled() && a.mobile.navigate.navigator.squash(b.parseLocation().href), a.mobile.changePage(a.mobile.firstPage, { transition: "none", reverse: !0, changeHash: !1, fromHashChange: !0 })) : a.event.special.navigate.isPushStateEnabled() ? (a.mobile.navigate.history.stack = [], a.mobile.navigate(a.mobile.path.isPath(location.hash) ? location.hash : location.href)) : g.trigger("hashchange", [!0]) } }), a.mobile.navreadyDeferred.resolve(), a(function () { b.scrollTo(0, 1), a.mobile.defaultHomeScroll = !a.support.scrollTop || a.mobile.window.scrollTop() === 1 ? 0 : 1, a.mobile.autoInitializePage && a.mobile.initializePage(), g.load(a.mobile.silentScroll), a.support.cssPointerEvents || a.mobile.document.delegate(".ui-disabled", "vclick", function (a) { a.preventDefault(), a.stopImmediatePropagation() }) }) }(a, this), function (a, b, c) { a.widget("mobile.dialog", a.mobile.widget, { options: { closeBtn: "left", closeBtnText: "Close", overlayTheme: "a", corners: !0, initSelector: ":jqmData(role='dialog')" }, _handlePageBeforeShow: function () { this._isCloseable = !0, this.options.overlayTheme && this.element.page("removeContainerBackground").page("setContainerBackground", this.options.overlayTheme) }, _create: function () { var b = this, c = this.element, d = this.options.corners ? " ui-corner-all" : "", e = a("<div/>", { role: "dialog", "class": "ui-dialog-contain ui-overlay-shadow" + d }); c.addClass("ui-dialog ui-overlay-" + this.options.overlayTheme), c.wrapInner(e), c.bind("vclick submit", function (b) { var c = a(b.target).closest(b.type === "vclick" ? "a" : "form"), d; c.length && !c.jqmData("transition") && (d = a.mobile.urlHistory.getActive() || {}, c.attr("data-" + a.mobile.ns + "transition", d.transition || a.mobile.defaultDialogTransition).attr("data-" + a.mobile.ns + "direction", "reverse")) }), this._on(c, { pagebeforeshow: "_handlePageBeforeShow" }), a.extend(this, { _createComplete: !1 }), this._setCloseBtn(this.options.closeBtn) }, _setCloseBtn: function (b) { var c = this, d, e; this._headerCloseButton && (this._headerCloseButton.remove(), this._headerCloseButton = null), b !== "none" && (e = b === "left" ? "left" : "right", d = a("<a href='#' class='ui-btn-" + e + "' data-" + a.mobile.ns + "icon='delete' data-" + a.mobile.ns + "iconpos='notext'>" + this.options.closeBtnText + "</a>"), this.element.children().find(":jqmData(role='header')").first().prepend(d), this._createComplete && a.fn.buttonMarkup && d.buttonMarkup(), this._createComplete = !0, d.bind("click", function () { c.close() }), this._headerCloseButton = d) }, _setOption: function (b, c) { b === "closeBtn" && (this._setCloseBtn(c), this._super(b, c), this.element.attr("data-" + (a.mobile.ns || "") + "close-btn", c)) }, close: function () { var b, c, d = a.mobile.navigate.history; this._isCloseable && (this._isCloseable = !1, a.mobile.hashListeningEnabled && d.activeIndex > 0 ? a.mobile.back() : (b = Math.max(0, d.activeIndex - 1), c = d.stack[b].pageUrl || d.stack[b].url, d.previousIndex = d.activeIndex, d.activeIndex = b, a.mobile.path.isPath(c) || (c = a.mobile.path.makeUrlAbsolute("#" + c)), a.mobile.changePage(c, { direction: "back", changeHash: !1, fromHashChange: !0 }))) } }), a.mobile.document.delegate(a.mobile.dialog.prototype.options.initSelector, "pagecreate", function () { a.mobile.dialog.prototype.enhance(this) }) }(a, this), function (a, b) { a.mobile.page.prototype.options.backBtnText = "Back", a.mobile.page.prototype.options.addBackBtn = !1, a.mobile.page.prototype.options.backBtnTheme = null, a.mobile.page.prototype.options.headerTheme = "a", a.mobile.page.prototype.options.footerTheme = "a", a.mobile.page.prototype.options.contentTheme = null, a.mobile.document.bind("pagecreate", function (b) { var c = a(b.target), d = c.data("mobile-page").options, e = c.jqmData("role"), f = d.theme; a(":jqmData(role='header'), :jqmData(role='footer'), :jqmData(role='content')", c).jqmEnhanceable().each(function () { var b = a(this), g = b.jqmData("role"), h = b.jqmData("theme"), i = h || d.contentTheme || e === "dialog" && f, j, k, l, m; b.addClass("ui-" + g); if (g === "header" || g === "footer") { var n = h || (g === "header" ? d.headerTheme : d.footerTheme) || f; b.addClass("ui-bar-" + n).attr("role", g === "header" ? "banner" : "contentinfo"), g === "header" && (j = b.children("a, button"), k = j.hasClass("ui-btn-left"), l = j.hasClass("ui-btn-right"), k = k || j.eq(0).not(".ui-btn-right").addClass("ui-btn-left").length, l = l || j.eq(1).addClass("ui-btn-right").length), d.addBackBtn && g === "header" && a(".ui-page").length > 1 && c.jqmData("url") !== a.mobile.path.stripHash(location.hash) && !k && (m = a("<a href='javascript:void(0);' class='ui-btn-left' data-" + a.mobile.ns + "rel='back' data-" + a.mobile.ns + "icon='arrow-l'>" + d.backBtnText + "</a>").attr("data-" + a.mobile.ns + "theme", d.backBtnTheme || n).prependTo(b)), b.children("h1, h2, h3, h4, h5, h6").addClass("ui-title").attr({ role: "heading", "aria-level": "1" }) } else g === "content" && (i && b.addClass("ui-body-" + i), b.attr("role", "main")) }) }) }(a), function (a, b) { a.widget("mobile.fixedtoolbar", a.mobile.widget, { options: { visibleOnPageShow: !0, disablePageZoom: !0, transition: "slide", fullscreen: !1, tapToggle: !0, tapToggleBlacklist: "a, button, input, select, textarea, .ui-header-fixed, .ui-footer-fixed, .ui-popup, .ui-panel, .ui-panel-dismiss-open", hideDuringFocus: "input, textarea, select", updatePagePadding: !0, trackPersistentToolbars: !0, supportBlacklist: function () { return !a.support.fixedPosition }, initSelector: ":jqmData(position='fixed')" }, _create: function () { var b = this, c = b.options, d = b.element, e = d.is(":jqmData(role='header')") ? "header" : "footer", f = d.closest(".ui-page"); if (c.supportBlacklist()) { b.destroy(); return } d.addClass("ui-" + e + "-fixed"), c.fullscreen ? (d.addClass("ui-" + e + "-fullscreen"), f.addClass("ui-page-" + e + "-fullscreen")) : f.addClass("ui-page-" + e + "-fixed"), a.extend(this, { _thisPage: null }), b._addTransitionClass(), b._bindPageEvents(), b._bindToggleHandlers() }, _addTransitionClass: function () { var a = this.options.transition; a && a !== "none" && (a === "slide" && (a = this.element.is(".ui-header") ? "slidedown" : "slideup"), this.element.addClass(a)) }, _bindPageEvents: function () { this._thisPage = this.element.closest(".ui-page"), this._on(this._thisPage, { pagebeforeshow: "_handlePageBeforeShow", webkitAnimationStart: "_handleAnimationStart", animationstart: "_handleAnimationStart", updatelayout: "_handleAnimationStart", pageshow: "_handlePageShow", pagebeforehide: "_handlePageBeforeHide" }) }, _handlePageBeforeShow: function () { var b = this.options; b.disablePageZoom && a.mobile.zoom.disable(!0), b.visibleOnPageShow || this.hide(!0) }, _handleAnimationStart: function () { this.options.updatePagePadding && this.updatePagePadding(this._thisPage) }, _handlePageShow: function () { this.updatePagePadding(this._thisPage), this.options.updatePagePadding && this._on(a.mobile.window, { throttledresize: "updatePagePadding" }) }, _handlePageBeforeHide: function (b, c) { var d = this.options; d.disablePageZoom && a.mobile.zoom.enable(!0), d.updatePagePadding && this._off(a.mobile.window, "throttledresize"); if (d.trackPersistentToolbars) { var e = a(".ui-footer-fixed:jqmData(id)", this._thisPage), f = a(".ui-header-fixed:jqmData(id)", this._thisPage), g = e.length && c.nextPage && a(".ui-footer-fixed:jqmData(id='" + e.jqmData("id") + "')", c.nextPage) || a(), h = f.length && c.nextPage && a(".ui-header-fixed:jqmData(id='" + f.jqmData("id") + "')", c.nextPage) || a(); if (g.length || h.length) g.add(h).appendTo(a.mobile.pageContainer), c.nextPage.one("pageshow", function () { h.prependTo(this), g.appendTo(this) }) } }, _visible: !0, updatePagePadding: function (b) { var c = this.element, d = c.is(".ui-header"), e = parseFloat(c.css(d ? "top" : "bottom")); if (this.options.fullscreen) return; b = b || this._thisPage || c.closest(".ui-page"), a(b).css("padding-" + (d ? "top" : "bottom"), c.outerHeight() + e) }, _useTransition: function (b) { var c = a.mobile.window, d = this.element, e = c.scrollTop(), f = d.height(), g = d.closest(".ui-page").height(), h = a.mobile.getScreenHeight(), i = d.is(":jqmData(role='header')") ? "header" : "footer"; return !b && (this.options.transition && this.options.transition !== "none" && (i === "header" && !this.options.fullscreen && e > f || i === "footer" && !this.options.fullscreen && e + h < g - f) || this.options.fullscreen) }, show: function (a) { var b = "ui-fixed-hidden", c = this.element; this._useTransition(a) ? c.removeClass("out " + b).addClass("in").animationComplete(function () { c.removeClass("in") }) : c.removeClass(b), this._visible = !0 }, hide: function (a) { var b = "ui-fixed-hidden", c = this.element, d = "out" + (this.options.transition === "slide" ? " reverse" : ""); this._useTransition(a) ? c.addClass(d).removeClass("in").animationComplete(function () { c.addClass(b).removeClass(d) }) : c.addClass(b).removeClass(d), this._visible = !1 }, toggle: function () { this[this._visible ? "hide" : "show"]() }, _bindToggleHandlers: function () { var b = this, c, d = b.options, e = b.element; e.closest(".ui-page").bind("vclick", function (c) { d.tapToggle && !a(c.target).closest(d.tapToggleBlacklist).length && b.toggle() }).bind("focusin focusout", function (e) { screen.width < 1025 && a(e.target).is(d.hideDuringFocus) && !a(e.target).closest(".ui-header-fixed, .ui-footer-fixed").length && (e.type === "focusout" && !b._visible ? c = setTimeout(function () { b.show() }, 0) : e.type === "focusin" && b._visible && (clearTimeout(c), b.hide())) }) }, _destroy: function () { var a = this.element, b = a.is(".ui-header"); a.closest(".ui-page").css("padding-" + (b ? "top" : "bottom"), ""), a.removeClass("ui-header-fixed ui-footer-fixed ui-header-fullscreen ui-footer-fullscreen in out fade slidedown slideup ui-fixed-hidden"), a.closest(".ui-page").removeClass("ui-page-header-fixed ui-page-footer-fixed ui-page-header-fullscreen ui-page-footer-fullscreen") } }), a.mobile.document.bind("pagecreate create", function (b) { a(b.target).jqmData("fullscreen") && a(a.mobile.fixedtoolbar.prototype.options.initSelector, b.target).not(":jqmData(fullscreen)").jqmData("fullscreen", !0), a.mobile.fixedtoolbar.prototype.enhanceWithin(b.target) }) }(a), function (a, b) { a.widget("mobile.fixedtoolbar", a.mobile.fixedtoolbar, { _create: function () { this._super(), this._workarounds() }, _workarounds: function () { var a = navigator.userAgent, b = navigator.platform, c = a.match(/AppleWebKit\/([0-9]+)/), d = !!c && c[1], e = null, f = this; if (b.indexOf("iPhone") > -1 || b.indexOf("iPad") > -1 || b.indexOf("iPod") > -1) e = "ios"; else { if (!(a.indexOf("Android") > -1)) return; e = "android" } if (e === "ios") f._bindScrollWorkaround(); else { if (!(e === "android" && d && d < 534)) return; f._bindScrollWorkaround(), f._bindListThumbWorkaround() } }, _viewportOffset: function () { var b = this.element, c = b.is(".ui-header"), d = Math.abs(b.offset().top - a.mobile.window.scrollTop()); return c || (d = Math.round(d - a.mobile.window.height() + b.outerHeight()) - 60), d }, _bindScrollWorkaround: function () { var b = this; this._on(a.mobile.window, { scrollstop: function () { var a = b._viewportOffset(); a > 2 && b._visible && b._triggerRedraw() } }) }, _bindListThumbWorkaround: function () { this.element.closest(".ui-page").addClass("ui-android-2x-fixed") }, _triggerRedraw: function () { var b = parseFloat(a(".ui-page-active").css("padding-bottom")); a(".ui-page-active").css("padding-bottom", b + 1 + "px"), setTimeout(function () { a(".ui-page-active").css("padding-bottom", b + "px") }, 0) }, destroy: function () { this._super(), this.element.closest(".ui-page-active").removeClass("ui-android-2x-fix") } }) }(a), function (a, b) { var d = {}; a.widget("mobile.listview", a.mobile.widget, { options: { theme: null, countTheme: "c", headerTheme: "b", dividerTheme: "b", icon: "arrow-r", splitIcon: "arrow-r", splitTheme: "b", corners: !0, shadow: !0, inset: !1, initSelector: ":jqmData(role='listview')" }, _create: function () { var a = this, b = ""; b += a.options.inset ? " ui-listview-inset" : "", !a.options.inset || (b += a.options.corners ? " ui-corner-all" : "", b += a.options.shadow ? " ui-shadow" : ""), a.element.addClass(function (a, c) { return c + " ui-listview" + b }), a.refresh(!0) }, _findFirstElementByTagName: function (a, b, c, d) { var e = {}; e[c] = e[d] = !0; while (a) { if (e[a.nodeName]) return a; a = a[b] } return null }, _getChildrenByTagName: function (b, c, d) { var e = [], f = {}; f[c] = f[d] = !0, b = b.firstChild; while (b) f[b.nodeName] && e.push(b), b = b.nextSibling; return a(e) }, _addThumbClasses: function (b) { var c, d, e = b.length; for (c = 0; c < e; c++) d = a(this._findFirstElementByTagName(b[c].firstChild, "nextSibling", "img", "IMG")), d.length && (d.addClass("ui-li-thumb"), a(this._findFirstElementByTagName(d[0].parentNode, "parentNode", "li", "LI")).addClass(d.is(".ui-li-icon") ? "ui-li-has-icon" : "ui-li-has-thumb")) }, refresh: function (b) { this.parentPage = this.element.closest(".ui-page"), this._createSubPages(); var d = this.options, e = this.element, f = this, g = e.jqmData("dividertheme") || d.dividerTheme, h = e.jqmData("splittheme"), i = e.jqmData("spliticon"), j = e.jqmData("icon"), k = this._getChildrenByTagName(e[0], "li", "LI"), l = !!a.nodeName(e[0], "ol"), m = !a.support.cssPseudoElement, n = e.attr("start"), o = {}, p, q, r, s, t, u, v, w, x, y, z, A, B, C; l && m && e.find(".ui-li-dec").remove(), l && (n || n === 0 ? m ? v = parseInt(n, 10) : (w = parseInt(n, 10) - 1, e.css("counter-reset", "listnumbering " + w)) : m && (v = 1)), d.theme || (d.theme = a.mobile.getInheritedTheme(this.element, "c")); for (var D = 0, E = k.length; D < E; D++) { p = k.eq(D), q = "ui-li"; if (b || !p.hasClass("ui-li")) { r = p.jqmData("theme") || d.theme, s = this._getChildrenByTagName(p[0], "a", "A"); var F = p.jqmData("role") === "list-divider"; s.length && !F ? (z = p.jqmData("icon"), p.buttonMarkup({ wrapperEls: "div", shadow: !1, corners: !1, iconpos: "right", icon: s.length > 1 || z === !1 ? !1 : z || j || d.icon, theme: r }), z !== !1 && s.length === 1 && p.addClass("ui-li-has-arrow"), s.first().removeClass("ui-link").addClass("ui-link-inherit"), s.length > 1 && (q += " ui-li-has-alt", t = s.last(), u = h || t.jqmData("theme") || d.splitTheme, C = t.jqmData("icon"), t.appendTo(p).attr("title", a.trim(t.getEncodedText())).addClass("ui-li-link-alt").empty().buttonMarkup({ shadow: !1, corners: !1, theme: r, icon: !1, iconpos: "notext" }).find(".ui-btn-inner").append(a(c.createElement("span")).buttonMarkup({ shadow: !0, corners: !0, theme: u, iconpos: "notext", icon: C || z || i || d.splitIcon })))) : F ? (q += " ui-li-divider ui-bar-" + (p.jqmData("theme") || g), p.attr("role", "heading"), l && (n || n === 0 ? m ? v = parseInt(n, 10) : (x = parseInt(n, 10) - 1, p.css("counter-reset", "listnumbering " + x)) : m && (v = 1))) : q += " ui-li-static ui-btn-up-" + r } l && m && q.indexOf("ui-li-divider") < 0 && (y = q.indexOf("ui-li-static") > 0 ? p : p.find(".ui-link-inherit"), y.addClass("ui-li-jsnumbering").prepend("<span class='ui-li-dec'>" + v++ + ". </span>")), o[q] || (o[q] = []), o[q].push(p[0]) } for (q in o) a(o[q]).addClass(q).children(".ui-btn-inner").addClass(q); e.find("h1, h2, h3, h4, h5, h6").addClass("ui-li-heading").end().find("p, dl").addClass("ui-li-desc").end().find(".ui-li-aside").each(function () { var b = a(this); b.prependTo(b.parent()) }).end().find(".ui-li-count").each(function () { a(this).closest("li").addClass("ui-li-has-count") }).addClass("ui-btn-up-" + (e.jqmData("counttheme") || this.options.countTheme) + " ui-btn-corner-all"), this._addThumbClasses(k), this._addThumbClasses(e.find(".ui-link-inherit")), this._addFirstLastClasses(k, this._getVisibles(k, b), b), this._trigger("afterrefresh") }, _idStringEscape: function (a) { return a.replace(/[^a-zA-Z0-9]/g, "-") }, _createSubPages: function () { var b = this.element, c = b.closest(".ui-page"), e = c.jqmData("url"), f = e || c[0][a.expando], g = b.attr("id"), h = this.options, i = "data-" + a.mobile.ns, j = this, k = c.find(":jqmData(role='footer')").jqmData("id"), l; typeof d[f] == "undefined" && (d[f] = -1), g = g || ++d[f], a(b.find("li>ul, li>ol").toArray().reverse()).each(function (c) { var d = this, f = a(this), j = f.attr("id") || g + "-" + c, m = f.parent(), n = a(f.prevAll().toArray().reverse()), p = n.length ? n : a("<span>" + a.trim(m.contents()[0].nodeValue) + "</span>"), q = p.first().getEncodedText(), r = (e || "") + "&" + a.mobile.subPageUrlKey + "=" + j, s = f.jqmData("theme") || h.theme, t = f.jqmData("counttheme") || b.jqmData("counttheme") || h.countTheme, u, v; l = !0, u = f.detach().wrap("<div " + i + "role='page' " + i + "url='" + r + "' " + i + "theme='" + s + "' " + i + "count-theme='" + t + "'><div " + i + "role='content'></div></div>").parent().before("<div " + i + "role='header' " + i + "theme='" + h.headerTheme + "'><div class='ui-title'>" + q + "</div></div>").after(k ? a("<div " + i + "role='footer' " + i + "id='" + k + "'>") : "").parent().appendTo(a.mobile.pageContainer), u.page(), v = m.find("a:first"), v.length || (v = a("<a/>").html(p || q).prependTo(m.empty())), v.attr("href", "#" + r) }).listview(); if (l && c.is(":jqmData(external-page='true')") && c.data("mobile-page").options.domCache === !1) { var m = function (b, d) { var f = d.nextPage, g, h = new a.Event("pageremove"); d.nextPage && (g = f.jqmData("url"), g.indexOf(e + "&" + a.mobile.subPageUrlKey) !== 0 && (j.childPages().remove(), c.trigger(h), h.isDefaultPrevented() || c.removeWithDependents())) }; c.unbind("pagehide.remove").bind("pagehide.remove", m) } }, childPages: function () { var b = this.parentPage.jqmData("url"); return a(":jqmData(url^='" + b + "&" + a.mobile.subPageUrlKey + "')") } }), a.widget("mobile.listview", a.mobile.listview, a.mobile.behaviors.addFirstLastClasses), a.mobile.document.bind("pagecreate create", function (b) { a.mobile.listview.prototype.enhanceWithin(b.target) }) }(a), function (a, b) { a.mobile.listview.prototype.options.autodividers = !1, a.mobile.listview.prototype.options.autodividersSelector = function (b) { var c = a.trim(b.text()) || null; return c ? (c = c.slice(0, 1).toUpperCase(), c) : null }, a.mobile.document.delegate("ul,ol", "listviewcreate", function () { var b = a(this), d = b.data("mobile-listview"); if (!d || !d.options.autodividers) return; var e = function () { b.find("li:jqmData(role='list-divider')").remove(); var e = b.find("li"), f = null, g, h; for (var i = 0; i < e.length; i++) { g = e[i], h = d.options.autodividersSelector(a(g)); if (h && f !== h) { var j = c.createElement("li"); j.appendChild(c.createTextNode(h)), j.setAttribute("data-" + a.mobile.ns + "role", "list-divider"), g.parentNode.insertBefore(j, g) } f = h } }, f = function () { b.unbind("listviewafterrefresh", f), e(), d.refresh(), b.bind("listviewafterrefresh", f) }; f() }) }(a), function (a, b) { a.mobile.listview.prototype.options.filter = !1, a.mobile.listview.prototype.options.filterPlaceholder = "Filter items...", a.mobile.listview.prototype.options.filterTheme = "c", a.mobile.listview.prototype.options.filterReveal = !1; var c = function (a, b, c) { return a.toString().toLowerCase().indexOf(b) === -1 }; a.mobile.listview.prototype.options.filterCallback = c, a.mobile.document.delegate("ul, ol", "listviewcreate", function () { var b = a(this), d = b.data("mobile-listview"); if (!d.options.filter) return; d.options.filterReveal && b.children().addClass("ui-screen-hidden"); var e = a("<form>", { "class": "ui-listview-filter ui-bar-" + d.options.filterTheme, role: "search" }).submit(function (a) { a.preventDefault(), g.blur() }), f = function (e) { var f = a(this), g = this.value.toLowerCase(), h = null, i = b.children(), j = f.jqmData("lastval") + "", k = !1, l = "", m, n = d.options.filterCallback !== c; if (j && j === g) return; d._trigger("beforefilter", "beforefilter", { input: this }), f.jqmData("lastval", g), n || g.length < j.length || g.indexOf(j) !== 0 ? h = b.children() : (h = b.children(":not(.ui-screen-hidden)"), !h.length && d.options.filterReveal && (h = b.children(".ui-screen-hidden"))); if (g) { for (var o = h.length - 1; o >= 0; o--) m = a(h[o]), l = m.jqmData("filtertext") || m.text(), m.is("li:jqmData(role=list-divider)") ? (m.toggleClass("ui-filter-hidequeue", !k), k = !1) : d.options.filterCallback(l, g, m) ? m.toggleClass("ui-filter-hidequeue", !0) : k = !0; h.filter(":not(.ui-filter-hidequeue)").toggleClass("ui-screen-hidden", !1), h.filter(".ui-filter-hidequeue").toggleClass("ui-screen-hidden", !0).toggleClass("ui-filter-hidequeue", !1) } else h.toggleClass("ui-screen-hidden", !!d.options.filterReveal); d._addFirstLastClasses(i, d._getVisibles(i, !1), !1) }, g = a("<input>", { placeholder: d.options.filterPlaceholder }).attr("data-" + a.mobile.ns + "type", "search").jqmData("lastval", "").bind("keyup change input", f).appendTo(e).textinput(); d.options.inset && e.addClass("ui-listview-filter-inset"), e.bind("submit", function () { return !1 }).insertBefore(b) }) }(a), function (a, d) { a.widget("mobile.panel", a.mobile.widget, { options: { classes: { panel: "ui-panel", panelOpen: "ui-panel-open", panelClosed: "ui-panel-closed", panelFixed: "ui-panel-fixed", panelInner: "ui-panel-inner", modal: "ui-panel-dismiss", modalOpen: "ui-panel-dismiss-open", pagePanel: "ui-page-panel", pagePanelOpen: "ui-page-panel-open", contentWrap: "ui-panel-content-wrap", contentWrapOpen: "ui-panel-content-wrap-open", contentWrapClosed: "ui-panel-content-wrap-closed", contentFixedToolbar: "ui-panel-content-fixed-toolbar", contentFixedToolbarOpen: "ui-panel-content-fixed-toolbar-open", contentFixedToolbarClosed: "ui-panel-content-fixed-toolbar-closed", animate: "ui-panel-animate" }, animate: !0, theme: "c", position: "left", dismissible: !0, display: "reveal", initSelector: ":jqmData(role='panel')", swipeClose: !0, positionFixed: !1 }, _panelID: null, _closeLink: null, _page: null, _modal: null, _pannelInner: null, _wrapper: null, _fixedToolbar: null, _create: function () { var b = this, c = b.element, d = c.closest(":jqmData(role='page')"), e = function () { var b = a.data(d[0], "mobilePage").options.theme, c = "ui-body-" + b; return c }, f = function () { var a = c.find("." + b.options.classes.panelInner); return a.length === 0 && (a = c.children().wrapAll('<div class="' + b.options.classes.panelInner + '" />').parent()), a }, g = function () { var c = d.find("." + b.options.classes.contentWrap); return c.length === 0 && (c = d.children(".ui-header:not(:jqmData(position='fixed')), .ui-content:not(:jqmData(role='popup')), .ui-footer:not(:jqmData(position='fixed'))").wrapAll('<div class="' + b.options.classes.contentWrap + " " + e() + '" />').parent(), a.support.cssTransform3d && !!b.options.animate && c.addClass(b.options.classes.animate)), c }, h = function () { var c = d.find("." + b.options.classes.contentFixedToolbar); return c.length === 0 && (c = d.find(".ui-header:jqmData(position='fixed'), .ui-footer:jqmData(position='fixed')").addClass(b.options.classes.contentFixedToolbar), a.support.cssTransform3d && !!b.options.animate && c.addClass(b.options.classes.animate)), c }; a.extend(this, { _panelID: c.attr("id"), _closeLink: c.find(":jqmData(rel='close')"), _page: c.closest(":jqmData(role='page')"), _pageTheme: e(), _pannelInner: f(), _wrapper: g(), _fixedToolbar: h() }), b._addPanelClasses(), b._wrapper.addClass(this.options.classes.contentWrapClosed), b._fixedToolbar.addClass(this.options.classes.contentFixedToolbarClosed), b._page.addClass(b.options.classes.pagePanel), a.support.cssTransform3d && !!b.options.animate && this.element.addClass(b.options.classes.animate), b._bindUpdateLayout(), b._bindCloseEvents(), b._bindLinkListeners(), b._bindPageEvents(), !b.options.dismissible || b._createModal(), b._bindSwipeEvents() }, _createModal: function (b) { var c = this; c._modal = a("<div class='" + c.options.classes.modal + "' data-panelid='" + c._panelID + "'></div>").on("mousedown", function () { c.close() }).appendTo(this._page) }, _getPosDisplayClasses: function (a) { return a + "-position-" + this.options.position + " " + a + "-display-" + this.options.display }, _getPanelClasses: function () { var a = this.options.classes.panel + " " + this._getPosDisplayClasses(this.options.classes.panel) + " " + this.options.classes.panelClosed; return this.options.theme && (a += " ui-body-" + this.options.theme), !this.options.positionFixed || (a += " " + this.options.classes.panelFixed), a }, _addPanelClasses: function () { this.element.addClass(this._getPanelClasses()) }, _bindCloseEvents: function () { var a = this; a._closeLink.on("click.panel", function (b) { return b.preventDefault(), a.close(), !1 }), a.element.on("click.panel", "a:jqmData(ajax='false')", function (b) { a.close() }) }, _positionPanel: function () { var b = this, c = b._pannelInner.outerHeight(), d = c > a.mobile.getScreenHeight(); d || !b.options.positionFixed ? (d && (b._unfixPanel(), a.mobile.resetActivePageHeight(c)), b._scrollIntoView(c)) : b._fixPanel() }, _scrollIntoView: function (c) { c < a(b).scrollTop() && b.scrollTo(0, 0) }, _bindFixListener: function () { this._on(a(b), { throttledresize: "_positionPanel" }) }, _unbindFixListener: function () { this._off(a(b), "throttledresize") }, _unfixPanel: function () { !!this.options.positionFixed && a.support.fixedPosition && this.element.removeClass(this.options.classes.panelFixed) }, _fixPanel: function () { !!this.options.positionFixed && a.support.fixedPosition && this.element.addClass(this.options.classes.panelFixed) }, _bindUpdateLayout: function () { var a = this; a.element.on("updatelayout", function (b) { a._open && a._positionPanel() }) }, _bindLinkListeners: function () { var b = this; b._page.on("click.panel", "a", function (c) { if (this.href.split("#")[1] === b._panelID && b._panelID !== d) { c.preventDefault(); var e = a(this); return e.hasClass("ui-link") || (e.addClass(a.mobile.activeBtnClass), b.element.one("panelopen panelclose", function () { e.removeClass(a.mobile.activeBtnClass) })), b.toggle(), !1 } }) }, _bindSwipeEvents: function () { var a = this, b = a._modal ? a.element.add(a._modal) : a.element; !a.options.swipeClose || (a.options.position === "left" ? b.on("swipeleft.panel", function (b) { a.close() }) : b.on("swiperight.panel", function (b) { a.close() })) }, _bindPageEvents: function () { var a = this; a._page.on("panelbeforeopen", function (b) { a._open && b.target !== a.element[0] && a.close() }).on("pagehide", function (b) { a._open && a.close(!0) }).on("keyup.panel", function (b) { b.keyCode === 27 && a._open && a.close() }) }, _open: !1, _contentWrapOpenClasses: null, _fixedToolbarOpenClasses: null, _modalOpenClasses: null, open: function (b) { if (!this._open) { var c = this, d = c.options, e = function () { c._page.off("panelclose"), c._page.jqmData("panel", "open"), !b && a.support.cssTransform3d && !!d.animate ? c.element.add(c._wrapper).on(c._transitionEndEvents, f) : setTimeout(f, 0), c.options.theme && c.options.display !== "overlay" && c._page.removeClass(c._pageTheme).addClass("ui-body-" + c.options.theme), c.element.removeClass(d.classes.panelClosed).addClass(d.classes.panelOpen), c._contentWrapOpenClasses = c._getPosDisplayClasses(d.classes.contentWrap), c._wrapper.removeClass(d.classes.contentWrapClosed).addClass(c._contentWrapOpenClasses + " " + d.classes.contentWrapOpen), c._fixedToolbarOpenClasses = c._getPosDisplayClasses(d.classes.contentFixedToolbar), c._fixedToolbar.removeClass(d.classes.contentFixedToolbarClosed).addClass(c._fixedToolbarOpenClasses + " " + d.classes.contentFixedToolbarOpen), c._modalOpenClasses = c._getPosDisplayClasses(d.classes.modal) + " " + d.classes.modalOpen, c._modal && c._modal.addClass(c._modalOpenClasses) }, f = function () { c.element.add(c._wrapper).off(c._transitionEndEvents, f), c._page.addClass(d.classes.pagePanelOpen), c._positionPanel(), c._bindFixListener(), c._trigger("open") }; this.element.closest(".ui-page-active").length < 0 && (b = !0), c._trigger("beforeopen"), c._page.jqmData("panel") === "open" ? c._page.on("panelclose", function () { e() }) : e(), c._open = !0 } }, close: function (b) { if (this._open) { var c = this.options, d = this, e = function () { !b && a.support.cssTransform3d && !!c.animate ? d.element.add(d._wrapper).on(d._transitionEndEvents, f) : setTimeout(f, 0), d._page.removeClass(c.classes.pagePanelOpen), d.element.removeClass(c.classes.panelOpen), d._wrapper.removeClass(c.classes.contentWrapOpen), d._fixedToolbar.removeClass(c.classes.contentFixedToolbarOpen), d._modal && d._modal.removeClass(d._modalOpenClasses) }, f = function () { d.options.theme && d.options.display !== "overlay" && d._page.removeClass("ui-body-" + d.options.theme).addClass(d._pageTheme), d.element.add(d._wrapper).off(d._transitionEndEvents, f), d.element.addClass(c.classes.panelClosed), d._wrapper.removeClass(d._contentWrapOpenClasses).addClass(c.classes.contentWrapClosed), d._fixedToolbar.removeClass(d._fixedToolbarOpenClasses).addClass(c.classes.contentFixedToolbarClosed), d._fixPanel(), d._unbindFixListener(), a.mobile.resetActivePageHeight(), d._page.jqmRemoveData("panel"), d._trigger("close") }; this.element.closest(".ui-page-active").length < 0 && (b = !0), d._trigger("beforeclose"), e(), d._open = !1 } }, toggle: function (a) { this[this._open ? "close" : "open"]() }, _transitionEndEvents: "webkitTransitionEnd oTransitionEnd otransitionend transitionend msTransitionEnd", _destroy: function () { var b = this.options.classes, c = this.options.theme, d = this.element.siblings("." + b.panel).length; d ? this._open && (this._wrapper.removeClass(b.contentWrapOpen), this._fixedToolbar.removeClass(b.contentFixedToolbarOpen), this._page.jqmRemoveData("panel"), this._page.removeClass(b.pagePanelOpen), c && this._page.removeClass("ui-body-" + c).addClass(this._pageTheme)) : (this._wrapper.children().unwrap(), this._page.find("a").unbind("panelopen panelclose"), this._page.removeClass(b.pagePanel), this._open && (this._page.jqmRemoveData("panel"), this._page.removeClass(b.pagePanelOpen), c && this._page.removeClass("ui-body-" + c).addClass(this._pageTheme), a.mobile.resetActivePageHeight())), this._pannelInner.children().unwrap(), this.element.removeClass([this._getPanelClasses(), b.panelAnimate].join(" ")).off("swipeleft.panel swiperight.panel").off("panelbeforeopen").off("panelhide").off("keyup.panel").off("updatelayout"), this._closeLink.off("click.panel"), this._modal && this._modal.remove(), this.element.off(this._transitionEndEvents).removeClass([b.panelUnfixed, b.panelClosed, b.panelOpen].join(" ")) } }), a(c).bind("pagecreate create", function (b) { a.mobile.panel.prototype.enhanceWithin(b.target) }) }(a), function (a, d) { function e(a, b, c, d) { var e = d; return a < b ? e = c + (a - b) / 2 : e = Math.min(Math.max(c, d - b / 2), c + a - b), e } function f() { var c = a.mobile.window; return { x: c.scrollLeft(), y: c.scrollTop(), cx: b.innerWidth || c.width(), cy: b.innerHeight || c.height() } } a.widget("mobile.popup", a.mobile.widget, { options: { theme: null, overlayTheme: null, shadow: !0, corners: !0, transition: "none", positionTo: "origin", tolerance: null, initSelector: ":jqmData(role='popup')", closeLinkSelector: "a:jqmData(rel='back')", closeLinkEvents: "click.popup", navigateEvents: "navigate.popup", closeEvents: "navigate.popup pagebeforechange.popup", dismissible: !0, history: !a.mobile.browser.oldIE }, _eatEventAndClose: function (a) { return a.preventDefault(), a.stopImmediatePropagation(), this.options.dismissible && this.close(), !1 }, _resizeScreen: function () { var a = this._ui.container.outerHeight(!0); this._ui.screen.removeAttr("style"), a > this._ui.screen.height() && this._ui.screen.height(a) }, _handleWindowKeyUp: function (b) { if (this._isOpen && b.keyCode === a.mobile.keyCode.ESCAPE) return this._eatEventAndClose(b) }, _expectResizeEvent: function () { var b = f(); if (this._resizeData) { if (b.x === this._resizeData.winCoords.x && b.y === this._resizeData.winCoords.y && b.cx === this._resizeData.winCoords.cx && b.cy === this._resizeData.winCoords.cy) return !1; clearTimeout(this._resizeData.timeoutId) } return this._resizeData = { timeoutId: setTimeout(a.proxy(this, "_resizeTimeout"), 200), winCoords: b }, !0 }, _resizeTimeout: function () { this._isOpen ? this._expectResizeEvent() || (this._ui.container.hasClass("ui-popup-hidden") && (this._ui.container.removeClass("ui-popup-hidden"), this.reposition({ positionTo: "window" }), this._ignoreResizeEvents()), this._resizeScreen(), this._resizeData = null, this._orientationchangeInProgress = !1) : (this._resizeData = null, this._orientationchangeInProgress = !1) }, _ignoreResizeEvents: function () { var a = this; this._ignoreResizeTo && clearTimeout(this._ignoreResizeTo), this._ignoreResizeTo = setTimeout(function () { a._ignoreResizeTo = 0 }, 1e3) }, _handleWindowResize: function (a) { this._isOpen && this._ignoreResizeTo === 0 && (this._expectResizeEvent() || this._orientationchangeInProgress) && !this._ui.container.hasClass("ui-popup-hidden") && this._ui.container.addClass("ui-popup-hidden").removeAttr("style") }, _handleWindowOrientationchange: function (a) { !this._orientationchangeInProgress && this._isOpen && this._ignoreResizeTo === 0 && (this._expectResizeEvent(), this._orientationchangeInProgress = !0) }, _handleDocumentFocusIn: function (b) { var d = b.target, e, f = this._ui; if (!this._isOpen) return; if (d !== f.container[0]) { e = a(b.target); if (0 === e.parents().filter(f.container[0]).length) return a(c.activeElement).one("focus", function (a) { e.blur() }), f.focusElement.focus(), b.preventDefault(), b.stopImmediatePropagation(), !1; f.focusElement[0] === f.container[0] && (f.focusElement = e) } else f.focusElement && f.focusElement[0] !== f.container[0] && (f.container.blur(), f.focusElement.focus()); this._ignoreResizeEvents() }, _create: function () { var b = { screen: a("<div class='ui-screen-hidden ui-popup-screen'></div>"), placeholder: a("<div style='display: none;'><!-- placeholder --></div>"), container: a("<div class='ui-popup-container ui-popup-hidden'></div>") }, c = this.element.closest(".ui-page"), e = this.element.attr("id"), f = this; this.options.history = this.options.history && a.mobile.ajaxEnabled && a.mobile.hashListeningEnabled, c.length === 0 && (c = a("body")), this.options.container = this.options.container || a.mobile.pageContainer, c.append(b.screen), b.container.insertAfter(b.screen), b.placeholder.insertAfter(this.element), e && (b.screen.attr("id", e + "-screen"), b.container.attr("id", e + "-popup"), b.placeholder.html("<!-- placeholder for " + e + " -->")), b.container.append(this.element), b.focusElement = b.container, this.element.addClass("ui-popup"), a.extend(this, { _scrollTop: 0, _page: c, _ui: b, _fallbackTransition: "", _currentTransition: !1, _prereqs: null, _isOpen: !1, _tolerance: null, _resizeData: null, _ignoreResizeTo: 0, _orientationchangeInProgress: !1 }), a.each(this.options, function (a, b) { f.options[a] = d, f._setOption(a, b, !0) }), b.screen.bind("vclick", a.proxy(this, "_eatEventAndClose")), this._on(a.mobile.window, { orientationchange: a.proxy(this, "_handleWindowOrientationchange"), resize: a.proxy(this, "_handleWindowResize"), keyup: a.proxy(this, "_handleWindowKeyUp") }), this._on(a.mobile.document, { focusin: a.proxy(this, "_handleDocumentFocusIn") }) }, _applyTheme: function (a, b, c) { var d = (a.attr("class") || "").split(" "), e = !0, f = null, g, h = String(b); while (d.length > 0) { f = d.pop(), g = (new RegExp("^ui-" + c + "-([a-z])$")).exec(f); if (g && g.length > 1) { f = g[1]; break } f = null } b !== f && (a.removeClass("ui-" + c + "-" + f), b !== null && b !== "none" && a.addClass("ui-" + c + "-" + h)) }, _setTheme: function (a) { this._applyTheme(this.element, a, "body") }, _setOverlayTheme: function (a) { this._applyTheme(this._ui.screen, a, "overlay"), this._isOpen && this._ui.screen.addClass("in") }, _setShadow: function (a) { this.element.toggleClass("ui-overlay-shadow", a) }, _setCorners: function (a) { this.element.toggleClass("ui-corner-all", a) }, _applyTransition: function (b) { this._ui.container.removeClass(this._fallbackTransition), b && b !== "none" && (this._fallbackTransition = a.mobile._maybeDegradeTransition(b), this._fallbackTransition === "none" && (this._fallbackTransition = ""), this._ui.container.addClass(this._fallbackTransition)) }, _setTransition: function (a) { this._currentTransition || this._applyTransition(a) }, _setTolerance: function (b) { var c = { t: 30, r: 15, b: 30, l: 15 }; if (b !== d) { var e = String(b).split(","); a.each(e, function (a, b) { e[a] = parseInt(b, 10) }); switch (e.length) { case 1: isNaN(e[0]) || (c.t = c.r = c.b = c.l = e[0]); break; case 2: isNaN(e[0]) || (c.t = c.b = e[0]), isNaN(e[1]) || (c.l = c.r = e[1]); break; case 4: isNaN(e[0]) || (c.t = e[0]), isNaN(e[1]) || (c.r = e[1]), isNaN(e[2]) || (c.b = e[2]), isNaN(e[3]) || (c.l = e[3]); break; default: } } this._tolerance = c }, _setOption: function (b, c) { var e, f = "_set" + b.charAt(0).toUpperCase() + b.slice(1); this[f] !== d && this[f](c), e = ["initSelector", "closeLinkSelector", "closeLinkEvents", "navigateEvents", "closeEvents", "history", "container"], a.mobile.widget.prototype._setOption.apply(this, arguments), a.inArray(b, e) === -1 && this.element.attr("data-" + (a.mobile.ns || "") + b.replace(/([A-Z])/, "-$1").toLowerCase(), c) }, _placementCoords: function (a) { var b = f(), d = { x: this._tolerance.l, y: b.y + this._tolerance.t, cx: b.cx - this._tolerance.l - this._tolerance.r, cy: b.cy - this._tolerance.t - this._tolerance.b }, g, h; this._ui.container.css("max-width", d.cx), g = { cx: this._ui.container.outerWidth(!0), cy: this._ui.container.outerHeight(!0) }, h = { x: e(d.cx, g.cx, d.x, a.x), y: e(d.cy, g.cy, d.y, a.y) }, h.y = Math.max(0, h.y); var i = c.documentElement, j = c.body, k = Math.max(i.clientHeight, j.scrollHeight, j.offsetHeight, i.scrollHeight, i.offsetHeight); return h.y -= Math.min(h.y, Math.max(0, h.y + g.cy - k)), { left: h.x, top: h.y } }, _createPrereqs: function (b, c, d) { var e = this, f; f = { screen: a.Deferred(), container: a.Deferred() }, f.screen.then(function () { f === e._prereqs && b() }), f.container.then(function () { f === e._prereqs && c() }), a.when(f.screen, f.container).done(function () { f === e._prereqs && (e._prereqs = null, d()) }), e._prereqs = f }, _animate: function (b) { this._ui.screen.removeClass(b.classToRemove).addClass(b.screenClassToAdd), b.prereqs.screen.resolve(); if (b.transition && b.transition !== "none") { b.applyTransition && this._applyTransition(b.transition); if (this._fallbackTransition) { this._ui.container.animationComplete(a.proxy(b.prereqs.container, "resolve")).addClass(b.containerClassToAdd).removeClass(b.classToRemove); return } } this._ui.container.removeClass(b.classToRemove), b.prereqs.container.resolve() }, _desiredCoords: function (b) { var c = null, d, e = f(), g = b.x, h = b.y, i = b.positionTo; if (i && i !== "origin") if (i === "window") g = e.cx / 2 + e.x, h = e.cy / 2 + e.y; else { try { c = a(i) } catch (j) { c = null } c && (c.filter(":visible"), c.length === 0 && (c = null)) } c && (d = c.offset(), g = d.left + c.outerWidth() / 2, h = d.top + c.outerHeight() / 2); if (a.type(g) !== "number" || isNaN(g)) g = e.cx / 2 + e.x; if (a.type(h) !== "number" || isNaN(h)) h = e.cy / 2 + e.y; return { x: g, y: h } }, _reposition: function (a) { a = { x: a.x, y: a.y, positionTo: a.positionTo }, this._trigger("beforeposition", a), this._ui.container.offset(this._placementCoords(this._desiredCoords(a))) }, reposition: function (a) { this._isOpen && this._reposition(a) }, _openPrereqsComplete: function () { this._ui.container.addClass("ui-popup-active"), this._isOpen = !0, this._resizeScreen(), this._ui.container.attr("tabindex", "0").focus(), this._ignoreResizeEvents(), this._trigger("afteropen") }, _open: function (c) { var d = a.extend({}, this.options, c), e = function () { var a = b, c = navigator.userAgent, d = c.match(/AppleWebKit\/([0-9\.]+)/), e = !!d && d[1], f = c.match(/Android (\d+(?:\.\d+))/), g = !!f && f[1], h = c.indexOf("Chrome") > -1; return f !== null && g === "4.0" && e && e > 534.13 && !h ? !0 : !1 }(); this._createPrereqs(a.noop, a.noop, a.proxy(this, "_openPrereqsComplete")), this._currentTransition = d.transition, this._applyTransition(d.transition), this.options.theme || this._setTheme(this._page.jqmData("theme") || a.mobile.getInheritedTheme(this._page, "c")), this._ui.screen.removeClass("ui-screen-hidden"), this._ui.container.removeClass("ui-popup-hidden"), this._reposition(d), this.options.overlayTheme && e && this.element.closest(".ui-page").addClass("ui-popup-open"), this._animate({ additionalCondition: !0, transition: d.transition, classToRemove: "", screenClassToAdd: "in", containerClassToAdd: "in", applyTransition: !1, prereqs: this._prereqs }) }, _closePrereqScreen: function () { this._ui.screen.removeClass("out").addClass("ui-screen-hidden") }, _closePrereqContainer: function () { this._ui.container.removeClass("reverse out").addClass("ui-popup-hidden").removeAttr("style") }, _closePrereqsDone: function () { var b = this.options; this._ui.container.removeAttr("tabindex"), a.mobile.popup.active = d, this._trigger("afterclose") }, _close: function (b) { this._ui.container.removeClass("ui-popup-active"), this._page.removeClass("ui-popup-open"), this._isOpen = !1, this._createPrereqs(a.proxy(this, "_closePrereqScreen"), a.proxy(this, "_closePrereqContainer"), a.proxy(this, "_closePrereqsDone")), this._animate({ additionalCondition: this._ui.screen.hasClass("in"), transition: b ? "none" : this._currentTransition, classToRemove: "in", screenClassToAdd: "out", containerClassToAdd: "reverse out", applyTransition: !0, prereqs: this._prereqs }) }, _unenhance: function () { this._setTheme("none"), this.element.detach().insertAfter(this._ui.placeholder).removeClass("ui-popup ui-overlay-shadow ui-corner-all"), this._ui.screen.remove(), this._ui.container.remove(), this._ui.placeholder.remove() }, _destroy: function () { a.mobile.popup.active === this ? (this.element.one("popupafterclose", a.proxy(this, "_unenhance")), this.close()) : this._unenhance() }, _closePopup: function (c, d) { var e, f, g = this.options, h = !1; b.scrollTo(0, this._scrollTop), c && c.type === "pagebeforechange" && d && (typeof d.toPage == "string" ? e = d.toPage : e = d.toPage.jqmData("url"), e = a.mobile.path.parseUrl(e), f = e.pathname + e.search + e.hash, this._myUrl !== a.mobile.path.makeUrlAbsolute(f) ? h = !0 : c.preventDefault()), g.container.unbind(g.closeEvents), this.element.undelegate(g.closeLinkSelector, g.closeLinkEvents), this._close(h) }, _bindContainerClose: function () { this.options.container.one(this.options.closeEvents, a.proxy(this, "_closePopup")) }, open: function (c) { var d = this, e = this.options, f, g, h, i, j, k; if (a.mobile.popup.active) return; a.mobile.popup.active = this, this._scrollTop = a.mobile.window.scrollTop(); if (!e.history) { d._open(c), d._bindContainerClose(), d.element.delegate(e.closeLinkSelector, e.closeLinkEvents, function (a) { d.close(), a.preventDefault() }); return } k = a.mobile.urlHistory, g = a.mobile.dialogHashKey, h = a.mobile.activePage, i = h.is(".ui-dialog"), this._myUrl = f = k.getActive().url, j = f.indexOf(g) > -1 && !i && k.activeIndex > 0; if (j) { d._open(c), d._bindContainerClose(); return } f.indexOf(g) === -1 && !i ? f += f.indexOf("#") > -1 ? g : "#" + g : f = a.mobile.path.parseLocation().hash + g, k.activeIndex === 0 && f === k.initialDst && (f += g), a(b).one("beforenavigate", function (a) { a.preventDefault(), d._open(c), d._bindContainerClose() }), this.urlAltered = !0, a.mobile.navigate(f, { role: "dialog" }) }, close: function () { if (a.mobile.popup.active !== this) return; this._scrollTop = a.mobile.window.scrollTop(), this.options.history && this.urlAltered ? (a.mobile.back(), this.urlAltered = !1) : this._closePopup() } }), a.mobile.popup.handleLink = function (b) { var c = b.closest(":jqmData(role='page')"), d = c.length === 0 ? a("body") : c, e = a(a.mobile.path.parseUrl(b.attr("href")).hash, d[0]), f; e.data("mobile-popup") && (f = b.offset(), e.popup("open", { x: f.left + b.outerWidth() / 2, y: f.top + b.outerHeight() / 2, transition: b.jqmData("transition"), positionTo: b.jqmData("position-to") })), setTimeout(function () { var c = b.parent().parent(); c.hasClass("ui-li") && (b = c.parent()), b.removeClass(a.mobile.activeBtnClass) }, 300) }, a.mobile.document.bind("pagebeforechange", function (b, c) { c.options.role === "popup" && (a.mobile.popup.handleLink(c.options.link), b.preventDefault()) }), a.mobile.document.bind("pagecreate create", function (b) { a.mobile.popup.prototype.enhanceWithin(b.target, !0) }) }(a), function (a, b) { var d = function (d) { var e = d.select, f = d._destroy, g = d.selectID, h = g ? g : (a.mobile.ns || "") + "uuid-" + d.uuid, i = h + "-listbox", j = h + "-dialog", k = d.label, l = d.select.closest(".ui-page"), m = d._selectOptions(), n = d.isMultiple = d.select[0].multiple, o = g + "-button", p = g + "-menu", q = a("<div data-" + a.mobile.ns + "role='dialog' id='" + j + "' data-" + a.mobile.ns + "theme='" + d.options.theme + "' data-" + a.mobile.ns + "overlay-theme='" + d.options.overlayTheme + "'>" + "<div data-" + a.mobile.ns + "role='header'>" + "<div class='ui-title'>" + k.getEncodedText() + "</div>" + "</div>" + "<div data-" + a.mobile.ns + "role='content'></div>" + "</div>"), r = a("<div id='" + i + "' class='ui-selectmenu'>").insertAfter(d.select).popup({ theme: d.options.overlayTheme }), s = a("<ul>", { "class": "ui-selectmenu-list", id: p, role: "listbox", "aria-labelledby": o }).attr("data-" + a.mobile.ns + "theme", d.options.theme).attr("data-" + a.mobile.ns + "divider-theme", d.options.dividerTheme).appendTo(r), t = a("<div>", { "class": "ui-header ui-bar-" + d.options.theme }).prependTo(r), u = a("<h1>", { "class": "ui-title" }).appendTo(t), v, w, x; d.isMultiple && (x = a("<a>", { text: d.options.closeText, href: "#", "class": "ui-btn-left" }).attr("data-" + a.mobile.ns + "iconpos", "notext").attr("data-" + a.mobile.ns + "icon", "delete").appendTo(t).buttonMarkup()), a.extend(d, { select: d.select, selectID: g, buttonId: o, menuId: p, popupID: i, dialogID: j, thisPage: l, menuPage: q, label: k, selectOptions: m, isMultiple: n, theme: d.options.theme, listbox: r, list: s, header: t, headerTitle: u, headerClose: x, menuPageContent: v, menuPageClose: w, placeholder: "", build: function () { var c = this; c.refresh(), c._origTabIndex === b && (c._origTabIndex = c.select[0].getAttribute("tabindex") === null ? !1 : c.select.attr("tabindex")), c.select.attr("tabindex", "-1").focus(function () { a(this).blur(), c.button.focus() }), c.button.bind("vclick keydown", function (b) { if (c.options.disabled || c.isOpen) return; if (b.type === "vclick" || b.keyCode && (b.keyCode === a.mobile.keyCode.ENTER || b.keyCode === a.mobile.keyCode.SPACE)) c._decideFormat(), c.menuType === "overlay" ? c.button.attr("href", "#" + c.popupID).attr("data-" + (a.mobile.ns || "") + "rel", "popup") : c.button.attr("href", "#" + c.dialogID).attr("data-" + (a.mobile.ns || "") + "rel", "dialog"), c.isOpen = !0 }), c.list.attr("role", "listbox").bind("focusin", function (b) { a(b.target).attr("tabindex", "0").trigger("vmouseover") }).bind("focusout", function (b) { a(b.target).attr("tabindex", "-1").trigger("vmouseout") }).delegate("li:not(.ui-disabled, .ui-li-divider)", "click", function (b) { var e = c.select[0].selectedIndex, f = c.list.find("li:not(.ui-li-divider)").index(this), g = c._selectOptions().eq(f)[0]; g.selected = c.isMultiple ? !g.selected : !0, c.isMultiple && a(this).find(".ui-icon").toggleClass("ui-icon-checkbox-on", g.selected).toggleClass("ui-icon-checkbox-off", !g.selected), (c.isMultiple || e !== f) && c.select.trigger("change"), c.isMultiple ? c.list.find("li:not(.ui-li-divider)").eq(f).addClass("ui-btn-down-" + d.options.theme).find("a").first().focus() : c.close(), b.preventDefault() }).keydown(function (b) { var c = a(b.target), e = c.closest("li"), f, g; switch (b.keyCode) { case 38: return f = e.prev().not(".ui-selectmenu-placeholder"), f.is(".ui-li-divider") && (f = f.prev()), f.length && (c.blur().attr("tabindex", "-1"), f.addClass("ui-btn-down-" + d.options.theme).find("a").first().focus()), !1; case 40: return g = e.next(), g.is(".ui-li-divider") && (g = g.next()), g.length && (c.blur().attr("tabindex", "-1"), g.addClass("ui-btn-down-" + d.options.theme).find("a").first().focus()), !1; case 13: case 32: return c.trigger("click"), !1 } }), c.menuPage.bind("pagehide", function () { a.mobile._bindPageRemove.call(c.thisPage) }), c.listbox.bind("popupafterclose", function (a) { c.close() }), c.isMultiple && c.headerClose.click(function () { if (c.menuType === "overlay") return c.close(), !1 }), c.thisPage.addDependents(this.menuPage) }, _isRebuildRequired: function () { var a = this.list.find("li"), b = this._selectOptions(); return b.text() !== a.text() }, selected: function () { return this._selectOptions().filter(":selected:not( :jqmData(placeholder='true') )") }, refresh: function (b, c) { var d = this, e = this.element, f = this.isMultiple, g; (b || this._isRebuildRequired()) && d._buildList(), g = this.selectedIndices(), d.setButtonText(), d.setButtonCount(), d.list.find("li:not(.ui-li-divider)").removeClass(a.mobile.activeBtnClass).attr("aria-selected", !1).each(function (b) { if (a.inArray(b, g) > -1) { var c = a(this); c.attr("aria-selected", !0), d.isMultiple ? c.find(".ui-icon").removeClass("ui-icon-checkbox-off").addClass("ui-icon-checkbox-on") : c.is(".ui-selectmenu-placeholder") ? c.next().addClass(a.mobile.activeBtnClass) : c.addClass(a.mobile.activeBtnClass) } }) }, close: function () { if (this.options.disabled || !this.isOpen) return; var a = this; a.menuType === "page" ? (a.menuPage.dialog("close"), a.list.appendTo(a.listbox)) : a.listbox.popup("close"), a._focusButton(), a.isOpen = !1 }, open: function () { this.button.click() }, _decideFormat: function () { function m() { var c = b.list.find("." + a.mobile.activeBtnClass + " a"); c.length === 0 && (c = b.list.find("li.ui-btn:not( :jqmData(placeholder='true') ) a")), c.first().focus().closest("li").addClass("ui-btn-down-" + d.options.theme) } var b = this, c = a.mobile.window, e = b.list.parent(), f = e.outerHeight(), g = e.outerWidth(), h = a("." + a.mobile.activePageClass), i = c.scrollTop(), j = b.button.offset().top, k = c.height(), l = c.width(); f > k - 80 || !a.support.scrollTop ? (b.menuPage.appendTo(a.mobile.pageContainer).page(), b.menuPageContent = q.find(".ui-content"), b.menuPageClose = q.find(".ui-header a"), b.thisPage.unbind("pagehide.remove"), i === 0 && j > k && b.thisPage.one("pagehide", function () { a(this).jqmData("lastScroll", j) }), b.menuPage.one("pageshow", function () { m() }).one("pagehide", function () { b.close() }), b.menuType = "page", b.menuPageContent.append(b.list), b.menuPage.find("div .ui-title").text(b.label.text())) : (b.menuType = "overlay", b.listbox.one("popupafteropen", m)) }, _buildList: function () { var b = this, d = this.options, e = this.placeholder, f = !0, g = [], h = [], i = b.isMultiple ? "checkbox-off" : "false"; b.list.empty().filter(".ui-listview").listview("destroy"); var j = b.select.find("option"), k = j.length, l = this.select[0], m = "data-" + a.mobile.ns, n = m + "option-index", o = m + "icon", p = m + "role", q = m + "placeholder", r = c.createDocumentFragment(), s = !1, t; for (var u = 0; u < k; u++, s = !1) { var v = j[u], w = a(v), x = v.parentNode, y = w.text(), z = c.createElement("a"), A = []; z.setAttribute("href", "#"), z.appendChild(c.createTextNode(y)); if (x !== l && x.nodeName.toLowerCase() === "optgroup") { var B = x.getAttribute("label"); if (B !== t) { var C = c.createElement("li"); C.setAttribute(p, "list-divider"), C.setAttribute("role", "option"), C.setAttribute("tabindex", "-1"), C.appendChild(c.createTextNode(B)), r.appendChild(C), t = B } } f && (!v.getAttribute("value") || y.length === 0 || w.jqmData("placeholder")) && (f = !1, s = !0, null === v.getAttribute(q) && (this._removePlaceholderAttr = !0), v.setAttribute(q, !0), d.hidePlaceholderMenuItems && A.push("ui-selectmenu-placeholder"), e !== y && (e = b.placeholder = y)); var D = c.createElement("li"); v.disabled && (A.push("ui-disabled"), D.setAttribute("aria-disabled", !0)), D.setAttribute(n, u), D.setAttribute(o, i), s && D.setAttribute(q, !0), D.className = A.join(" "), D.setAttribute("role", "option"), z.setAttribute("tabindex", "-1"), D.appendChild(z), r.appendChild(D) } b.list[0].appendChild(r), !this.isMultiple && !e.length ? this.header.hide() : this.headerTitle.text(this.placeholder), b.list.listview() }, _button: function () { return a("<a>", { href: "#", role: "button", id: this.buttonId, "aria-haspopup": "true", "aria-owns": this.menuId }) }, _destroy: function () { this.close(), this._origTabIndex !== b && (this._origTabIndex !== !1 ? this.select.attr("tabindex", this._origTabIndex) : this.select.removeAttr("tabindex")), this._removePlaceholderAttr && this._selectOptions().removeAttr("data-" + a.mobile.ns + "placeholder"), this.listbox.remove(), f.apply(this, arguments) } }) }; a.mobile.document.bind("selectmenubeforecreate", function (b) { var c = a(b.target).data("mobile-selectmenu"); !c.options.nativeMenu && c.element.parents(":jqmData(role='popup')").length === 0 && d(c) }) }(a), function (a, b) { a.widget("mobile.table", a.mobile.widget, { options: { classes: { table: "ui-table" }, initSelector: ":jqmData(role='table')" }, _create: function () { var b = this, c = this.element.find("thead tr"); this.element.addClass(this.options.classes.table), b.headers = this.element.find("tr:eq(0)").children(), b.allHeaders = b.headers.add(c.children()), c.each(function () { var d = 0; a(this).children().each(function (e) { var f = parseInt(a(this).attr("colspan"), 10), g = ":nth-child(" + (d + 1) + ")"; a(this).jqmData("colstart", d + 1); if (f) for (var h = 0; h < f - 1; h++) d++, g += ", :nth-child(" + (d + 1) + ")"; a(this).jqmData("cells", b.element.find("tr").not(c.eq(0)).not(this).children(g)), d++ }) }) } }), a.mobile.document.bind("pagecreate create", function (b) { a.mobile.table.prototype.enhanceWithin(b.target) }) }(a), function (a, b) { a.mobile.table.prototype.options.mode = "columntoggle", a.mobile.table.prototype.options.columnBtnTheme = null, a.mobile.table.prototype.options.columnPopupTheme = null, a.mobile.table.prototype.options.columnBtnText = "Columns...", a.mobile.table.prototype.options.classes = a.extend(a.mobile.table.prototype.options.classes, { popup: "ui-table-columntoggle-popup", columnBtn: "ui-table-columntoggle-btn", priorityPrefix: "ui-table-priority-", columnToggleTable: "ui-table-columntoggle" }), a.mobile.document.delegate(":jqmData(role='table')", "tablecreate", function () { var b = a(this), c = b.data("mobile-table"), d = c.options, e = a.mobile.ns; if (d.mode !== "columntoggle") return; c.element.addClass(d.classes.columnToggleTable); var f = (b.attr("id") || d.classes.popup) + "-popup", g = a("<a href='#" + f + "' class='" + d.classes.columnBtn + "' data-" + e + "rel='popup' data-" + e + "mini='true'>" + d.columnBtnText + "</a>"), h = a("<div data-" + e + "role='popup' data-" + e + "role='fieldcontain' class='" + d.classes.popup + "' id='" + f + "'></div>"), i = a("<fieldset data-" + e + "role='controlgroup'></fieldset>"); c.headers.not("td").each(function () { var b = a(this).jqmData("priority"), c = a(this).add(a(this).jqmData("cells")); b && (c.addClass(d.classes.priorityPrefix + b), a("<label><input type='checkbox' checked />" + a(this).text() + "</label>").appendTo(i).children(0).jqmData("cells", c).checkboxradio({ theme: d.columnPopupTheme })) }), i.appendTo(h), i.on("change", "input", function (b) { this.checked ? a(this).jqmData("cells").removeClass("ui-table-cell-hidden").addClass("ui-table-cell-visible") : a(this).jqmData("cells").removeClass("ui-table-cell-visible").addClass("ui-table-cell-hidden") }), g.insertBefore(b).buttonMarkup({ theme: d.columnBtnTheme }), h.insertBefore(b).popup(), c.refresh = function () { i.find("input").each(function () { this.checked = a(this).jqmData("cells").eq(0).css("display") === "table-cell", a(this).checkboxradio("refresh") }) }, a.mobile.window.on("throttledresize", c.refresh), c.refresh() }) }(a), function (a, b) { a.mobile.table.prototype.options.mode = "reflow", a.mobile.table.prototype.options.classes = a.extend(a.mobile.table.prototype.options.classes, { reflowTable: "ui-table-reflow", cellLabels: "ui-table-cell-label" }), a.mobile.document.delegate(":jqmData(role='table')", "tablecreate", function () { var b = a(this), c = b.data("mobile-table"), d = c.options; if (d.mode !== "reflow") return; c.element.addClass(d.classes.reflowTable); var e = a(c.allHeaders.get().reverse()); e.each(function (b) { var c = a(this).jqmData("cells"), e = a(this).jqmData("colstart"), f = c.not(this).filter("thead th").length && " ui-table-cell-label-top", g = a(this).text(); if (g !== "") if (f) { var h = parseInt(a(this).attr("colspan"), 10), i = ""; h && (i = "td:nth-child(" + h + "n + " + e + ")"), c.filter(i).prepend("<b class='" + d.classes.cellLabels + f + "'>" + g + "</b>") } else c.prepend("<b class='" + d.classes.cellLabels + "'>" + g + "</b>") }) }) }(a) });
(function (e) { "use strict"; var t = { method: "GET", icon: "arrow-r", cancelRequests: !1, target: e(), source: null, callback: null, link: null, minLength: 0, transition: "fade", matchFromStart: !0, labelHTML: function (e) { return e }, onNoResults: function () { return }, onLoading: function () { return }, onLoadingFinished: function () { return }, termParam: "term", loadingHtml: '<li data-icon="none"><a href="#">Searching...</a></li>', interval: 0, builder: null }, n = {}, r = function (t, n, r) { var s; if (r.builder) s = r.builder.apply(t.eq(0), [n, r]); else { s = []; n && e.each(n, function (t, n) { e.isPlainObject(n) ? s.push("<li data-icon=" + r.icon + '><a href="' + r.link + encodeURIComponent(n.value) + '" data-transition="' + r.transition + "\" data-autocomplete='" + JSON.stringify(n) + "'>" + r.labelHTML(n.label) + "</a></li>") : s.push("<li data-icon=" + r.icon + '><a href="' + r.link + encodeURIComponent(n) + '" data-transition="' + r.transition + '">' + r.labelHTML(n) + "</a></li>") }) } e.isArray(s) && (s = s.join("")); e(r.target).html(s).listview("refresh"); r.callback !== null && e.isFunction(r.callback) && i(r); if (s.length > 0) t.trigger("targetUpdated.autocomplete"); else { t.trigger("targetCleared.autocomplete"); r.onNoResults && r.onNoResults() } }, i = function (t) { e("li a", e(t.target)).bind("click.autocomplete", function (e) { e.stopPropagation(); e.preventDefault(); t.callback(e) }) }, s = function (e, t) { t.html("").listview("refresh").closest("fieldset").removeClass("ui-search-active"); e.trigger("targetCleared.autocomplete") }, o = function (t) { var i = e(this), u = i.attr("id"), a, f, l = i.jqmData("autocomplete"), c, h; Date.now || (Date.now = function () { return (new Date).valueOf() }); t && (t.keyCode === 38 ? e(".ui-btn-active", e(l.target)).removeClass("ui-btn-active").prevAll("li.ui-btn:eq(0)").addClass("ui-btn-active").length || e(".ui-btn:last", e(l.target)).addClass("ui-btn-active") : t.keyCode === 40 ? e(".ui-btn-active", e(l.target)).removeClass("ui-btn-active").nextAll("li.ui-btn:eq(0)").addClass("ui-btn-active").length || e(".ui-btn:first", e(l.target)).addClass("ui-btn-active") : t.keyCode === 13 && (e(".ui-btn-active a", e(l.target)).click().length || e(".ui-btn:first a", e(l.target)).click())); if (l) { a = i.val(); if (l._lastText === a) return; if (l._retryTimeout) { window.clearTimeout(l._retryTimeout); l._retryTimeout = null } if (!(!t || t.keyCode !== 13 && t.keyCode !== 38 && t.keyCode !== 40)) return; if (a.length < l.minLength) s(i, e(l.target)); else { if (l.interval && Date.now() - l._lastRequest < l.interval) { l._retryTimeout = window.setTimeout(e.proxy(o, this), l.interval - Date.now() + l._lastRequest); return } l._lastRequest = Date.now(); l._lastText = a; if (e.isArray(l.source)) { f = l.source.sort().filter(function (t) { l.matchFromStart ? (c, h = new RegExp("^" + a, "i")) : (c, h = new RegExp(a, "i")); e.isPlainObject(t) ? c = t.label : c = t; return h.test(c) }); r(i, f, l) } else if (typeof l.source == "function") l.source(a, function (e) { r(i, e, l) }); else { var p = { type: l.method, data: {}, dataType: "json", beforeSend: function (t) { if (l.cancelRequests) { n[u] && n[u].abort(); n[u] = t } l.onLoading && l.onLoadingFinished && l.onLoading(); if (l.loadingHtml) { e(l.target).html(l.loadingHtml).listview("refresh"); e(l.target).closest("fieldset").addClass("ui-search-active") } }, success: function (e) { r(i, e, l) }, complete: function () { l.cancelRequests && (n[u] = null); l.onLoadingFinished && l.onLoadingFinished() } }; if (e.isPlainObject(l.source)) { l.source.callback && l.source.callback(a, p); for (var d in l.source) d !== "callback" && (p[d] = l.source[d]) } else p.url = l.source; l.termParam && (p.data[l.termParam] = a); e.ajax(p) } } } }, u = { init: function (n) { var r = this; r.jqmData("autocomplete", e.extend({}, t, n)); var i = r.jqmData("autocomplete"); return r.unbind("keyup.autocomplete").bind("keyup.autocomplete", o).next(".ui-input-clear").bind("click", function () { s(r, e(i.target)) }) }, update: function (t) { var n = this.jqmData("autocomplete"); n && this.jqmData("autocomplete", e.extend(n, t)); return this }, clear: function () { var t = this.jqmData("autocomplete"); t && s(this, e(t.target)); return this }, destroy: function () { var t = this.jqmData("autocomplete"); if (t) { s(this, e(t.target)); this.jqmRemoveData("autocomplete"); this.unbind(".autocomplete") } return this } }; e.fn.autocomplete = function (e) { if (u[e]) return u[e].apply(this, Array.prototype.slice.call(arguments, 1)); if (typeof e == "object" || !e) return u.init.apply(this, arguments) } })(jQuery); 
/*! jQuery UI - v1.10.3 - 2013-08-29
* http://jqueryui.com
* Includes: jquery.ui.core.js, jquery.ui.widget.js, jquery.ui.mouse.js, jquery.ui.position.js, jquery.ui.draggable.js, jquery.ui.resizable.js, jquery.ui.accordion.js, jquery.ui.autocomplete.js, jquery.ui.button.js, jquery.ui.datepicker.js, jquery.ui.menu.js, jquery.ui.slider.js, jquery.ui.spinner.js, jquery.ui.effect.js, jquery.ui.effect-blind.js, jquery.ui.effect-fade.js, jquery.ui.effect-slide.js
* Copyright 2013 jQuery Foundation and other contributors Licensed MIT */

(function (e, t) { function i(t, i) { var a, n, r, o = t.nodeName.toLowerCase(); return "area" === o ? (a = t.parentNode, n = a.name, t.href && n && "map" === a.nodeName.toLowerCase() ? (r = e("img[usemap=#" + n + "]")[0], !!r && s(r)) : !1) : (/input|select|textarea|button|object/.test(o) ? !t.disabled : "a" === o ? t.href || i : i) && s(t) } function s(t) { return e.expr.filters.visible(t) && !e(t).parents().addBack().filter(function () { return "hidden" === e.css(this, "visibility") }).length } var a = 0, n = /^ui-id-\d+$/; e.ui = e.ui || {}, e.extend(e.ui, { version: "1.10.3", keyCode: { BACKSPACE: 8, COMMA: 188, DELETE: 46, DOWN: 40, END: 35, ENTER: 13, ESCAPE: 27, HOME: 36, LEFT: 37, NUMPAD_ADD: 107, NUMPAD_DECIMAL: 110, NUMPAD_DIVIDE: 111, NUMPAD_ENTER: 108, NUMPAD_MULTIPLY: 106, NUMPAD_SUBTRACT: 109, PAGE_DOWN: 34, PAGE_UP: 33, PERIOD: 190, RIGHT: 39, SPACE: 32, TAB: 9, UP: 38 } }), e.fn.extend({ focus: function (t) { return function (i, s) { return "number" == typeof i ? this.each(function () { var t = this; setTimeout(function () { e(t).focus(), s && s.call(t) }, i) }) : t.apply(this, arguments) } }(e.fn.focus), scrollParent: function () { var t; return t = e.ui.ie && /(static|relative)/.test(this.css("position")) || /absolute/.test(this.css("position")) ? this.parents().filter(function () { return /(relative|absolute|fixed)/.test(e.css(this, "position")) && /(auto|scroll)/.test(e.css(this, "overflow") + e.css(this, "overflow-y") + e.css(this, "overflow-x")) }).eq(0) : this.parents().filter(function () { return /(auto|scroll)/.test(e.css(this, "overflow") + e.css(this, "overflow-y") + e.css(this, "overflow-x")) }).eq(0), /fixed/.test(this.css("position")) || !t.length ? e(document) : t }, zIndex: function (i) { if (i !== t) return this.css("zIndex", i); if (this.length) for (var s, a, n = e(this[0]) ; n.length && n[0] !== document;) { if (s = n.css("position"), ("absolute" === s || "relative" === s || "fixed" === s) && (a = parseInt(n.css("zIndex"), 10), !isNaN(a) && 0 !== a)) return a; n = n.parent() } return 0 }, uniqueId: function () { return this.each(function () { this.id || (this.id = "ui-id-" + ++a) }) }, removeUniqueId: function () { return this.each(function () { n.test(this.id) && e(this).removeAttr("id") }) } }), e.extend(e.expr[":"], { data: e.expr.createPseudo ? e.expr.createPseudo(function (t) { return function (i) { return !!e.data(i, t) } }) : function (t, i, s) { return !!e.data(t, s[3]) }, focusable: function (t) { return i(t, !isNaN(e.attr(t, "tabindex"))) }, tabbable: function (t) { var s = e.attr(t, "tabindex"), a = isNaN(s); return (a || s >= 0) && i(t, !a) } }), e("<a>").outerWidth(1).jquery || e.each(["Width", "Height"], function (i, s) { function a(t, i, s, a) { return e.each(n, function () { i -= parseFloat(e.css(t, "padding" + this)) || 0, s && (i -= parseFloat(e.css(t, "border" + this + "Width")) || 0), a && (i -= parseFloat(e.css(t, "margin" + this)) || 0) }), i } var n = "Width" === s ? ["Left", "Right"] : ["Top", "Bottom"], r = s.toLowerCase(), o = { innerWidth: e.fn.innerWidth, innerHeight: e.fn.innerHeight, outerWidth: e.fn.outerWidth, outerHeight: e.fn.outerHeight }; e.fn["inner" + s] = function (i) { return i === t ? o["inner" + s].call(this) : this.each(function () { e(this).css(r, a(this, i) + "px") }) }, e.fn["outer" + s] = function (t, i) { return "number" != typeof t ? o["outer" + s].call(this, t) : this.each(function () { e(this).css(r, a(this, t, !0, i) + "px") }) } }), e.fn.addBack || (e.fn.addBack = function (e) { return this.add(null == e ? this.prevObject : this.prevObject.filter(e)) }), e("<a>").data("a-b", "a").removeData("a-b").data("a-b") && (e.fn.removeData = function (t) { return function (i) { return arguments.length ? t.call(this, e.camelCase(i)) : t.call(this) } }(e.fn.removeData)), e.ui.ie = !!/msie [\w.]+/.exec(navigator.userAgent.toLowerCase()), e.support.selectstart = "onselectstart" in document.createElement("div"), e.fn.extend({ disableSelection: function () { return this.bind((e.support.selectstart ? "selectstart" : "mousedown") + ".ui-disableSelection", function (e) { e.preventDefault() }) }, enableSelection: function () { return this.unbind(".ui-disableSelection") } }), e.extend(e.ui, { plugin: { add: function (t, i, s) { var a, n = e.ui[t].prototype; for (a in s) n.plugins[a] = n.plugins[a] || [], n.plugins[a].push([i, s[a]]) }, call: function (e, t, i) { var s, a = e.plugins[t]; if (a && e.element[0].parentNode && 11 !== e.element[0].parentNode.nodeType) for (s = 0; a.length > s; s++) e.options[a[s][0]] && a[s][1].apply(e.element, i) } }, hasScroll: function (t, i) { if ("hidden" === e(t).css("overflow")) return !1; var s = i && "left" === i ? "scrollLeft" : "scrollTop", a = !1; return t[s] > 0 ? !0 : (t[s] = 1, a = t[s] > 0, t[s] = 0, a) } }) })(jQuery); (function (e, t) { var i = 0, s = Array.prototype.slice, n = e.cleanData; e.cleanData = function (t) { for (var i, s = 0; null != (i = t[s]) ; s++) try { e(i).triggerHandler("remove") } catch (a) { } n(t) }, e.widget = function (i, s, n) { var a, r, o, h, l = {}, u = i.split(".")[0]; i = i.split(".")[1], a = u + "-" + i, n || (n = s, s = e.Widget), e.expr[":"][a.toLowerCase()] = function (t) { return !!e.data(t, a) }, e[u] = e[u] || {}, r = e[u][i], o = e[u][i] = function (e, i) { return this._createWidget ? (arguments.length && this._createWidget(e, i), t) : new o(e, i) }, e.extend(o, r, { version: n.version, _proto: e.extend({}, n), _childConstructors: [] }), h = new s, h.options = e.widget.extend({}, h.options), e.each(n, function (i, n) { return e.isFunction(n) ? (l[i] = function () { var e = function () { return s.prototype[i].apply(this, arguments) }, t = function (e) { return s.prototype[i].apply(this, e) }; return function () { var i, s = this._super, a = this._superApply; return this._super = e, this._superApply = t, i = n.apply(this, arguments), this._super = s, this._superApply = a, i } }(), t) : (l[i] = n, t) }), o.prototype = e.widget.extend(h, { widgetEventPrefix: r ? h.widgetEventPrefix : i }, l, { constructor: o, namespace: u, widgetName: i, widgetFullName: a }), r ? (e.each(r._childConstructors, function (t, i) { var s = i.prototype; e.widget(s.namespace + "." + s.widgetName, o, i._proto) }), delete r._childConstructors) : s._childConstructors.push(o), e.widget.bridge(i, o) }, e.widget.extend = function (i) { for (var n, a, r = s.call(arguments, 1), o = 0, h = r.length; h > o; o++) for (n in r[o]) a = r[o][n], r[o].hasOwnProperty(n) && a !== t && (i[n] = e.isPlainObject(a) ? e.isPlainObject(i[n]) ? e.widget.extend({}, i[n], a) : e.widget.extend({}, a) : a); return i }, e.widget.bridge = function (i, n) { var a = n.prototype.widgetFullName || i; e.fn[i] = function (r) { var o = "string" == typeof r, h = s.call(arguments, 1), l = this; return r = !o && h.length ? e.widget.extend.apply(null, [r].concat(h)) : r, o ? this.each(function () { var s, n = e.data(this, a); return n ? e.isFunction(n[r]) && "_" !== r.charAt(0) ? (s = n[r].apply(n, h), s !== n && s !== t ? (l = s && s.jquery ? l.pushStack(s.get()) : s, !1) : t) : e.error("no such method '" + r + "' for " + i + " widget instance") : e.error("cannot call methods on " + i + " prior to initialization; " + "attempted to call method '" + r + "'") }) : this.each(function () { var t = e.data(this, a); t ? t.option(r || {})._init() : e.data(this, a, new n(r, this)) }), l } }, e.Widget = function () { }, e.Widget._childConstructors = [], e.Widget.prototype = { widgetName: "widget", widgetEventPrefix: "", defaultElement: "<div>", options: { disabled: !1, create: null }, _createWidget: function (t, s) { s = e(s || this.defaultElement || this)[0], this.element = e(s), this.uuid = i++, this.eventNamespace = "." + this.widgetName + this.uuid, this.options = e.widget.extend({}, this.options, this._getCreateOptions(), t), this.bindings = e(), this.hoverable = e(), this.focusable = e(), s !== this && (e.data(s, this.widgetFullName, this), this._on(!0, this.element, { remove: function (e) { e.target === s && this.destroy() } }), this.document = e(s.style ? s.ownerDocument : s.document || s), this.window = e(this.document[0].defaultView || this.document[0].parentWindow)), this._create(), this._trigger("create", null, this._getCreateEventData()), this._init() }, _getCreateOptions: e.noop, _getCreateEventData: e.noop, _create: e.noop, _init: e.noop, destroy: function () { this._destroy(), this.element.unbind(this.eventNamespace).removeData(this.widgetName).removeData(this.widgetFullName).removeData(e.camelCase(this.widgetFullName)), this.widget().unbind(this.eventNamespace).removeAttr("aria-disabled").removeClass(this.widgetFullName + "-disabled " + "ui-state-disabled"), this.bindings.unbind(this.eventNamespace), this.hoverable.removeClass("ui-state-hover"), this.focusable.removeClass("ui-state-focus") }, _destroy: e.noop, widget: function () { return this.element }, option: function (i, s) { var n, a, r, o = i; if (0 === arguments.length) return e.widget.extend({}, this.options); if ("string" == typeof i) if (o = {}, n = i.split("."), i = n.shift(), n.length) { for (a = o[i] = e.widget.extend({}, this.options[i]), r = 0; n.length - 1 > r; r++) a[n[r]] = a[n[r]] || {}, a = a[n[r]]; if (i = n.pop(), s === t) return a[i] === t ? null : a[i]; a[i] = s } else { if (s === t) return this.options[i] === t ? null : this.options[i]; o[i] = s } return this._setOptions(o), this }, _setOptions: function (e) { var t; for (t in e) this._setOption(t, e[t]); return this }, _setOption: function (e, t) { return this.options[e] = t, "disabled" === e && (this.widget().toggleClass(this.widgetFullName + "-disabled ui-state-disabled", !!t).attr("aria-disabled", t), this.hoverable.removeClass("ui-state-hover"), this.focusable.removeClass("ui-state-focus")), this }, enable: function () { return this._setOption("disabled", !1) }, disable: function () { return this._setOption("disabled", !0) }, _on: function (i, s, n) { var a, r = this; "boolean" != typeof i && (n = s, s = i, i = !1), n ? (s = a = e(s), this.bindings = this.bindings.add(s)) : (n = s, s = this.element, a = this.widget()), e.each(n, function (n, o) { function h() { return i || r.options.disabled !== !0 && !e(this).hasClass("ui-state-disabled") ? ("string" == typeof o ? r[o] : o).apply(r, arguments) : t } "string" != typeof o && (h.guid = o.guid = o.guid || h.guid || e.guid++); var l = n.match(/^(\w+)\s*(.*)$/), u = l[1] + r.eventNamespace, c = l[2]; c ? a.delegate(c, u, h) : s.bind(u, h) }) }, _off: function (e, t) { t = (t || "").split(" ").join(this.eventNamespace + " ") + this.eventNamespace, e.unbind(t).undelegate(t) }, _delay: function (e, t) { function i() { return ("string" == typeof e ? s[e] : e).apply(s, arguments) } var s = this; return setTimeout(i, t || 0) }, _hoverable: function (t) { this.hoverable = this.hoverable.add(t), this._on(t, { mouseenter: function (t) { e(t.currentTarget).addClass("ui-state-hover") }, mouseleave: function (t) { e(t.currentTarget).removeClass("ui-state-hover") } }) }, _focusable: function (t) { this.focusable = this.focusable.add(t), this._on(t, { focusin: function (t) { e(t.currentTarget).addClass("ui-state-focus") }, focusout: function (t) { e(t.currentTarget).removeClass("ui-state-focus") } }) }, _trigger: function (t, i, s) { var n, a, r = this.options[t]; if (s = s || {}, i = e.Event(i), i.type = (t === this.widgetEventPrefix ? t : this.widgetEventPrefix + t).toLowerCase(), i.target = this.element[0], a = i.originalEvent) for (n in a) n in i || (i[n] = a[n]); return this.element.trigger(i, s), !(e.isFunction(r) && r.apply(this.element[0], [i].concat(s)) === !1 || i.isDefaultPrevented()) } }, e.each({ show: "fadeIn", hide: "fadeOut" }, function (t, i) { e.Widget.prototype["_" + t] = function (s, n, a) { "string" == typeof n && (n = { effect: n }); var r, o = n ? n === !0 || "number" == typeof n ? i : n.effect || i : t; n = n || {}, "number" == typeof n && (n = { duration: n }), r = !e.isEmptyObject(n), n.complete = a, n.delay && s.delay(n.delay), r && e.effects && e.effects.effect[o] ? s[t](n) : o !== t && s[o] ? s[o](n.duration, n.easing, a) : s.queue(function (i) { e(this)[t](), a && a.call(s[0]), i() }) } }) })(jQuery); (function (e) { var t = !1; e(document).mouseup(function () { t = !1 }), e.widget("ui.mouse", { version: "1.10.3", options: { cancel: "input,textarea,button,select,option", distance: 1, delay: 0 }, _mouseInit: function () { var t = this; this.element.bind("mousedown." + this.widgetName, function (e) { return t._mouseDown(e) }).bind("click." + this.widgetName, function (i) { return !0 === e.data(i.target, t.widgetName + ".preventClickEvent") ? (e.removeData(i.target, t.widgetName + ".preventClickEvent"), i.stopImmediatePropagation(), !1) : undefined }), this.started = !1 }, _mouseDestroy: function () { this.element.unbind("." + this.widgetName), this._mouseMoveDelegate && e(document).unbind("mousemove." + this.widgetName, this._mouseMoveDelegate).unbind("mouseup." + this.widgetName, this._mouseUpDelegate) }, _mouseDown: function (i) { if (!t) { this._mouseStarted && this._mouseUp(i), this._mouseDownEvent = i; var s = this, n = 1 === i.which, a = "string" == typeof this.options.cancel && i.target.nodeName ? e(i.target).closest(this.options.cancel).length : !1; return n && !a && this._mouseCapture(i) ? (this.mouseDelayMet = !this.options.delay, this.mouseDelayMet || (this._mouseDelayTimer = setTimeout(function () { s.mouseDelayMet = !0 }, this.options.delay)), this._mouseDistanceMet(i) && this._mouseDelayMet(i) && (this._mouseStarted = this._mouseStart(i) !== !1, !this._mouseStarted) ? (i.preventDefault(), !0) : (!0 === e.data(i.target, this.widgetName + ".preventClickEvent") && e.removeData(i.target, this.widgetName + ".preventClickEvent"), this._mouseMoveDelegate = function (e) { return s._mouseMove(e) }, this._mouseUpDelegate = function (e) { return s._mouseUp(e) }, e(document).bind("mousemove." + this.widgetName, this._mouseMoveDelegate).bind("mouseup." + this.widgetName, this._mouseUpDelegate), i.preventDefault(), t = !0, !0)) : !0 } }, _mouseMove: function (t) { return e.ui.ie && (!document.documentMode || 9 > document.documentMode) && !t.button ? this._mouseUp(t) : this._mouseStarted ? (this._mouseDrag(t), t.preventDefault()) : (this._mouseDistanceMet(t) && this._mouseDelayMet(t) && (this._mouseStarted = this._mouseStart(this._mouseDownEvent, t) !== !1, this._mouseStarted ? this._mouseDrag(t) : this._mouseUp(t)), !this._mouseStarted) }, _mouseUp: function (t) { return e(document).unbind("mousemove." + this.widgetName, this._mouseMoveDelegate).unbind("mouseup." + this.widgetName, this._mouseUpDelegate), this._mouseStarted && (this._mouseStarted = !1, t.target === this._mouseDownEvent.target && e.data(t.target, this.widgetName + ".preventClickEvent", !0), this._mouseStop(t)), !1 }, _mouseDistanceMet: function (e) { return Math.max(Math.abs(this._mouseDownEvent.pageX - e.pageX), Math.abs(this._mouseDownEvent.pageY - e.pageY)) >= this.options.distance }, _mouseDelayMet: function () { return this.mouseDelayMet }, _mouseStart: function () { }, _mouseDrag: function () { }, _mouseStop: function () { }, _mouseCapture: function () { return !0 } }) })(jQuery); (function (t, e) { function i(t, e, i) { return [parseFloat(t[0]) * (p.test(t[0]) ? e / 100 : 1), parseFloat(t[1]) * (p.test(t[1]) ? i / 100 : 1)] } function s(e, i) { return parseInt(t.css(e, i), 10) || 0 } function n(e) { var i = e[0]; return 9 === i.nodeType ? { width: e.width(), height: e.height(), offset: { top: 0, left: 0 } } : t.isWindow(i) ? { width: e.width(), height: e.height(), offset: { top: e.scrollTop(), left: e.scrollLeft() } } : i.preventDefault ? { width: 0, height: 0, offset: { top: i.pageY, left: i.pageX } } : { width: e.outerWidth(), height: e.outerHeight(), offset: e.offset() } } t.ui = t.ui || {}; var a, o = Math.max, r = Math.abs, h = Math.round, l = /left|center|right/, c = /top|center|bottom/, u = /[\+\-]\d+(\.[\d]+)?%?/, d = /^\w+/, p = /%$/, f = t.fn.position; t.position = { scrollbarWidth: function () { if (a !== e) return a; var i, s, n = t("<div style='display:block;width:50px;height:50px;overflow:hidden;'><div style='height:100px;width:auto;'></div></div>"), o = n.children()[0]; return t("body").append(n), i = o.offsetWidth, n.css("overflow", "scroll"), s = o.offsetWidth, i === s && (s = n[0].clientWidth), n.remove(), a = i - s }, getScrollInfo: function (e) { var i = e.isWindow ? "" : e.element.css("overflow-x"), s = e.isWindow ? "" : e.element.css("overflow-y"), n = "scroll" === i || "auto" === i && e.width < e.element[0].scrollWidth, a = "scroll" === s || "auto" === s && e.height < e.element[0].scrollHeight; return { width: a ? t.position.scrollbarWidth() : 0, height: n ? t.position.scrollbarWidth() : 0 } }, getWithinInfo: function (e) { var i = t(e || window), s = t.isWindow(i[0]); return { element: i, isWindow: s, offset: i.offset() || { left: 0, top: 0 }, scrollLeft: i.scrollLeft(), scrollTop: i.scrollTop(), width: s ? i.width() : i.outerWidth(), height: s ? i.height() : i.outerHeight() } } }, t.fn.position = function (e) { if (!e || !e.of) return f.apply(this, arguments); e = t.extend({}, e); var a, p, m, g, v, b, _ = t(e.of), y = t.position.getWithinInfo(e.within), w = t.position.getScrollInfo(y), x = (e.collision || "flip").split(" "), k = {}; return b = n(_), _[0].preventDefault && (e.at = "left top"), p = b.width, m = b.height, g = b.offset, v = t.extend({}, g), t.each(["my", "at"], function () { var t, i, s = (e[this] || "").split(" "); 1 === s.length && (s = l.test(s[0]) ? s.concat(["center"]) : c.test(s[0]) ? ["center"].concat(s) : ["center", "center"]), s[0] = l.test(s[0]) ? s[0] : "center", s[1] = c.test(s[1]) ? s[1] : "center", t = u.exec(s[0]), i = u.exec(s[1]), k[this] = [t ? t[0] : 0, i ? i[0] : 0], e[this] = [d.exec(s[0])[0], d.exec(s[1])[0]] }), 1 === x.length && (x[1] = x[0]), "right" === e.at[0] ? v.left += p : "center" === e.at[0] && (v.left += p / 2), "bottom" === e.at[1] ? v.top += m : "center" === e.at[1] && (v.top += m / 2), a = i(k.at, p, m), v.left += a[0], v.top += a[1], this.each(function () { var n, l, c = t(this), u = c.outerWidth(), d = c.outerHeight(), f = s(this, "marginLeft"), b = s(this, "marginTop"), D = u + f + s(this, "marginRight") + w.width, T = d + b + s(this, "marginBottom") + w.height, C = t.extend({}, v), M = i(k.my, c.outerWidth(), c.outerHeight()); "right" === e.my[0] ? C.left -= u : "center" === e.my[0] && (C.left -= u / 2), "bottom" === e.my[1] ? C.top -= d : "center" === e.my[1] && (C.top -= d / 2), C.left += M[0], C.top += M[1], t.support.offsetFractions || (C.left = h(C.left), C.top = h(C.top)), n = { marginLeft: f, marginTop: b }, t.each(["left", "top"], function (i, s) { t.ui.position[x[i]] && t.ui.position[x[i]][s](C, { targetWidth: p, targetHeight: m, elemWidth: u, elemHeight: d, collisionPosition: n, collisionWidth: D, collisionHeight: T, offset: [a[0] + M[0], a[1] + M[1]], my: e.my, at: e.at, within: y, elem: c }) }), e.using && (l = function (t) { var i = g.left - C.left, s = i + p - u, n = g.top - C.top, a = n + m - d, h = { target: { element: _, left: g.left, top: g.top, width: p, height: m }, element: { element: c, left: C.left, top: C.top, width: u, height: d }, horizontal: 0 > s ? "left" : i > 0 ? "right" : "center", vertical: 0 > a ? "top" : n > 0 ? "bottom" : "middle" }; u > p && p > r(i + s) && (h.horizontal = "center"), d > m && m > r(n + a) && (h.vertical = "middle"), h.important = o(r(i), r(s)) > o(r(n), r(a)) ? "horizontal" : "vertical", e.using.call(this, t, h) }), c.offset(t.extend(C, { using: l })) }) }, t.ui.position = { fit: { left: function (t, e) { var i, s = e.within, n = s.isWindow ? s.scrollLeft : s.offset.left, a = s.width, r = t.left - e.collisionPosition.marginLeft, h = n - r, l = r + e.collisionWidth - a - n; e.collisionWidth > a ? h > 0 && 0 >= l ? (i = t.left + h + e.collisionWidth - a - n, t.left += h - i) : t.left = l > 0 && 0 >= h ? n : h > l ? n + a - e.collisionWidth : n : h > 0 ? t.left += h : l > 0 ? t.left -= l : t.left = o(t.left - r, t.left) }, top: function (t, e) { var i, s = e.within, n = s.isWindow ? s.scrollTop : s.offset.top, a = e.within.height, r = t.top - e.collisionPosition.marginTop, h = n - r, l = r + e.collisionHeight - a - n; e.collisionHeight > a ? h > 0 && 0 >= l ? (i = t.top + h + e.collisionHeight - a - n, t.top += h - i) : t.top = l > 0 && 0 >= h ? n : h > l ? n + a - e.collisionHeight : n : h > 0 ? t.top += h : l > 0 ? t.top -= l : t.top = o(t.top - r, t.top) } }, flip: { left: function (t, e) { var i, s, n = e.within, a = n.offset.left + n.scrollLeft, o = n.width, h = n.isWindow ? n.scrollLeft : n.offset.left, l = t.left - e.collisionPosition.marginLeft, c = l - h, u = l + e.collisionWidth - o - h, d = "left" === e.my[0] ? -e.elemWidth : "right" === e.my[0] ? e.elemWidth : 0, p = "left" === e.at[0] ? e.targetWidth : "right" === e.at[0] ? -e.targetWidth : 0, f = -2 * e.offset[0]; 0 > c ? (i = t.left + d + p + f + e.collisionWidth - o - a, (0 > i || r(c) > i) && (t.left += d + p + f)) : u > 0 && (s = t.left - e.collisionPosition.marginLeft + d + p + f - h, (s > 0 || u > r(s)) && (t.left += d + p + f)) }, top: function (t, e) { var i, s, n = e.within, a = n.offset.top + n.scrollTop, o = n.height, h = n.isWindow ? n.scrollTop : n.offset.top, l = t.top - e.collisionPosition.marginTop, c = l - h, u = l + e.collisionHeight - o - h, d = "top" === e.my[1], p = d ? -e.elemHeight : "bottom" === e.my[1] ? e.elemHeight : 0, f = "top" === e.at[1] ? e.targetHeight : "bottom" === e.at[1] ? -e.targetHeight : 0, m = -2 * e.offset[1]; 0 > c ? (s = t.top + p + f + m + e.collisionHeight - o - a, t.top + p + f + m > c && (0 > s || r(c) > s) && (t.top += p + f + m)) : u > 0 && (i = t.top - e.collisionPosition.marginTop + p + f + m - h, t.top + p + f + m > u && (i > 0 || u > r(i)) && (t.top += p + f + m)) } }, flipfit: { left: function () { t.ui.position.flip.left.apply(this, arguments), t.ui.position.fit.left.apply(this, arguments) }, top: function () { t.ui.position.flip.top.apply(this, arguments), t.ui.position.fit.top.apply(this, arguments) } } }, function () { var e, i, s, n, a, o = document.getElementsByTagName("body")[0], r = document.createElement("div"); e = document.createElement(o ? "div" : "body"), s = { visibility: "hidden", width: 0, height: 0, border: 0, margin: 0, background: "none" }, o && t.extend(s, { position: "absolute", left: "-1000px", top: "-1000px" }); for (a in s) e.style[a] = s[a]; e.appendChild(r), i = o || document.documentElement, i.insertBefore(e, i.firstChild), r.style.cssText = "position: absolute; left: 10.7432222px;", n = t(r).offset().left, t.support.offsetFractions = n > 10 && 11 > n, e.innerHTML = "", i.removeChild(e) }() })(jQuery); (function (e) { e.widget("ui.draggable", e.ui.mouse, { version: "1.10.3", widgetEventPrefix: "drag", options: { addClasses: !0, appendTo: "parent", axis: !1, connectToSortable: !1, containment: !1, cursor: "auto", cursorAt: !1, grid: !1, handle: !1, helper: "original", iframeFix: !1, opacity: !1, refreshPositions: !1, revert: !1, revertDuration: 500, scope: "default", scroll: !0, scrollSensitivity: 20, scrollSpeed: 20, snap: !1, snapMode: "both", snapTolerance: 20, stack: !1, zIndex: !1, drag: null, start: null, stop: null }, _create: function () { "original" !== this.options.helper || /^(?:r|a|f)/.test(this.element.css("position")) || (this.element[0].style.position = "relative"), this.options.addClasses && this.element.addClass("ui-draggable"), this.options.disabled && this.element.addClass("ui-draggable-disabled"), this._mouseInit() }, _destroy: function () { this.element.removeClass("ui-draggable ui-draggable-dragging ui-draggable-disabled"), this._mouseDestroy() }, _mouseCapture: function (t) { var i = this.options; return this.helper || i.disabled || e(t.target).closest(".ui-resizable-handle").length > 0 ? !1 : (this.handle = this._getHandle(t), this.handle ? (e(i.iframeFix === !0 ? "iframe" : i.iframeFix).each(function () { e("<div class='ui-draggable-iframeFix' style='background: #fff;'></div>").css({ width: this.offsetWidth + "px", height: this.offsetHeight + "px", position: "absolute", opacity: "0.001", zIndex: 1e3 }).css(e(this).offset()).appendTo("body") }), !0) : !1) }, _mouseStart: function (t) { var i = this.options; return this.helper = this._createHelper(t), this.helper.addClass("ui-draggable-dragging"), this._cacheHelperProportions(), e.ui.ddmanager && (e.ui.ddmanager.current = this), this._cacheMargins(), this.cssPosition = this.helper.css("position"), this.scrollParent = this.helper.scrollParent(), this.offsetParent = this.helper.offsetParent(), this.offsetParentCssPosition = this.offsetParent.css("position"), this.offset = this.positionAbs = this.element.offset(), this.offset = { top: this.offset.top - this.margins.top, left: this.offset.left - this.margins.left }, this.offset.scroll = !1, e.extend(this.offset, { click: { left: t.pageX - this.offset.left, top: t.pageY - this.offset.top }, parent: this._getParentOffset(), relative: this._getRelativeOffset() }), this.originalPosition = this.position = this._generatePosition(t), this.originalPageX = t.pageX, this.originalPageY = t.pageY, i.cursorAt && this._adjustOffsetFromHelper(i.cursorAt), this._setContainment(), this._trigger("start", t) === !1 ? (this._clear(), !1) : (this._cacheHelperProportions(), e.ui.ddmanager && !i.dropBehaviour && e.ui.ddmanager.prepareOffsets(this, t), this._mouseDrag(t, !0), e.ui.ddmanager && e.ui.ddmanager.dragStart(this, t), !0) }, _mouseDrag: function (t, i) { if ("fixed" === this.offsetParentCssPosition && (this.offset.parent = this._getParentOffset()), this.position = this._generatePosition(t), this.positionAbs = this._convertPositionTo("absolute"), !i) { var s = this._uiHash(); if (this._trigger("drag", t, s) === !1) return this._mouseUp({}), !1; this.position = s.position } return this.options.axis && "y" === this.options.axis || (this.helper[0].style.left = this.position.left + "px"), this.options.axis && "x" === this.options.axis || (this.helper[0].style.top = this.position.top + "px"), e.ui.ddmanager && e.ui.ddmanager.drag(this, t), !1 }, _mouseStop: function (t) { var i = this, s = !1; return e.ui.ddmanager && !this.options.dropBehaviour && (s = e.ui.ddmanager.drop(this, t)), this.dropped && (s = this.dropped, this.dropped = !1), "original" !== this.options.helper || e.contains(this.element[0].ownerDocument, this.element[0]) ? ("invalid" === this.options.revert && !s || "valid" === this.options.revert && s || this.options.revert === !0 || e.isFunction(this.options.revert) && this.options.revert.call(this.element, s) ? e(this.helper).animate(this.originalPosition, parseInt(this.options.revertDuration, 10), function () { i._trigger("stop", t) !== !1 && i._clear() }) : this._trigger("stop", t) !== !1 && this._clear(), !1) : !1 }, _mouseUp: function (t) { return e("div.ui-draggable-iframeFix").each(function () { this.parentNode.removeChild(this) }), e.ui.ddmanager && e.ui.ddmanager.dragStop(this, t), e.ui.mouse.prototype._mouseUp.call(this, t) }, cancel: function () { return this.helper.is(".ui-draggable-dragging") ? this._mouseUp({}) : this._clear(), this }, _getHandle: function (t) { return this.options.handle ? !!e(t.target).closest(this.element.find(this.options.handle)).length : !0 }, _createHelper: function (t) { var i = this.options, s = e.isFunction(i.helper) ? e(i.helper.apply(this.element[0], [t])) : "clone" === i.helper ? this.element.clone().removeAttr("id") : this.element; return s.parents("body").length || s.appendTo("parent" === i.appendTo ? this.element[0].parentNode : i.appendTo), s[0] === this.element[0] || /(fixed|absolute)/.test(s.css("position")) || s.css("position", "absolute"), s }, _adjustOffsetFromHelper: function (t) { "string" == typeof t && (t = t.split(" ")), e.isArray(t) && (t = { left: +t[0], top: +t[1] || 0 }), "left" in t && (this.offset.click.left = t.left + this.margins.left), "right" in t && (this.offset.click.left = this.helperProportions.width - t.right + this.margins.left), "top" in t && (this.offset.click.top = t.top + this.margins.top), "bottom" in t && (this.offset.click.top = this.helperProportions.height - t.bottom + this.margins.top) }, _getParentOffset: function () { var t = this.offsetParent.offset(); return "absolute" === this.cssPosition && this.scrollParent[0] !== document && e.contains(this.scrollParent[0], this.offsetParent[0]) && (t.left += this.scrollParent.scrollLeft(), t.top += this.scrollParent.scrollTop()), (this.offsetParent[0] === document.body || this.offsetParent[0].tagName && "html" === this.offsetParent[0].tagName.toLowerCase() && e.ui.ie) && (t = { top: 0, left: 0 }), { top: t.top + (parseInt(this.offsetParent.css("borderTopWidth"), 10) || 0), left: t.left + (parseInt(this.offsetParent.css("borderLeftWidth"), 10) || 0) } }, _getRelativeOffset: function () { if ("relative" === this.cssPosition) { var e = this.element.position(); return { top: e.top - (parseInt(this.helper.css("top"), 10) || 0) + this.scrollParent.scrollTop(), left: e.left - (parseInt(this.helper.css("left"), 10) || 0) + this.scrollParent.scrollLeft() } } return { top: 0, left: 0 } }, _cacheMargins: function () { this.margins = { left: parseInt(this.element.css("marginLeft"), 10) || 0, top: parseInt(this.element.css("marginTop"), 10) || 0, right: parseInt(this.element.css("marginRight"), 10) || 0, bottom: parseInt(this.element.css("marginBottom"), 10) || 0 } }, _cacheHelperProportions: function () { this.helperProportions = { width: this.helper.outerWidth(), height: this.helper.outerHeight() } }, _setContainment: function () { var t, i, s, n = this.options; return n.containment ? "window" === n.containment ? (this.containment = [e(window).scrollLeft() - this.offset.relative.left - this.offset.parent.left, e(window).scrollTop() - this.offset.relative.top - this.offset.parent.top, e(window).scrollLeft() + e(window).width() - this.helperProportions.width - this.margins.left, e(window).scrollTop() + (e(window).height() || document.body.parentNode.scrollHeight) - this.helperProportions.height - this.margins.top], undefined) : "document" === n.containment ? (this.containment = [0, 0, e(document).width() - this.helperProportions.width - this.margins.left, (e(document).height() || document.body.parentNode.scrollHeight) - this.helperProportions.height - this.margins.top], undefined) : n.containment.constructor === Array ? (this.containment = n.containment, undefined) : ("parent" === n.containment && (n.containment = this.helper[0].parentNode), i = e(n.containment), s = i[0], s && (t = "hidden" !== i.css("overflow"), this.containment = [(parseInt(i.css("borderLeftWidth"), 10) || 0) + (parseInt(i.css("paddingLeft"), 10) || 0), (parseInt(i.css("borderTopWidth"), 10) || 0) + (parseInt(i.css("paddingTop"), 10) || 0), (t ? Math.max(s.scrollWidth, s.offsetWidth) : s.offsetWidth) - (parseInt(i.css("borderRightWidth"), 10) || 0) - (parseInt(i.css("paddingRight"), 10) || 0) - this.helperProportions.width - this.margins.left - this.margins.right, (t ? Math.max(s.scrollHeight, s.offsetHeight) : s.offsetHeight) - (parseInt(i.css("borderBottomWidth"), 10) || 0) - (parseInt(i.css("paddingBottom"), 10) || 0) - this.helperProportions.height - this.margins.top - this.margins.bottom], this.relative_container = i), undefined) : (this.containment = null, undefined) }, _convertPositionTo: function (t, i) { i || (i = this.position); var s = "absolute" === t ? 1 : -1, n = "absolute" !== this.cssPosition || this.scrollParent[0] !== document && e.contains(this.scrollParent[0], this.offsetParent[0]) ? this.scrollParent : this.offsetParent; return this.offset.scroll || (this.offset.scroll = { top: n.scrollTop(), left: n.scrollLeft() }), { top: i.top + this.offset.relative.top * s + this.offset.parent.top * s - ("fixed" === this.cssPosition ? -this.scrollParent.scrollTop() : this.offset.scroll.top) * s, left: i.left + this.offset.relative.left * s + this.offset.parent.left * s - ("fixed" === this.cssPosition ? -this.scrollParent.scrollLeft() : this.offset.scroll.left) * s } }, _generatePosition: function (t) { var i, s, n, a, o = this.options, r = "absolute" !== this.cssPosition || this.scrollParent[0] !== document && e.contains(this.scrollParent[0], this.offsetParent[0]) ? this.scrollParent : this.offsetParent, h = t.pageX, l = t.pageY; return this.offset.scroll || (this.offset.scroll = { top: r.scrollTop(), left: r.scrollLeft() }), this.originalPosition && (this.containment && (this.relative_container ? (s = this.relative_container.offset(), i = [this.containment[0] + s.left, this.containment[1] + s.top, this.containment[2] + s.left, this.containment[3] + s.top]) : i = this.containment, t.pageX - this.offset.click.left < i[0] && (h = i[0] + this.offset.click.left), t.pageY - this.offset.click.top < i[1] && (l = i[1] + this.offset.click.top), t.pageX - this.offset.click.left > i[2] && (h = i[2] + this.offset.click.left), t.pageY - this.offset.click.top > i[3] && (l = i[3] + this.offset.click.top)), o.grid && (n = o.grid[1] ? this.originalPageY + Math.round((l - this.originalPageY) / o.grid[1]) * o.grid[1] : this.originalPageY, l = i ? n - this.offset.click.top >= i[1] || n - this.offset.click.top > i[3] ? n : n - this.offset.click.top >= i[1] ? n - o.grid[1] : n + o.grid[1] : n, a = o.grid[0] ? this.originalPageX + Math.round((h - this.originalPageX) / o.grid[0]) * o.grid[0] : this.originalPageX, h = i ? a - this.offset.click.left >= i[0] || a - this.offset.click.left > i[2] ? a : a - this.offset.click.left >= i[0] ? a - o.grid[0] : a + o.grid[0] : a)), { top: l - this.offset.click.top - this.offset.relative.top - this.offset.parent.top + ("fixed" === this.cssPosition ? -this.scrollParent.scrollTop() : this.offset.scroll.top), left: h - this.offset.click.left - this.offset.relative.left - this.offset.parent.left + ("fixed" === this.cssPosition ? -this.scrollParent.scrollLeft() : this.offset.scroll.left) } }, _clear: function () { this.helper.removeClass("ui-draggable-dragging"), this.helper[0] === this.element[0] || this.cancelHelperRemoval || this.helper.remove(), this.helper = null, this.cancelHelperRemoval = !1 }, _trigger: function (t, i, s) { return s = s || this._uiHash(), e.ui.plugin.call(this, t, [i, s]), "drag" === t && (this.positionAbs = this._convertPositionTo("absolute")), e.Widget.prototype._trigger.call(this, t, i, s) }, plugins: {}, _uiHash: function () { return { helper: this.helper, position: this.position, originalPosition: this.originalPosition, offset: this.positionAbs } } }), e.ui.plugin.add("draggable", "connectToSortable", { start: function (t, i) { var s = e(this).data("ui-draggable"), n = s.options, a = e.extend({}, i, { item: s.element }); s.sortables = [], e(n.connectToSortable).each(function () { var i = e.data(this, "ui-sortable"); i && !i.options.disabled && (s.sortables.push({ instance: i, shouldRevert: i.options.revert }), i.refreshPositions(), i._trigger("activate", t, a)) }) }, stop: function (t, i) { var s = e(this).data("ui-draggable"), n = e.extend({}, i, { item: s.element }); e.each(s.sortables, function () { this.instance.isOver ? (this.instance.isOver = 0, s.cancelHelperRemoval = !0, this.instance.cancelHelperRemoval = !1, this.shouldRevert && (this.instance.options.revert = this.shouldRevert), this.instance._mouseStop(t), this.instance.options.helper = this.instance.options._helper, "original" === s.options.helper && this.instance.currentItem.css({ top: "auto", left: "auto" })) : (this.instance.cancelHelperRemoval = !1, this.instance._trigger("deactivate", t, n)) }) }, drag: function (t, i) { var s = e(this).data("ui-draggable"), n = this; e.each(s.sortables, function () { var a = !1, o = this; this.instance.positionAbs = s.positionAbs, this.instance.helperProportions = s.helperProportions, this.instance.offset.click = s.offset.click, this.instance._intersectsWith(this.instance.containerCache) && (a = !0, e.each(s.sortables, function () { return this.instance.positionAbs = s.positionAbs, this.instance.helperProportions = s.helperProportions, this.instance.offset.click = s.offset.click, this !== o && this.instance._intersectsWith(this.instance.containerCache) && e.contains(o.instance.element[0], this.instance.element[0]) && (a = !1), a })), a ? (this.instance.isOver || (this.instance.isOver = 1, this.instance.currentItem = e(n).clone().removeAttr("id").appendTo(this.instance.element).data("ui-sortable-item", !0), this.instance.options._helper = this.instance.options.helper, this.instance.options.helper = function () { return i.helper[0] }, t.target = this.instance.currentItem[0], this.instance._mouseCapture(t, !0), this.instance._mouseStart(t, !0, !0), this.instance.offset.click.top = s.offset.click.top, this.instance.offset.click.left = s.offset.click.left, this.instance.offset.parent.left -= s.offset.parent.left - this.instance.offset.parent.left, this.instance.offset.parent.top -= s.offset.parent.top - this.instance.offset.parent.top, s._trigger("toSortable", t), s.dropped = this.instance.element, s.currentItem = s.element, this.instance.fromOutside = s), this.instance.currentItem && this.instance._mouseDrag(t)) : this.instance.isOver && (this.instance.isOver = 0, this.instance.cancelHelperRemoval = !0, this.instance.options.revert = !1, this.instance._trigger("out", t, this.instance._uiHash(this.instance)), this.instance._mouseStop(t, !0), this.instance.options.helper = this.instance.options._helper, this.instance.currentItem.remove(), this.instance.placeholder && this.instance.placeholder.remove(), s._trigger("fromSortable", t), s.dropped = !1) }) } }), e.ui.plugin.add("draggable", "cursor", { start: function () { var t = e("body"), i = e(this).data("ui-draggable").options; t.css("cursor") && (i._cursor = t.css("cursor")), t.css("cursor", i.cursor) }, stop: function () { var t = e(this).data("ui-draggable").options; t._cursor && e("body").css("cursor", t._cursor) } }), e.ui.plugin.add("draggable", "opacity", { start: function (t, i) { var s = e(i.helper), n = e(this).data("ui-draggable").options; s.css("opacity") && (n._opacity = s.css("opacity")), s.css("opacity", n.opacity) }, stop: function (t, i) { var s = e(this).data("ui-draggable").options; s._opacity && e(i.helper).css("opacity", s._opacity) } }), e.ui.plugin.add("draggable", "scroll", { start: function () { var t = e(this).data("ui-draggable"); t.scrollParent[0] !== document && "HTML" !== t.scrollParent[0].tagName && (t.overflowOffset = t.scrollParent.offset()) }, drag: function (t) { var i = e(this).data("ui-draggable"), s = i.options, n = !1; i.scrollParent[0] !== document && "HTML" !== i.scrollParent[0].tagName ? (s.axis && "x" === s.axis || (i.overflowOffset.top + i.scrollParent[0].offsetHeight - t.pageY < s.scrollSensitivity ? i.scrollParent[0].scrollTop = n = i.scrollParent[0].scrollTop + s.scrollSpeed : t.pageY - i.overflowOffset.top < s.scrollSensitivity && (i.scrollParent[0].scrollTop = n = i.scrollParent[0].scrollTop - s.scrollSpeed)), s.axis && "y" === s.axis || (i.overflowOffset.left + i.scrollParent[0].offsetWidth - t.pageX < s.scrollSensitivity ? i.scrollParent[0].scrollLeft = n = i.scrollParent[0].scrollLeft + s.scrollSpeed : t.pageX - i.overflowOffset.left < s.scrollSensitivity && (i.scrollParent[0].scrollLeft = n = i.scrollParent[0].scrollLeft - s.scrollSpeed))) : (s.axis && "x" === s.axis || (t.pageY - e(document).scrollTop() < s.scrollSensitivity ? n = e(document).scrollTop(e(document).scrollTop() - s.scrollSpeed) : e(window).height() - (t.pageY - e(document).scrollTop()) < s.scrollSensitivity && (n = e(document).scrollTop(e(document).scrollTop() + s.scrollSpeed))), s.axis && "y" === s.axis || (t.pageX - e(document).scrollLeft() < s.scrollSensitivity ? n = e(document).scrollLeft(e(document).scrollLeft() - s.scrollSpeed) : e(window).width() - (t.pageX - e(document).scrollLeft()) < s.scrollSensitivity && (n = e(document).scrollLeft(e(document).scrollLeft() + s.scrollSpeed)))), n !== !1 && e.ui.ddmanager && !s.dropBehaviour && e.ui.ddmanager.prepareOffsets(i, t) } }), e.ui.plugin.add("draggable", "snap", { start: function () { var t = e(this).data("ui-draggable"), i = t.options; t.snapElements = [], e(i.snap.constructor !== String ? i.snap.items || ":data(ui-draggable)" : i.snap).each(function () { var i = e(this), s = i.offset(); this !== t.element[0] && t.snapElements.push({ item: this, width: i.outerWidth(), height: i.outerHeight(), top: s.top, left: s.left }) }) }, drag: function (t, i) { var s, n, a, o, r, h, l, u, c, d, p = e(this).data("ui-draggable"), f = p.options, m = f.snapTolerance, g = i.offset.left, v = g + p.helperProportions.width, b = i.offset.top, y = b + p.helperProportions.height; for (c = p.snapElements.length - 1; c >= 0; c--) r = p.snapElements[c].left, h = r + p.snapElements[c].width, l = p.snapElements[c].top, u = l + p.snapElements[c].height, r - m > v || g > h + m || l - m > y || b > u + m || !e.contains(p.snapElements[c].item.ownerDocument, p.snapElements[c].item) ? (p.snapElements[c].snapping && p.options.snap.release && p.options.snap.release.call(p.element, t, e.extend(p._uiHash(), { snapItem: p.snapElements[c].item })), p.snapElements[c].snapping = !1) : ("inner" !== f.snapMode && (s = m >= Math.abs(l - y), n = m >= Math.abs(u - b), a = m >= Math.abs(r - v), o = m >= Math.abs(h - g), s && (i.position.top = p._convertPositionTo("relative", { top: l - p.helperProportions.height, left: 0 }).top - p.margins.top), n && (i.position.top = p._convertPositionTo("relative", { top: u, left: 0 }).top - p.margins.top), a && (i.position.left = p._convertPositionTo("relative", { top: 0, left: r - p.helperProportions.width }).left - p.margins.left), o && (i.position.left = p._convertPositionTo("relative", { top: 0, left: h }).left - p.margins.left)), d = s || n || a || o, "outer" !== f.snapMode && (s = m >= Math.abs(l - b), n = m >= Math.abs(u - y), a = m >= Math.abs(r - g), o = m >= Math.abs(h - v), s && (i.position.top = p._convertPositionTo("relative", { top: l, left: 0 }).top - p.margins.top), n && (i.position.top = p._convertPositionTo("relative", { top: u - p.helperProportions.height, left: 0 }).top - p.margins.top), a && (i.position.left = p._convertPositionTo("relative", { top: 0, left: r }).left - p.margins.left), o && (i.position.left = p._convertPositionTo("relative", { top: 0, left: h - p.helperProportions.width }).left - p.margins.left)), !p.snapElements[c].snapping && (s || n || a || o || d) && p.options.snap.snap && p.options.snap.snap.call(p.element, t, e.extend(p._uiHash(), { snapItem: p.snapElements[c].item })), p.snapElements[c].snapping = s || n || a || o || d) } }), e.ui.plugin.add("draggable", "stack", { start: function () { var t, i = this.data("ui-draggable").options, s = e.makeArray(e(i.stack)).sort(function (t, i) { return (parseInt(e(t).css("zIndex"), 10) || 0) - (parseInt(e(i).css("zIndex"), 10) || 0) }); s.length && (t = parseInt(e(s[0]).css("zIndex"), 10) || 0, e(s).each(function (i) { e(this).css("zIndex", t + i) }), this.css("zIndex", t + s.length)) } }), e.ui.plugin.add("draggable", "zIndex", { start: function (t, i) { var s = e(i.helper), n = e(this).data("ui-draggable").options; s.css("zIndex") && (n._zIndex = s.css("zIndex")), s.css("zIndex", n.zIndex) }, stop: function (t, i) { var s = e(this).data("ui-draggable").options; s._zIndex && e(i.helper).css("zIndex", s._zIndex) } }) })(jQuery); (function (e) { function t(e) { return parseInt(e, 10) || 0 } function i(e) { return !isNaN(parseInt(e, 10)) } e.widget("ui.resizable", e.ui.mouse, { version: "1.10.3", widgetEventPrefix: "resize", options: { alsoResize: !1, animate: !1, animateDuration: "slow", animateEasing: "swing", aspectRatio: !1, autoHide: !1, containment: !1, ghost: !1, grid: !1, handles: "e,s,se", helper: !1, maxHeight: null, maxWidth: null, minHeight: 10, minWidth: 10, zIndex: 90, resize: null, start: null, stop: null }, _create: function () { var t, i, s, n, a, o = this, r = this.options; if (this.element.addClass("ui-resizable"), e.extend(this, { _aspectRatio: !!r.aspectRatio, aspectRatio: r.aspectRatio, originalElement: this.element, _proportionallyResizeElements: [], _helper: r.helper || r.ghost || r.animate ? r.helper || "ui-resizable-helper" : null }), this.element[0].nodeName.match(/canvas|textarea|input|select|button|img/i) && (this.element.wrap(e("<div class='ui-wrapper' style='overflow: hidden;'></div>").css({ position: this.element.css("position"), width: this.element.outerWidth(), height: this.element.outerHeight(), top: this.element.css("top"), left: this.element.css("left") })), this.element = this.element.parent().data("ui-resizable", this.element.data("ui-resizable")), this.elementIsWrapper = !0, this.element.css({ marginLeft: this.originalElement.css("marginLeft"), marginTop: this.originalElement.css("marginTop"), marginRight: this.originalElement.css("marginRight"), marginBottom: this.originalElement.css("marginBottom") }), this.originalElement.css({ marginLeft: 0, marginTop: 0, marginRight: 0, marginBottom: 0 }), this.originalResizeStyle = this.originalElement.css("resize"), this.originalElement.css("resize", "none"), this._proportionallyResizeElements.push(this.originalElement.css({ position: "static", zoom: 1, display: "block" })), this.originalElement.css({ margin: this.originalElement.css("margin") }), this._proportionallyResize()), this.handles = r.handles || (e(".ui-resizable-handle", this.element).length ? { n: ".ui-resizable-n", e: ".ui-resizable-e", s: ".ui-resizable-s", w: ".ui-resizable-w", se: ".ui-resizable-se", sw: ".ui-resizable-sw", ne: ".ui-resizable-ne", nw: ".ui-resizable-nw" } : "e,s,se"), this.handles.constructor === String) for ("all" === this.handles && (this.handles = "n,e,s,w,se,sw,ne,nw"), t = this.handles.split(","), this.handles = {}, i = 0; t.length > i; i++) s = e.trim(t[i]), a = "ui-resizable-" + s, n = e("<div class='ui-resizable-handle " + a + "'></div>"), n.css({ zIndex: r.zIndex }), "se" === s && n.addClass("ui-icon ui-icon-gripsmall-diagonal-se"), this.handles[s] = ".ui-resizable-" + s, this.element.append(n); this._renderAxis = function (t) { var i, s, n, a; t = t || this.element; for (i in this.handles) this.handles[i].constructor === String && (this.handles[i] = e(this.handles[i], this.element).show()), this.elementIsWrapper && this.originalElement[0].nodeName.match(/textarea|input|select|button/i) && (s = e(this.handles[i], this.element), a = /sw|ne|nw|se|n|s/.test(i) ? s.outerHeight() : s.outerWidth(), n = ["padding", /ne|nw|n/.test(i) ? "Top" : /se|sw|s/.test(i) ? "Bottom" : /^e$/.test(i) ? "Right" : "Left"].join(""), t.css(n, a), this._proportionallyResize()), e(this.handles[i]).length }, this._renderAxis(this.element), this._handles = e(".ui-resizable-handle", this.element).disableSelection(), this._handles.mouseover(function () { o.resizing || (this.className && (n = this.className.match(/ui-resizable-(se|sw|ne|nw|n|e|s|w)/i)), o.axis = n && n[1] ? n[1] : "se") }), r.autoHide && (this._handles.hide(), e(this.element).addClass("ui-resizable-autohide").mouseenter(function () { r.disabled || (e(this).removeClass("ui-resizable-autohide"), o._handles.show()) }).mouseleave(function () { r.disabled || o.resizing || (e(this).addClass("ui-resizable-autohide"), o._handles.hide()) })), this._mouseInit() }, _destroy: function () { this._mouseDestroy(); var t, i = function (t) { e(t).removeClass("ui-resizable ui-resizable-disabled ui-resizable-resizing").removeData("resizable").removeData("ui-resizable").unbind(".resizable").find(".ui-resizable-handle").remove() }; return this.elementIsWrapper && (i(this.element), t = this.element, this.originalElement.css({ position: t.css("position"), width: t.outerWidth(), height: t.outerHeight(), top: t.css("top"), left: t.css("left") }).insertAfter(t), t.remove()), this.originalElement.css("resize", this.originalResizeStyle), i(this.originalElement), this }, _mouseCapture: function (t) { var i, s, n = !1; for (i in this.handles) s = e(this.handles[i])[0], (s === t.target || e.contains(s, t.target)) && (n = !0); return !this.options.disabled && n }, _mouseStart: function (i) { var s, n, a, o = this.options, r = this.element.position(), h = this.element; return this.resizing = !0, /absolute/.test(h.css("position")) ? h.css({ position: "absolute", top: h.css("top"), left: h.css("left") }) : h.is(".ui-draggable") && h.css({ position: "absolute", top: r.top, left: r.left }), this._renderProxy(), s = t(this.helper.css("left")), n = t(this.helper.css("top")), o.containment && (s += e(o.containment).scrollLeft() || 0, n += e(o.containment).scrollTop() || 0), this.offset = this.helper.offset(), this.position = { left: s, top: n }, this.size = this._helper ? { width: h.outerWidth(), height: h.outerHeight() } : { width: h.width(), height: h.height() }, this.originalSize = this._helper ? { width: h.outerWidth(), height: h.outerHeight() } : { width: h.width(), height: h.height() }, this.originalPosition = { left: s, top: n }, this.sizeDiff = { width: h.outerWidth() - h.width(), height: h.outerHeight() - h.height() }, this.originalMousePosition = { left: i.pageX, top: i.pageY }, this.aspectRatio = "number" == typeof o.aspectRatio ? o.aspectRatio : this.originalSize.width / this.originalSize.height || 1, a = e(".ui-resizable-" + this.axis).css("cursor"), e("body").css("cursor", "auto" === a ? this.axis + "-resize" : a), h.addClass("ui-resizable-resizing"), this._propagate("start", i), !0 }, _mouseDrag: function (t) { var i, s = this.helper, n = {}, a = this.originalMousePosition, o = this.axis, r = this.position.top, h = this.position.left, l = this.size.width, u = this.size.height, c = t.pageX - a.left || 0, d = t.pageY - a.top || 0, p = this._change[o]; return p ? (i = p.apply(this, [t, c, d]), this._updateVirtualBoundaries(t.shiftKey), (this._aspectRatio || t.shiftKey) && (i = this._updateRatio(i, t)), i = this._respectSize(i, t), this._updateCache(i), this._propagate("resize", t), this.position.top !== r && (n.top = this.position.top + "px"), this.position.left !== h && (n.left = this.position.left + "px"), this.size.width !== l && (n.width = this.size.width + "px"), this.size.height !== u && (n.height = this.size.height + "px"), s.css(n), !this._helper && this._proportionallyResizeElements.length && this._proportionallyResize(), e.isEmptyObject(n) || this._trigger("resize", t, this.ui()), !1) : !1 }, _mouseStop: function (t) { this.resizing = !1; var i, s, n, a, o, r, h, l = this.options, u = this; return this._helper && (i = this._proportionallyResizeElements, s = i.length && /textarea/i.test(i[0].nodeName), n = s && e.ui.hasScroll(i[0], "left") ? 0 : u.sizeDiff.height, a = s ? 0 : u.sizeDiff.width, o = { width: u.helper.width() - a, height: u.helper.height() - n }, r = parseInt(u.element.css("left"), 10) + (u.position.left - u.originalPosition.left) || null, h = parseInt(u.element.css("top"), 10) + (u.position.top - u.originalPosition.top) || null, l.animate || this.element.css(e.extend(o, { top: h, left: r })), u.helper.height(u.size.height), u.helper.width(u.size.width), this._helper && !l.animate && this._proportionallyResize()), e("body").css("cursor", "auto"), this.element.removeClass("ui-resizable-resizing"), this._propagate("stop", t), this._helper && this.helper.remove(), !1 }, _updateVirtualBoundaries: function (e) { var t, s, n, a, o, r = this.options; o = { minWidth: i(r.minWidth) ? r.minWidth : 0, maxWidth: i(r.maxWidth) ? r.maxWidth : 1 / 0, minHeight: i(r.minHeight) ? r.minHeight : 0, maxHeight: i(r.maxHeight) ? r.maxHeight : 1 / 0 }, (this._aspectRatio || e) && (t = o.minHeight * this.aspectRatio, n = o.minWidth / this.aspectRatio, s = o.maxHeight * this.aspectRatio, a = o.maxWidth / this.aspectRatio, t > o.minWidth && (o.minWidth = t), n > o.minHeight && (o.minHeight = n), o.maxWidth > s && (o.maxWidth = s), o.maxHeight > a && (o.maxHeight = a)), this._vBoundaries = o }, _updateCache: function (e) { this.offset = this.helper.offset(), i(e.left) && (this.position.left = e.left), i(e.top) && (this.position.top = e.top), i(e.height) && (this.size.height = e.height), i(e.width) && (this.size.width = e.width) }, _updateRatio: function (e) { var t = this.position, s = this.size, n = this.axis; return i(e.height) ? e.width = e.height * this.aspectRatio : i(e.width) && (e.height = e.width / this.aspectRatio), "sw" === n && (e.left = t.left + (s.width - e.width), e.top = null), "nw" === n && (e.top = t.top + (s.height - e.height), e.left = t.left + (s.width - e.width)), e }, _respectSize: function (e) { var t = this._vBoundaries, s = this.axis, n = i(e.width) && t.maxWidth && t.maxWidth < e.width, a = i(e.height) && t.maxHeight && t.maxHeight < e.height, o = i(e.width) && t.minWidth && t.minWidth > e.width, r = i(e.height) && t.minHeight && t.minHeight > e.height, h = this.originalPosition.left + this.originalSize.width, l = this.position.top + this.size.height, u = /sw|nw|w/.test(s), c = /nw|ne|n/.test(s); return o && (e.width = t.minWidth), r && (e.height = t.minHeight), n && (e.width = t.maxWidth), a && (e.height = t.maxHeight), o && u && (e.left = h - t.minWidth), n && u && (e.left = h - t.maxWidth), r && c && (e.top = l - t.minHeight), a && c && (e.top = l - t.maxHeight), e.width || e.height || e.left || !e.top ? e.width || e.height || e.top || !e.left || (e.left = null) : e.top = null, e }, _proportionallyResize: function () { if (this._proportionallyResizeElements.length) { var e, t, i, s, n, a = this.helper || this.element; for (e = 0; this._proportionallyResizeElements.length > e; e++) { if (n = this._proportionallyResizeElements[e], !this.borderDif) for (this.borderDif = [], i = [n.css("borderTopWidth"), n.css("borderRightWidth"), n.css("borderBottomWidth"), n.css("borderLeftWidth")], s = [n.css("paddingTop"), n.css("paddingRight"), n.css("paddingBottom"), n.css("paddingLeft")], t = 0; i.length > t; t++) this.borderDif[t] = (parseInt(i[t], 10) || 0) + (parseInt(s[t], 10) || 0); n.css({ height: a.height() - this.borderDif[0] - this.borderDif[2] || 0, width: a.width() - this.borderDif[1] - this.borderDif[3] || 0 }) } } }, _renderProxy: function () { var t = this.element, i = this.options; this.elementOffset = t.offset(), this._helper ? (this.helper = this.helper || e("<div style='overflow:hidden;'></div>"), this.helper.addClass(this._helper).css({ width: this.element.outerWidth() - 1, height: this.element.outerHeight() - 1, position: "absolute", left: this.elementOffset.left + "px", top: this.elementOffset.top + "px", zIndex: ++i.zIndex }), this.helper.appendTo("body").disableSelection()) : this.helper = this.element }, _change: { e: function (e, t) { return { width: this.originalSize.width + t } }, w: function (e, t) { var i = this.originalSize, s = this.originalPosition; return { left: s.left + t, width: i.width - t } }, n: function (e, t, i) { var s = this.originalSize, n = this.originalPosition; return { top: n.top + i, height: s.height - i } }, s: function (e, t, i) { return { height: this.originalSize.height + i } }, se: function (t, i, s) { return e.extend(this._change.s.apply(this, arguments), this._change.e.apply(this, [t, i, s])) }, sw: function (t, i, s) { return e.extend(this._change.s.apply(this, arguments), this._change.w.apply(this, [t, i, s])) }, ne: function (t, i, s) { return e.extend(this._change.n.apply(this, arguments), this._change.e.apply(this, [t, i, s])) }, nw: function (t, i, s) { return e.extend(this._change.n.apply(this, arguments), this._change.w.apply(this, [t, i, s])) } }, _propagate: function (t, i) { e.ui.plugin.call(this, t, [i, this.ui()]), "resize" !== t && this._trigger(t, i, this.ui()) }, plugins: {}, ui: function () { return { originalElement: this.originalElement, element: this.element, helper: this.helper, position: this.position, size: this.size, originalSize: this.originalSize, originalPosition: this.originalPosition } } }), e.ui.plugin.add("resizable", "animate", { stop: function (t) { var i = e(this).data("ui-resizable"), s = i.options, n = i._proportionallyResizeElements, a = n.length && /textarea/i.test(n[0].nodeName), o = a && e.ui.hasScroll(n[0], "left") ? 0 : i.sizeDiff.height, r = a ? 0 : i.sizeDiff.width, h = { width: i.size.width - r, height: i.size.height - o }, l = parseInt(i.element.css("left"), 10) + (i.position.left - i.originalPosition.left) || null, u = parseInt(i.element.css("top"), 10) + (i.position.top - i.originalPosition.top) || null; i.element.animate(e.extend(h, u && l ? { top: u, left: l } : {}), { duration: s.animateDuration, easing: s.animateEasing, step: function () { var s = { width: parseInt(i.element.css("width"), 10), height: parseInt(i.element.css("height"), 10), top: parseInt(i.element.css("top"), 10), left: parseInt(i.element.css("left"), 10) }; n && n.length && e(n[0]).css({ width: s.width, height: s.height }), i._updateCache(s), i._propagate("resize", t) } }) } }), e.ui.plugin.add("resizable", "containment", { start: function () { var i, s, n, a, o, r, h, l = e(this).data("ui-resizable"), u = l.options, c = l.element, d = u.containment, p = d instanceof e ? d.get(0) : /parent/.test(d) ? c.parent().get(0) : d; p && (l.containerElement = e(p), /document/.test(d) || d === document ? (l.containerOffset = { left: 0, top: 0 }, l.containerPosition = { left: 0, top: 0 }, l.parentData = { element: e(document), left: 0, top: 0, width: e(document).width(), height: e(document).height() || document.body.parentNode.scrollHeight }) : (i = e(p), s = [], e(["Top", "Right", "Left", "Bottom"]).each(function (e, n) { s[e] = t(i.css("padding" + n)) }), l.containerOffset = i.offset(), l.containerPosition = i.position(), l.containerSize = { height: i.innerHeight() - s[3], width: i.innerWidth() - s[1] }, n = l.containerOffset, a = l.containerSize.height, o = l.containerSize.width, r = e.ui.hasScroll(p, "left") ? p.scrollWidth : o, h = e.ui.hasScroll(p) ? p.scrollHeight : a, l.parentData = { element: p, left: n.left, top: n.top, width: r, height: h })) }, resize: function (t) { var i, s, n, a, o = e(this).data("ui-resizable"), r = o.options, h = o.containerOffset, l = o.position, u = o._aspectRatio || t.shiftKey, c = { top: 0, left: 0 }, d = o.containerElement; d[0] !== document && /static/.test(d.css("position")) && (c = h), l.left < (o._helper ? h.left : 0) && (o.size.width = o.size.width + (o._helper ? o.position.left - h.left : o.position.left - c.left), u && (o.size.height = o.size.width / o.aspectRatio), o.position.left = r.helper ? h.left : 0), l.top < (o._helper ? h.top : 0) && (o.size.height = o.size.height + (o._helper ? o.position.top - h.top : o.position.top), u && (o.size.width = o.size.height * o.aspectRatio), o.position.top = o._helper ? h.top : 0), o.offset.left = o.parentData.left + o.position.left, o.offset.top = o.parentData.top + o.position.top, i = Math.abs((o._helper ? o.offset.left - c.left : o.offset.left - c.left) + o.sizeDiff.width), s = Math.abs((o._helper ? o.offset.top - c.top : o.offset.top - h.top) + o.sizeDiff.height), n = o.containerElement.get(0) === o.element.parent().get(0), a = /relative|absolute/.test(o.containerElement.css("position")), n && a && (i -= o.parentData.left), i + o.size.width >= o.parentData.width && (o.size.width = o.parentData.width - i, u && (o.size.height = o.size.width / o.aspectRatio)), s + o.size.height >= o.parentData.height && (o.size.height = o.parentData.height - s, u && (o.size.width = o.size.height * o.aspectRatio)) }, stop: function () { var t = e(this).data("ui-resizable"), i = t.options, s = t.containerOffset, n = t.containerPosition, a = t.containerElement, o = e(t.helper), r = o.offset(), h = o.outerWidth() - t.sizeDiff.width, l = o.outerHeight() - t.sizeDiff.height; t._helper && !i.animate && /relative/.test(a.css("position")) && e(this).css({ left: r.left - n.left - s.left, width: h, height: l }), t._helper && !i.animate && /static/.test(a.css("position")) && e(this).css({ left: r.left - n.left - s.left, width: h, height: l }) } }), e.ui.plugin.add("resizable", "alsoResize", { start: function () { var t = e(this).data("ui-resizable"), i = t.options, s = function (t) { e(t).each(function () { var t = e(this); t.data("ui-resizable-alsoresize", { width: parseInt(t.width(), 10), height: parseInt(t.height(), 10), left: parseInt(t.css("left"), 10), top: parseInt(t.css("top"), 10) }) }) }; "object" != typeof i.alsoResize || i.alsoResize.parentNode ? s(i.alsoResize) : i.alsoResize.length ? (i.alsoResize = i.alsoResize[0], s(i.alsoResize)) : e.each(i.alsoResize, function (e) { s(e) }) }, resize: function (t, i) { var s = e(this).data("ui-resizable"), n = s.options, a = s.originalSize, o = s.originalPosition, r = { height: s.size.height - a.height || 0, width: s.size.width - a.width || 0, top: s.position.top - o.top || 0, left: s.position.left - o.left || 0 }, h = function (t, s) { e(t).each(function () { var t = e(this), n = e(this).data("ui-resizable-alsoresize"), a = {}, o = s && s.length ? s : t.parents(i.originalElement[0]).length ? ["width", "height"] : ["width", "height", "top", "left"]; e.each(o, function (e, t) { var i = (n[t] || 0) + (r[t] || 0); i && i >= 0 && (a[t] = i || null) }), t.css(a) }) }; "object" != typeof n.alsoResize || n.alsoResize.nodeType ? h(n.alsoResize) : e.each(n.alsoResize, function (e, t) { h(e, t) }) }, stop: function () { e(this).removeData("resizable-alsoresize") } }), e.ui.plugin.add("resizable", "ghost", { start: function () { var t = e(this).data("ui-resizable"), i = t.options, s = t.size; t.ghost = t.originalElement.clone(), t.ghost.css({ opacity: .25, display: "block", position: "relative", height: s.height, width: s.width, margin: 0, left: 0, top: 0 }).addClass("ui-resizable-ghost").addClass("string" == typeof i.ghost ? i.ghost : ""), t.ghost.appendTo(t.helper) }, resize: function () { var t = e(this).data("ui-resizable"); t.ghost && t.ghost.css({ position: "relative", height: t.size.height, width: t.size.width }) }, stop: function () { var t = e(this).data("ui-resizable"); t.ghost && t.helper && t.helper.get(0).removeChild(t.ghost.get(0)) } }), e.ui.plugin.add("resizable", "grid", { resize: function () { var t = e(this).data("ui-resizable"), i = t.options, s = t.size, n = t.originalSize, a = t.originalPosition, o = t.axis, r = "number" == typeof i.grid ? [i.grid, i.grid] : i.grid, h = r[0] || 1, l = r[1] || 1, u = Math.round((s.width - n.width) / h) * h, c = Math.round((s.height - n.height) / l) * l, d = n.width + u, p = n.height + c, f = i.maxWidth && d > i.maxWidth, m = i.maxHeight && p > i.maxHeight, g = i.minWidth && i.minWidth > d, v = i.minHeight && i.minHeight > p; i.grid = r, g && (d += h), v && (p += l), f && (d -= h), m && (p -= l), /^(se|s|e)$/.test(o) ? (t.size.width = d, t.size.height = p) : /^(ne)$/.test(o) ? (t.size.width = d, t.size.height = p, t.position.top = a.top - c) : /^(sw)$/.test(o) ? (t.size.width = d, t.size.height = p, t.position.left = a.left - u) : (t.size.width = d, t.size.height = p, t.position.top = a.top - c, t.position.left = a.left - u) } }) })(jQuery); (function (t) { var e = 0, i = {}, s = {}; i.height = i.paddingTop = i.paddingBottom = i.borderTopWidth = i.borderBottomWidth = "hide", s.height = s.paddingTop = s.paddingBottom = s.borderTopWidth = s.borderBottomWidth = "show", t.widget("ui.accordion", { version: "1.10.3", options: { active: 0, animate: {}, collapsible: !1, event: "click", header: "> li > :first-child,> :not(li):even", heightStyle: "auto", icons: { activeHeader: "ui-icon-triangle-1-s", header: "ui-icon-triangle-1-e" }, activate: null, beforeActivate: null }, _create: function () { var e = this.options; this.prevShow = this.prevHide = t(), this.element.addClass("ui-accordion ui-widget ui-helper-reset").attr("role", "tablist"), e.collapsible || e.active !== !1 && null != e.active || (e.active = 0), this._processPanels(), 0 > e.active && (e.active += this.headers.length), this._refresh() }, _getCreateEventData: function () { return { header: this.active, panel: this.active.length ? this.active.next() : t(), content: this.active.length ? this.active.next() : t() } }, _createIcons: function () { var e = this.options.icons; e && (t("<span>").addClass("ui-accordion-header-icon ui-icon " + e.header).prependTo(this.headers), this.active.children(".ui-accordion-header-icon").removeClass(e.header).addClass(e.activeHeader), this.headers.addClass("ui-accordion-icons")) }, _destroyIcons: function () { this.headers.removeClass("ui-accordion-icons").children(".ui-accordion-header-icon").remove() }, _destroy: function () { var t; this.element.removeClass("ui-accordion ui-widget ui-helper-reset").removeAttr("role"), this.headers.removeClass("ui-accordion-header ui-accordion-header-active ui-helper-reset ui-state-default ui-corner-all ui-state-active ui-state-disabled ui-corner-top").removeAttr("role").removeAttr("aria-selected").removeAttr("aria-controls").removeAttr("tabIndex").each(function () { /^ui-accordion/.test(this.id) && this.removeAttribute("id") }), this._destroyIcons(), t = this.headers.next().css("display", "").removeAttr("role").removeAttr("aria-expanded").removeAttr("aria-hidden").removeAttr("aria-labelledby").removeClass("ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content ui-accordion-content-active ui-state-disabled").each(function () { /^ui-accordion/.test(this.id) && this.removeAttribute("id") }), "content" !== this.options.heightStyle && t.css("height", "") }, _setOption: function (t, e) { return "active" === t ? (this._activate(e), undefined) : ("event" === t && (this.options.event && this._off(this.headers, this.options.event), this._setupEvents(e)), this._super(t, e), "collapsible" !== t || e || this.options.active !== !1 || this._activate(0), "icons" === t && (this._destroyIcons(), e && this._createIcons()), "disabled" === t && this.headers.add(this.headers.next()).toggleClass("ui-state-disabled", !!e), undefined) }, _keydown: function (e) { if (!e.altKey && !e.ctrlKey) { var i = t.ui.keyCode, s = this.headers.length, n = this.headers.index(e.target), a = !1; switch (e.keyCode) { case i.RIGHT: case i.DOWN: a = this.headers[(n + 1) % s]; break; case i.LEFT: case i.UP: a = this.headers[(n - 1 + s) % s]; break; case i.SPACE: case i.ENTER: this._eventHandler(e); break; case i.HOME: a = this.headers[0]; break; case i.END: a = this.headers[s - 1] } a && (t(e.target).attr("tabIndex", -1), t(a).attr("tabIndex", 0), a.focus(), e.preventDefault()) } }, _panelKeyDown: function (e) { e.keyCode === t.ui.keyCode.UP && e.ctrlKey && t(e.currentTarget).prev().focus() }, refresh: function () { var e = this.options; this._processPanels(), e.active === !1 && e.collapsible === !0 || !this.headers.length ? (e.active = !1, this.active = t()) : e.active === !1 ? this._activate(0) : this.active.length && !t.contains(this.element[0], this.active[0]) ? this.headers.length === this.headers.find(".ui-state-disabled").length ? (e.active = !1, this.active = t()) : this._activate(Math.max(0, e.active - 1)) : e.active = this.headers.index(this.active), this._destroyIcons(), this._refresh() }, _processPanels: function () { this.headers = this.element.find(this.options.header).addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-all"), this.headers.next().addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").filter(":not(.ui-accordion-content-active)").hide() }, _refresh: function () { var i, s = this.options, n = s.heightStyle, a = this.element.parent(), o = this.accordionId = "ui-accordion-" + (this.element.attr("id") || ++e); this.active = this._findActive(s.active).addClass("ui-accordion-header-active ui-state-active ui-corner-top").removeClass("ui-corner-all"), this.active.next().addClass("ui-accordion-content-active").show(), this.headers.attr("role", "tab").each(function (e) { var i = t(this), s = i.attr("id"), n = i.next(), a = n.attr("id"); s || (s = o + "-header-" + e, i.attr("id", s)), a || (a = o + "-panel-" + e, n.attr("id", a)), i.attr("aria-controls", a), n.attr("aria-labelledby", s) }).next().attr("role", "tabpanel"), this.headers.not(this.active).attr({ "aria-selected": "false", tabIndex: -1 }).next().attr({ "aria-expanded": "false", "aria-hidden": "true" }).hide(), this.active.length ? this.active.attr({ "aria-selected": "true", tabIndex: 0 }).next().attr({ "aria-expanded": "true", "aria-hidden": "false" }) : this.headers.eq(0).attr("tabIndex", 0), this._createIcons(), this._setupEvents(s.event), "fill" === n ? (i = a.height(), this.element.siblings(":visible").each(function () { var e = t(this), s = e.css("position"); "absolute" !== s && "fixed" !== s && (i -= e.outerHeight(!0)) }), this.headers.each(function () { i -= t(this).outerHeight(!0) }), this.headers.next().each(function () { t(this).height(Math.max(0, i - t(this).innerHeight() + t(this).height())) }).css("overflow", "auto")) : "auto" === n && (i = 0, this.headers.next().each(function () { i = Math.max(i, t(this).css("height", "").height()) }).height(i)) }, _activate: function (e) { var i = this._findActive(e)[0]; i !== this.active[0] && (i = i || this.active[0], this._eventHandler({ target: i, currentTarget: i, preventDefault: t.noop })) }, _findActive: function (e) { return "number" == typeof e ? this.headers.eq(e) : t() }, _setupEvents: function (e) { var i = { keydown: "_keydown" }; e && t.each(e.split(" "), function (t, e) { i[e] = "_eventHandler" }), this._off(this.headers.add(this.headers.next())), this._on(this.headers, i), this._on(this.headers.next(), { keydown: "_panelKeyDown" }), this._hoverable(this.headers), this._focusable(this.headers) }, _eventHandler: function (e) { var i = this.options, s = this.active, n = t(e.currentTarget), a = n[0] === s[0], o = a && i.collapsible, r = o ? t() : n.next(), h = s.next(), l = { oldHeader: s, oldPanel: h, newHeader: o ? t() : n, newPanel: r }; e.preventDefault(), a && !i.collapsible || this._trigger("beforeActivate", e, l) === !1 || (i.active = o ? !1 : this.headers.index(n), this.active = a ? t() : n, this._toggle(l), s.removeClass("ui-accordion-header-active ui-state-active"), i.icons && s.children(".ui-accordion-header-icon").removeClass(i.icons.activeHeader).addClass(i.icons.header), a || (n.removeClass("ui-corner-all").addClass("ui-accordion-header-active ui-state-active ui-corner-top"), i.icons && n.children(".ui-accordion-header-icon").removeClass(i.icons.header).addClass(i.icons.activeHeader), n.next().addClass("ui-accordion-content-active"))) }, _toggle: function (e) { var i = e.newPanel, s = this.prevShow.length ? this.prevShow : e.oldPanel; this.prevShow.add(this.prevHide).stop(!0, !0), this.prevShow = i, this.prevHide = s, this.options.animate ? this._animate(i, s, e) : (s.hide(), i.show(), this._toggleComplete(e)), s.attr({ "aria-expanded": "false", "aria-hidden": "true" }), s.prev().attr("aria-selected", "false"), i.length && s.length ? s.prev().attr("tabIndex", -1) : i.length && this.headers.filter(function () { return 0 === t(this).attr("tabIndex") }).attr("tabIndex", -1), i.attr({ "aria-expanded": "true", "aria-hidden": "false" }).prev().attr({ "aria-selected": "true", tabIndex: 0 }) }, _animate: function (t, e, n) { var a, o, r, h = this, l = 0, c = t.length && (!e.length || t.index() < e.index()), u = this.options.animate || {}, d = c && u.down || u, p = function () { h._toggleComplete(n) }; return "number" == typeof d && (r = d), "string" == typeof d && (o = d), o = o || d.easing || u.easing, r = r || d.duration || u.duration, e.length ? t.length ? (a = t.show().outerHeight(), e.animate(i, { duration: r, easing: o, step: function (t, e) { e.now = Math.round(t) } }), t.hide().animate(s, { duration: r, easing: o, complete: p, step: function (t, i) { i.now = Math.round(t), "height" !== i.prop ? l += i.now : "content" !== h.options.heightStyle && (i.now = Math.round(a - e.outerHeight() - l), l = 0) } }), undefined) : e.animate(i, r, o, p) : t.animate(s, r, o, p) }, _toggleComplete: function (t) { var e = t.oldPanel; e.removeClass("ui-accordion-content-active").prev().removeClass("ui-corner-top").addClass("ui-corner-all"), e.length && (e.parent()[0].className = e.parent()[0].className), this._trigger("activate", null, t) } }) })(jQuery); (function (t) { var e = 0; t.widget("ui.autocomplete", { version: "1.10.3", defaultElement: "<input>", options: { appendTo: null, autoFocus: !1, delay: 300, minLength: 1, position: { my: "left top", at: "left bottom", collision: "none" }, source: null, change: null, close: null, focus: null, open: null, response: null, search: null, select: null }, pending: 0, _create: function () { var e, i, s, n = this.element[0].nodeName.toLowerCase(), a = "textarea" === n, o = "input" === n; this.isMultiLine = a ? !0 : o ? !1 : this.element.prop("isContentEditable"), this.valueMethod = this.element[a || o ? "val" : "text"], this.isNewMenu = !0, this.element.addClass("ui-autocomplete-input").attr("autocomplete", "off"), this._on(this.element, { keydown: function (n) { if (this.element.prop("readOnly")) return e = !0, s = !0, i = !0, undefined; e = !1, s = !1, i = !1; var a = t.ui.keyCode; switch (n.keyCode) { case a.PAGE_UP: e = !0, this._move("previousPage", n); break; case a.PAGE_DOWN: e = !0, this._move("nextPage", n); break; case a.UP: e = !0, this._keyEvent("previous", n); break; case a.DOWN: e = !0, this._keyEvent("next", n); break; case a.ENTER: case a.NUMPAD_ENTER: this.menu.active && (e = !0, n.preventDefault(), this.menu.select(n)); break; case a.TAB: this.menu.active && this.menu.select(n); break; case a.ESCAPE: this.menu.element.is(":visible") && (this._value(this.term), this.close(n), n.preventDefault()); break; default: i = !0, this._searchTimeout(n) } }, keypress: function (s) { if (e) return e = !1, (!this.isMultiLine || this.menu.element.is(":visible")) && s.preventDefault(), undefined; if (!i) { var n = t.ui.keyCode; switch (s.keyCode) { case n.PAGE_UP: this._move("previousPage", s); break; case n.PAGE_DOWN: this._move("nextPage", s); break; case n.UP: this._keyEvent("previous", s); break; case n.DOWN: this._keyEvent("next", s) } } }, input: function (t) { return s ? (s = !1, t.preventDefault(), undefined) : (this._searchTimeout(t), undefined) }, focus: function () { this.selectedItem = null, this.previous = this._value() }, blur: function (t) { return this.cancelBlur ? (delete this.cancelBlur, undefined) : (clearTimeout(this.searching), this.close(t), this._change(t), undefined) } }), this._initSource(), this.menu = t("<ul>").addClass("ui-autocomplete ui-front").appendTo(this._appendTo()).menu({ role: null }).hide().data("ui-menu"), this._on(this.menu.element, { mousedown: function (e) { e.preventDefault(), this.cancelBlur = !0, this._delay(function () { delete this.cancelBlur }); var i = this.menu.element[0]; t(e.target).closest(".ui-menu-item").length || this._delay(function () { var e = this; this.document.one("mousedown", function (s) { s.target === e.element[0] || s.target === i || t.contains(i, s.target) || e.close() }) }) }, menufocus: function (e, i) { if (this.isNewMenu && (this.isNewMenu = !1, e.originalEvent && /^mouse/.test(e.originalEvent.type))) return this.menu.blur(), this.document.one("mousemove", function () { t(e.target).trigger(e.originalEvent) }), undefined; var s = i.item.data("ui-autocomplete-item"); !1 !== this._trigger("focus", e, { item: s }) ? e.originalEvent && /^key/.test(e.originalEvent.type) && this._value(s.value) : this.liveRegion.text(s.value) }, menuselect: function (t, e) { var i = e.item.data("ui-autocomplete-item"), s = this.previous; this.element[0] !== this.document[0].activeElement && (this.element.focus(), this.previous = s, this._delay(function () { this.previous = s, this.selectedItem = i })), !1 !== this._trigger("select", t, { item: i }) && this._value(i.value), this.term = this._value(), this.close(t), this.selectedItem = i } }), this.liveRegion = t("<span>", { role: "status", "aria-live": "polite" }).addClass("ui-helper-hidden-accessible").insertBefore(this.element), this._on(this.window, { beforeunload: function () { this.element.removeAttr("autocomplete") } }) }, _destroy: function () { clearTimeout(this.searching), this.element.removeClass("ui-autocomplete-input").removeAttr("autocomplete"), this.menu.element.remove(), this.liveRegion.remove() }, _setOption: function (t, e) { this._super(t, e), "source" === t && this._initSource(), "appendTo" === t && this.menu.element.appendTo(this._appendTo()), "disabled" === t && e && this.xhr && this.xhr.abort() }, _appendTo: function () { var e = this.options.appendTo; return e && (e = e.jquery || e.nodeType ? t(e) : this.document.find(e).eq(0)), e || (e = this.element.closest(".ui-front")), e.length || (e = this.document[0].body), e }, _initSource: function () { var e, i, s = this; t.isArray(this.options.source) ? (e = this.options.source, this.source = function (i, s) { s(t.ui.autocomplete.filter(e, i.term)) }) : "string" == typeof this.options.source ? (i = this.options.source, this.source = function (e, n) { s.xhr && s.xhr.abort(), s.xhr = t.ajax({ url:i, data: e, dataType: "json", success: function (t) { n(t) }, error: function () { n([]) } }) }) : this.source = this.options.source }, _searchTimeout: function (t) { clearTimeout(this.searching), this.searching = this._delay(function () { this.term !== this._value() && (this.selectedItem = null, this.search(null, t)) }, this.options.delay) }, search: function (t, e) { return t = null != t ? t : this._value(), this.term = this._value(), t.length < this.options.minLength ? this.close(e) : this._trigger("search", e) !== !1 ? this._search(t) : undefined }, _search: function (t) { this.pending++, this.element.addClass("ui-autocomplete-loading"), this.cancelSearch = !1, this.source({ term: t }, this._response()) }, _response: function () { var t = this, i = ++e; return function (s) { i === e && t.__response(s), t.pending--, t.pending || t.element.removeClass("ui-autocomplete-loading") } }, __response: function (t) { t && (t = this._normalize(t)), this._trigger("response", null, { content: t }), !this.options.disabled && t && t.length && !this.cancelSearch ? (this._suggest(t), this._trigger("open")) : this._close() }, close: function (t) { this.cancelSearch = !0, this._close(t) }, _close: function (t) { this.menu.element.is(":visible") && (this.menu.element.hide(), this.menu.blur(), this.isNewMenu = !0, this._trigger("close", t)) }, _change: function (t) { this.previous !== this._value() && this._trigger("change", t, { item: this.selectedItem }) }, _normalize: function (e) { return e.length && e[0].label && e[0].value ? e : t.map(e, function (e) { return "string" == typeof e ? { label: e, value: e } : t.extend({ label: e.label || e.value, value: e.value || e.label }, e) }) }, _suggest: function (e) { var i = this.menu.element.empty(); this._renderMenu(i, e), this.isNewMenu = !0, this.menu.refresh(), i.show(), this._resizeMenu(), i.position(t.extend({ of: this.element }, this.options.position)), this.options.autoFocus && this.menu.next() }, _resizeMenu: function () { var t = this.menu.element; t.outerWidth(Math.max(t.width("").outerWidth() + 1, this.element.outerWidth())) }, _renderMenu: function (e, i) { var s = this; t.each(i, function (t, i) { s._renderItemData(e, i) }) }, _renderItemData: function (t, e) { return this._renderItem(t, e).data("ui-autocomplete-item", e) }, _renderItem: function (e, i) { return t("<li>").append(t("<a>").text(i.label)).appendTo(e) }, _move: function (t, e) { return this.menu.element.is(":visible") ? this.menu.isFirstItem() && /^previous/.test(t) || this.menu.isLastItem() && /^next/.test(t) ? (this._value(this.term), this.menu.blur(), undefined) : (this.menu[t](e), undefined) : (this.search(null, e), undefined) }, widget: function () { return this.menu.element }, _value: function () { return this.valueMethod.apply(this.element, arguments) }, _keyEvent: function (t, e) { (!this.isMultiLine || this.menu.element.is(":visible")) && (this._move(t, e), e.preventDefault()) } }), t.extend(t.ui.autocomplete, { escapeRegex: function (t) { return t.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, "\\$&") }, filter: function (e, i) { var s = RegExp(t.ui.autocomplete.escapeRegex(i), "i"); return t.grep(e, function (t) { return s.test(t.label || t.value || t) }) } }), t.widget("ui.autocomplete", t.ui.autocomplete, { options: { messages: { noResults: "No search results.", results: function (t) { return t + (t > 1 ? " results are" : " result is") + " available, use up and down arrow keys to navigate." } } }, __response: function (t) { var e; this._superApply(arguments), this.options.disabled || this.cancelSearch || (e = t && t.length ? this.options.messages.results(t.length) : this.options.messages.noResults, this.liveRegion.text(e)) } }) })(jQuery); (function (t) { var e, i, s, n, a = "ui-button ui-widget ui-state-default ui-corner-all", o = "ui-state-hover ui-state-active ", r = "ui-button-icons-only ui-button-icon-only ui-button-text-icons ui-button-text-icon-primary ui-button-text-icon-secondary ui-button-text-only", h = function () { var e = t(this); setTimeout(function () { e.find(":ui-button").button("refresh") }, 1) }, l = function (e) { var i = e.name, s = e.form, n = t([]); return i && (i = i.replace(/'/g, "\\'"), n = s ? t(s).find("[name='" + i + "']") : t("[name='" + i + "']", e.ownerDocument).filter(function () { return !this.form })), n }; t.widget("ui.button", { version: "1.10.3", defaultElement: "<button>", options: { disabled: null, text: !0, label: null, icons: { primary: null, secondary: null } }, _create: function () { this.element.closest("form").unbind("reset" + this.eventNamespace).bind("reset" + this.eventNamespace, h), "boolean" != typeof this.options.disabled ? this.options.disabled = !!this.element.prop("disabled") : this.element.prop("disabled", this.options.disabled), this._determineButtonType(), this.hasTitle = !!this.buttonElement.attr("title"); var o = this, r = this.options, c = "checkbox" === this.type || "radio" === this.type, u = c ? "" : "ui-state-active", d = "ui-state-focus"; null === r.label && (r.label = "input" === this.type ? this.buttonElement.val() : this.buttonElement.html()), this._hoverable(this.buttonElement), this.buttonElement.addClass(a).attr("role", "button").bind("mouseenter" + this.eventNamespace, function () { r.disabled || this === e && t(this).addClass("ui-state-active") }).bind("mouseleave" + this.eventNamespace, function () { r.disabled || t(this).removeClass(u) }).bind("click" + this.eventNamespace, function (t) { r.disabled && (t.preventDefault(), t.stopImmediatePropagation()) }), this.element.bind("focus" + this.eventNamespace, function () { o.buttonElement.addClass(d) }).bind("blur" + this.eventNamespace, function () { o.buttonElement.removeClass(d) }), c && (this.element.bind("change" + this.eventNamespace, function () { n || o.refresh() }), this.buttonElement.bind("mousedown" + this.eventNamespace, function (t) { r.disabled || (n = !1, i = t.pageX, s = t.pageY) }).bind("mouseup" + this.eventNamespace, function (t) { r.disabled || (i !== t.pageX || s !== t.pageY) && (n = !0) })), "checkbox" === this.type ? this.buttonElement.bind("click" + this.eventNamespace, function () { return r.disabled || n ? !1 : undefined }) : "radio" === this.type ? this.buttonElement.bind("click" + this.eventNamespace, function () { if (r.disabled || n) return !1; t(this).addClass("ui-state-active"), o.buttonElement.attr("aria-pressed", "true"); var e = o.element[0]; l(e).not(e).map(function () { return t(this).button("widget")[0] }).removeClass("ui-state-active").attr("aria-pressed", "false") }) : (this.buttonElement.bind("mousedown" + this.eventNamespace, function () { return r.disabled ? !1 : (t(this).addClass("ui-state-active"), e = this, o.document.one("mouseup", function () { e = null }), undefined) }).bind("mouseup" + this.eventNamespace, function () { return r.disabled ? !1 : (t(this).removeClass("ui-state-active"), undefined) }).bind("keydown" + this.eventNamespace, function (e) { return r.disabled ? !1 : ((e.keyCode === t.ui.keyCode.SPACE || e.keyCode === t.ui.keyCode.ENTER) && t(this).addClass("ui-state-active"), undefined) }).bind("keyup" + this.eventNamespace + " blur" + this.eventNamespace, function () { t(this).removeClass("ui-state-active") }), this.buttonElement.is("a") && this.buttonElement.keyup(function (e) { e.keyCode === t.ui.keyCode.SPACE && t(this).click() })), this._setOption("disabled", r.disabled), this._resetButton() }, _determineButtonType: function () { var t, e, i; this.type = this.element.is("[type=checkbox]") ? "checkbox" : this.element.is("[type=radio]") ? "radio" : this.element.is("input") ? "input" : "button", "checkbox" === this.type || "radio" === this.type ? (t = this.element.parents().last(), e = "label[for='" + this.element.attr("id") + "']", this.buttonElement = t.find(e), this.buttonElement.length || (t = t.length ? t.siblings() : this.element.siblings(), this.buttonElement = t.filter(e), this.buttonElement.length || (this.buttonElement = t.find(e))), this.element.addClass("ui-helper-hidden-accessible"), i = this.element.is(":checked"), i && this.buttonElement.addClass("ui-state-active"), this.buttonElement.prop("aria-pressed", i)) : this.buttonElement = this.element }, widget: function () { return this.buttonElement }, _destroy: function () { this.element.removeClass("ui-helper-hidden-accessible"), this.buttonElement.removeClass(a + " " + o + " " + r).removeAttr("role").removeAttr("aria-pressed").html(this.buttonElement.find(".ui-button-text").html()), this.hasTitle || this.buttonElement.removeAttr("title") }, _setOption: function (t, e) { return this._super(t, e), "disabled" === t ? (e ? this.element.prop("disabled", !0) : this.element.prop("disabled", !1), undefined) : (this._resetButton(), undefined) }, refresh: function () { var e = this.element.is("input, button") ? this.element.is(":disabled") : this.element.hasClass("ui-button-disabled"); e !== this.options.disabled && this._setOption("disabled", e), "radio" === this.type ? l(this.element[0]).each(function () { t(this).is(":checked") ? t(this).button("widget").addClass("ui-state-active").attr("aria-pressed", "true") : t(this).button("widget").removeClass("ui-state-active").attr("aria-pressed", "false") }) : "checkbox" === this.type && (this.element.is(":checked") ? this.buttonElement.addClass("ui-state-active").attr("aria-pressed", "true") : this.buttonElement.removeClass("ui-state-active").attr("aria-pressed", "false")) }, _resetButton: function () { if ("input" === this.type) return this.options.label && this.element.val(this.options.label), undefined; var e = this.buttonElement.removeClass(r), i = t("<span></span>", this.document[0]).addClass("ui-button-text").html(this.options.label).appendTo(e.empty()).text(), s = this.options.icons, n = s.primary && s.secondary, a = []; s.primary || s.secondary ? (this.options.text && a.push("ui-button-text-icon" + (n ? "s" : s.primary ? "-primary" : "-secondary")), s.primary && e.prepend("<span class='ui-button-icon-primary ui-icon " + s.primary + "'></span>"), s.secondary && e.append("<span class='ui-button-icon-secondary ui-icon " + s.secondary + "'></span>"), this.options.text || (a.push(n ? "ui-button-icons-only" : "ui-button-icon-only"), this.hasTitle || e.attr("title", t.trim(i)))) : a.push("ui-button-text-only"), e.addClass(a.join(" ")) } }), t.widget("ui.buttonset", { version: "1.10.3", options: { items: "button, input[type=button], input[type=submit], input[type=reset], input[type=checkbox], input[type=radio], a, :data(ui-button)" }, _create: function () { this.element.addClass("ui-buttonset") }, _init: function () { this.refresh() }, _setOption: function (t, e) { "disabled" === t && this.buttons.button("option", t, e), this._super(t, e) }, refresh: function () { var e = "rtl" === this.element.css("direction"); this.buttons = this.element.find(this.options.items).filter(":ui-button").button("refresh").end().not(":ui-button").button().end().map(function () { return t(this).button("widget")[0] }).removeClass("ui-corner-all ui-corner-left ui-corner-right").filter(":first").addClass(e ? "ui-corner-right" : "ui-corner-left").end().filter(":last").addClass(e ? "ui-corner-left" : "ui-corner-right").end().end() }, _destroy: function () { this.element.removeClass("ui-buttonset"), this.buttons.map(function () { return t(this).button("widget")[0] }).removeClass("ui-corner-left ui-corner-right").end().button("destroy") } }) })(jQuery); (function (t, e) {
    function i() { this._curInst = null, this._keyEvent = !1, this._disabledInputs = [], this._datepickerShowing = !1, this._inDialog = !1, this._mainDivId = "ui-datepicker-div", this._inlineClass = "ui-datepicker-inline", this._appendClass = "ui-datepicker-append", this._triggerClass = "ui-datepicker-trigger", this._dialogClass = "ui-datepicker-dialog", this._disableClass = "ui-datepicker-disabled", this._unselectableClass = "ui-datepicker-unselectable", this._currentClass = "ui-datepicker-current-day", this._dayOverClass = "ui-datepicker-days-cell-over", this.regional = [], this.regional[""] = { closeText: "Done", prevText: "Prev", nextText: "Next", currentText: "Today", monthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"], monthNamesShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"], dayNames: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"], dayNamesShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"], dayNamesMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"], weekHeader: "Wk", dateFormat:"mm/dd/yy", firstDay: 0, isRTL: !1, showMonthAfterYear: !1, yearSuffix: "" }, this._defaults = { showOn: "focus", showAnim: "fadeIn", showOptions: {}, defaultDate: null, appendText: "", buttonText: "...", buttonImage: "", buttonImageOnly: !1, hideIfNoPrevNext: !1, navigationAsdateFormat:!1, gotoCurrent: !1, changeMonth: !1, changeYear: !1, yearRange: "c-10:c+10", showOtherMonths: !1, selectOtherMonths: !1, showWeek: !1, calculateWeek: this.iso8601Week, shortYearCutoff: "+10", minDate: null, maxDate: null, duration: "fast", beforeShowDay: null, beforeShow: null, onSelect: null, onChangeMonthYear: null, onClose: null, numberOfMonths: 1, showCurrentAtPos: 0, stepMonths: 1, stepBigMonths: 12, altField: "", altFormat: "", constrainInput: !0, showButtonPanel: !1, autoSize: !1, disabled: !1 }, t.extend(this._defaults, this.regional[""]), this.dpDiv = s(t("<div id='" + this._mainDivId + "' class='ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all'></div>")) } function s(e) { var i = "button, .ui-datepicker-prev, .ui-datepicker-next, .ui-datepicker-calendar td a"; return e.delegate(i, "mouseout", function () { t(this).removeClass("ui-state-hover"), -1 !== this.className.indexOf("ui-datepicker-prev") && t(this).removeClass("ui-datepicker-prev-hover"), -1 !== this.className.indexOf("ui-datepicker-next") && t(this).removeClass("ui-datepicker-next-hover") }).delegate(i, "mouseover", function () { t.datepicker._isDisabledDatepicker(a.inline ? e.parent()[0] : a.input[0]) || (t(this).parents(".ui-datepicker-calendar").find("a").removeClass("ui-state-hover"), t(this).addClass("ui-state-hover"), -1 !== this.className.indexOf("ui-datepicker-prev") && t(this).addClass("ui-datepicker-prev-hover"), -1 !== this.className.indexOf("ui-datepicker-next") && t(this).addClass("ui-datepicker-next-hover")) }) } function n(e, i) { t.extend(e, i); for (var s in i) null == i[s] && (e[s] = i[s]); return e } t.extend(t.ui, { datepicker: { version: "1.10.3" } }); var a, r = "datepicker"; t.extend(i.prototype, {
        markerClassName: "hasDatepicker", maxRows: 4, _widgetDatepicker: function () { return this.dpDiv }, setDefaults: function (t) { return n(this._defaults, t || {}), this }, _attachDatepicker: function (e, i) { var s, n, a; s = e.nodeName.toLowerCase(), n = "div" === s || "span" === s, e.id || (this.uuid += 1, e.id = "dp" + this.uuid), a = this._newInst(t(e), n), a.settings = t.extend({}, i || {}), "input" === s ? this._connectDatepicker(e, a) : n && this._inlineDatepicker(e, a) }, _newInst: function (e, i) { var n = e[0].id.replace(/([^A-Za-z0-9_\-])/g, "\\\\$1"); return { id: n, input: e, selectedDay: 0, selectedMonth: 0, selectedYear: 0, drawMonth: 0, drawYear: 0, inline: i, dpDiv: i ? s(t("<div class='" + this._inlineClass + " ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all'></div>")) : this.dpDiv } }, _connectDatepicker: function (e, i) { var s = t(e); i.append = t([]), i.trigger = t([]), s.hasClass(this.markerClassName) || (this._attachments(s, i), s.addClass(this.markerClassName).keydown(this._doKeyDown).keypress(this._doKeyPress).keyup(this._doKeyUp), this._autoSize(i), t.data(e, r, i), i.settings.disabled && this._disableDatepicker(e)) }, _attachments: function (e, i) { var s, n, a, r = this._get(i, "appendText"), o = this._get(i, "isRTL"); i.append && i.append.remove(), r && (i.append = t("<span class='" + this._appendClass + "'>" + r + "</span>"), e[o ? "before" : "after"](i.append)), e.unbind("focus", this._showDatepicker), i.trigger && i.trigger.remove(), s = this._get(i, "showOn"), ("focus" === s || "both" === s) && e.focus(this._showDatepicker), ("button" === s || "both" === s) && (n = this._get(i, "buttonText"), a = this._get(i, "buttonImage"), i.trigger = t(this._get(i, "buttonImageOnly") ? t("<img/>").addClass(this._triggerClass).attr({ src: a, alt: n, title: n }) : t("<button type='button'></button>").addClass(this._triggerClass).html(a ? t("<img/>").attr({ src: a, alt: n, title: n }) : n)), e[o ? "before" : "after"](i.trigger), i.trigger.click(function () { return t.datepicker._datepickerShowing && t.datepicker._lastInput === e[0] ? t.datepicker._hideDatepicker() : t.datepicker._datepickerShowing && t.datepicker._lastInput !== e[0] ? (t.datepicker._hideDatepicker(), t.datepicker._showDatepicker(e[0])) : t.datepicker._showDatepicker(e[0]), !1 })) }, _autoSize: function (t) { if (this._get(t, "autoSize") && !t.inline) { var e, i, s, n, a = new Date(2009, 11, 20), r = this._get(t, "dateFormat"); r.match(/[DM]/) && (e = function (t) { for (i = 0, s = 0, n = 0; t.length > n; n++) t[n].length > i && (i = t[n].length, s = n); return s }, a.setMonth(e(this._get(t, r.match(/MM/) ? "monthNames" : "monthNamesShort"))), a.setDate(e(this._get(t, r.match(/DD/) ? "dayNames" : "dayNamesShort")) + 20 - a.getDay())), t.input.attr("size", this._formatDate(t, a).length) } }, _inlineDatepicker: function (e, i) { var s = t(e); s.hasClass(this.markerClassName) || (s.addClass(this.markerClassName).append(i.dpDiv), t.data(e, r, i), this._setDate(i, this._getDefaultDate(i), !0), this._updateDatepicker(i), this._updateAlternate(i), i.settings.disabled && this._disableDatepicker(e), i.dpDiv.css("display", "block")) }, _dialogDatepicker: function (e, i, s, a, o) { var h, l, c, u, d, p = this._dialogInst; return p || (this.uuid += 1, h = "dp" + this.uuid, this._dialogInput = t("<input type='text' id='" + h + "' style='position: absolute; top: -100px; width: 0px;'/>"), this._dialogInput.keydown(this._doKeyDown), t("body").append(this._dialogInput), p = this._dialogInst = this._newInst(this._dialogInput, !1), p.settings = {}, t.data(this._dialogInput[0], r, p)), n(p.settings, a || {}), i = i && i.constructor === Date ? this._formatDate(p, i) : i, this._dialogInput.val(i), this._pos = o ? o.length ? o : [o.pageX, o.pageY] : null, this._pos || (l = document.documentElement.clientWidth, c = document.documentElement.clientHeight, u = document.documentElement.scrollLeft || document.body.scrollLeft, d = document.documentElement.scrollTop || document.body.scrollTop, this._pos = [l / 2 - 100 + u, c / 2 - 150 + d]), this._dialogInput.css("left", this._pos[0] + 20 + "px").css("top", this._pos[1] + "px"), p.settings.onSelect = s, this._inDialog = !0, this.dpDiv.addClass(this._dialogClass), this._showDatepicker(this._dialogInput[0]), t.blockUI && t.blockUI(this.dpDiv), t.data(this._dialogInput[0], r, p), this }, _destroyDatepicker: function (e) { var i, s = t(e), n = t.data(e, r); s.hasClass(this.markerClassName) && (i = e.nodeName.toLowerCase(), t.removeData(e, r), "input" === i ? (n.append.remove(), n.trigger.remove(), s.removeClass(this.markerClassName).unbind("focus", this._showDatepicker).unbind("keydown", this._doKeyDown).unbind("keypress", this._doKeyPress).unbind("keyup", this._doKeyUp)) : ("div" === i || "span" === i) && s.removeClass(this.markerClassName).empty()) }, _enableDatepicker: function (e) { var i, s, n = t(e), a = t.data(e, r); n.hasClass(this.markerClassName) && (i = e.nodeName.toLowerCase(), "input" === i ? (e.disabled = !1, a.trigger.filter("button").each(function () { this.disabled = !1 }).end().filter("img").css({ opacity: "1.0", cursor: "" })) : ("div" === i || "span" === i) && (s = n.children("." + this._inlineClass), s.children().removeClass("ui-state-disabled"), s.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled", !1)), this._disabledInputs = t.map(this._disabledInputs, function (t) { return t === e ? null : t })) }, _disableDatepicker: function (e) { var i, s, n = t(e), a = t.data(e, r); n.hasClass(this.markerClassName) && (i = e.nodeName.toLowerCase(), "input" === i ? (e.disabled = !0, a.trigger.filter("button").each(function () { this.disabled = !0 }).end().filter("img").css({ opacity: "0.5", cursor: "default" })) : ("div" === i || "span" === i) && (s = n.children("." + this._inlineClass), s.children().addClass("ui-state-disabled"), s.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled", !0)), this._disabledInputs = t.map(this._disabledInputs, function (t) { return t === e ? null : t }), this._disabledInputs[this._disabledInputs.length] = e) }, _isDisabledDatepicker: function (t) { if (!t) return !1; for (var e = 0; this._disabledInputs.length > e; e++) if (this._disabledInputs[e] === t) return !0; return !1 }, _getInst: function (e) { try { return t.data(e, r) } catch (i) { throw "Missing instance data for this datepicker" } }, _optionDatepicker: function (i, s, a) { var r, o, h, l, c = this._getInst(i); return 2 === arguments.length && "string" == typeof s ? "defaults" === s ? t.extend({}, t.datepicker._defaults) : c ? "all" === s ? t.extend({}, c.settings) : this._get(c, s) : null : (r = s || {}, "string" == typeof s && (r = {}, r[s] = a), c && (this._curInst === c && this._hideDatepicker(), o = this._getDateDatepicker(i, !0), h = this._getMinMaxDate(c, "min"), l = this._getMinMaxDate(c, "max"), n(c.settings, r), null !== h && r.dateFormat !== e && r.minDate === e && (c.settings.minDate = this._formatDate(c, h)), null !== l && r.dateFormat !== e && r.maxDate === e && (c.settings.maxDate = this._formatDate(c, l)), "disabled" in r && (r.disabled ? this._disableDatepicker(i) : this._enableDatepicker(i)), this._attachments(t(i), c), this._autoSize(c), this._setDate(c, o), this._updateAlternate(c), this._updateDatepicker(c)), e) }, _changeDatepicker: function (t, e, i) { this._optionDatepicker(t, e, i) }, _refreshDatepicker: function (t) { var e = this._getInst(t); e && this._updateDatepicker(e) }, _setDateDatepicker: function (t, e) { var i = this._getInst(t); i && (this._setDate(i, e), this._updateDatepicker(i), this._updateAlternate(i)) }, _getDateDatepicker: function (t, e) { var i = this._getInst(t); return i && !i.inline && this._setDateFromField(i, e), i ? this._getDate(i) : null }, _doKeyDown: function (e) { var i, s, n, a = t.datepicker._getInst(e.target), r = !0, o = a.dpDiv.is(".ui-datepicker-rtl"); if (a._keyEvent = !0, t.datepicker._datepickerShowing) switch (e.keyCode) { case 9: t.datepicker._hideDatepicker(), r = !1; break; case 13: return n = t("td." + t.datepicker._dayOverClass + ":not(." + t.datepicker._currentClass + ")", a.dpDiv), n[0] && t.datepicker._selectDay(e.target, a.selectedMonth, a.selectedYear, n[0]), i = t.datepicker._get(a, "onSelect"), i ? (s = t.datepicker._formatDate(a), i.apply(a.input ? a.input[0] : null, [s, a])) : t.datepicker._hideDatepicker(), !1; case 27: t.datepicker._hideDatepicker(); break; case 33: t.datepicker._adjustDate(e.target, e.ctrlKey ? -t.datepicker._get(a, "stepBigMonths") : -t.datepicker._get(a, "stepMonths"), "M"); break; case 34: t.datepicker._adjustDate(e.target, e.ctrlKey ? +t.datepicker._get(a, "stepBigMonths") : +t.datepicker._get(a, "stepMonths"), "M"); break; case 35: (e.ctrlKey || e.metaKey) && t.datepicker._clearDate(e.target), r = e.ctrlKey || e.metaKey; break; case 36: (e.ctrlKey || e.metaKey) && t.datepicker._gotoToday(e.target), r = e.ctrlKey || e.metaKey; break; case 37: (e.ctrlKey || e.metaKey) && t.datepicker._adjustDate(e.target, o ? 1 : -1, "D"), r = e.ctrlKey || e.metaKey, e.originalEvent.altKey && t.datepicker._adjustDate(e.target, e.ctrlKey ? -t.datepicker._get(a, "stepBigMonths") : -t.datepicker._get(a, "stepMonths"), "M"); break; case 38: (e.ctrlKey || e.metaKey) && t.datepicker._adjustDate(e.target, -7, "D"), r = e.ctrlKey || e.metaKey; break; case 39: (e.ctrlKey || e.metaKey) && t.datepicker._adjustDate(e.target, o ? -1 : 1, "D"), r = e.ctrlKey || e.metaKey, e.originalEvent.altKey && t.datepicker._adjustDate(e.target, e.ctrlKey ? +t.datepicker._get(a, "stepBigMonths") : +t.datepicker._get(a, "stepMonths"), "M"); break; case 40: (e.ctrlKey || e.metaKey) && t.datepicker._adjustDate(e.target, 7, "D"), r = e.ctrlKey || e.metaKey; break; default: r = !1 } else 36 === e.keyCode && e.ctrlKey ? t.datepicker._showDatepicker(this) : r = !1; r && (e.preventDefault(), e.stopPropagation()) }, _doKeyPress: function (i) { var s, n, a = t.datepicker._getInst(i.target); return t.datepicker._get(a, "constrainInput") ? (s = t.datepicker._possibleChars(t.datepicker._get(a, "dateFormat")), n = String.fromCharCode(null == i.charCode ? i.keyCode : i.charCode), i.ctrlKey || i.metaKey || " " > n || !s || s.indexOf(n) > -1) : e }, _doKeyUp: function (e) { var i, s = t.datepicker._getInst(e.target); if (s.input.val() !== s.lastVal) try { i = t.datepicker.parseDate(t.datepicker._get(s, "dateFormat"), s.input ? s.input.val() : null, t.datepicker._getFormatConfig(s)), i && (t.datepicker._setDateFromField(s), t.datepicker._updateAlternate(s), t.datepicker._updateDatepicker(s)) } catch (n) { } return !0 }, _showDatepicker: function (e) { if (e = e.target || e, "input" !== e.nodeName.toLowerCase() && (e = t("input", e.parentNode)[0]), !t.datepicker._isDisabledDatepicker(e) && t.datepicker._lastInput !== e) { var i, s, a, r, o, h, l; i = t.datepicker._getInst(e), t.datepicker._curInst && t.datepicker._curInst !== i && (t.datepicker._curInst.dpDiv.stop(!0, !0), i && t.datepicker._datepickerShowing && t.datepicker._hideDatepicker(t.datepicker._curInst.input[0])), s = t.datepicker._get(i, "beforeShow"), a = s ? s.apply(e, [e, i]) : {}, a !== !1 && (n(i.settings, a), i.lastVal = null, t.datepicker._lastInput = e, t.datepicker._setDateFromField(i), t.datepicker._inDialog && (e.value = ""), t.datepicker._pos || (t.datepicker._pos = t.datepicker._findPos(e), t.datepicker._pos[1] += e.offsetHeight), r = !1, t(e).parents().each(function () { return r |= "fixed" === t(this).css("position"), !r }), o = { left: t.datepicker._pos[0], top: t.datepicker._pos[1] }, t.datepicker._pos = null, i.dpDiv.empty(), i.dpDiv.css({ position: "absolute", display: "block", top: "-1000px" }), t.datepicker._updateDatepicker(i), o = t.datepicker._checkOffset(i, o, r), i.dpDiv.css({ position: t.datepicker._inDialog && t.blockUI ? "static" : r ? "fixed" : "absolute", display: "none", left: o.left + "px", top: o.top + "px" }), i.inline || (h = t.datepicker._get(i, "showAnim"), l = t.datepicker._get(i, "duration"), i.dpDiv.zIndex(t(e).zIndex() + 1), t.datepicker._datepickerShowing = !0, t.effects && t.effects.effect[h] ? i.dpDiv.show(h, t.datepicker._get(i, "showOptions"), l) : i.dpDiv[h || "show"](h ? l : null), t.datepicker._shouldFocusInput(i) && i.input.focus(), t.datepicker._curInst = i)) } }, _updateDatepicker: function (e) { this.maxRows = 4, a = e, e.dpDiv.empty().append(this._generateHTML(e)), this._attachHandlers(e), e.dpDiv.find("." + this._dayOverClass + " a").mouseover(); var i, s = this._getNumberOfMonths(e), n = s[1], r = 17; e.dpDiv.removeClass("ui-datepicker-multi-2 ui-datepicker-multi-3 ui-datepicker-multi-4").width(""), n > 1 && e.dpDiv.addClass("ui-datepicker-multi-" + n).css("width", r * n + "em"), e.dpDiv[(1 !== s[0] || 1 !== s[1] ? "add" : "remove") + "Class"]("ui-datepicker-multi"), e.dpDiv[(this._get(e, "isRTL") ? "add" : "remove") + "Class"]("ui-datepicker-rtl"), e === t.datepicker._curInst && t.datepicker._datepickerShowing && t.datepicker._shouldFocusInput(e) && e.input.focus(), e.yearshtml && (i = e.yearshtml, setTimeout(function () { i === e.yearshtml && e.yearshtml && e.dpDiv.find("select.ui-datepicker-year:first").replaceWith(e.yearshtml), i = e.yearshtml = null }, 0)) }, _shouldFocusInput: function (t) { return t.input && t.input.is(":visible") && !t.input.is(":disabled") && !t.input.is(":focus") }, _checkOffset: function (e, i, s) { var n = e.dpDiv.outerWidth(), a = e.dpDiv.outerHeight(), r = e.input ? e.input.outerWidth() : 0, o = e.input ? e.input.outerHeight() : 0, h = document.documentElement.clientWidth + (s ? 0 : t(document).scrollLeft()), l = document.documentElement.clientHeight + (s ? 0 : t(document).scrollTop()); return i.left -= this._get(e, "isRTL") ? n - r : 0, i.left -= s && i.left === e.input.offset().left ? t(document).scrollLeft() : 0, i.top -= s && i.top === e.input.offset().top + o ? t(document).scrollTop() : 0, i.left -= Math.min(i.left, i.left + n > h && h > n ? Math.abs(i.left + n - h) : 0), i.top -= Math.min(i.top, i.top + a > l && l > a ? Math.abs(a + o) : 0), i }, _findPos: function (e) { for (var i, s = this._getInst(e), n = this._get(s, "isRTL") ; e && ("hidden" === e.type || 1 !== e.nodeType || t.expr.filters.hidden(e)) ;) e = e[n ? "previousSibling" : "nextSibling"]; return i = t(e).offset(), [i.left, i.top] }, _hideDatepicker: function (e) { var i, s, n, a, o = this._curInst; !o || e && o !== t.data(e, r) || this._datepickerShowing && (i = this._get(o, "showAnim"), s = this._get(o, "duration"), n = function () { t.datepicker._tidyDialog(o) }, t.effects && (t.effects.effect[i] || t.effects[i]) ? o.dpDiv.hide(i, t.datepicker._get(o, "showOptions"), s, n) : o.dpDiv["slideDown" === i ? "slideUp" : "fadeIn" === i ? "fadeOut" : "hide"](i ? s : null, n), i || n(), this._datepickerShowing = !1, a = this._get(o, "onClose"), a && a.apply(o.input ? o.input[0] : null, [o.input ? o.input.val() : "", o]), this._lastInput = null, this._inDialog && (this._dialogInput.css({ position: "absolute", left: "0", top: "-100px" }), t.blockUI && (t.unblockUI(), t("body").append(this.dpDiv))), this._inDialog = !1) }, _tidyDialog: function (t) { t.dpDiv.removeClass(this._dialogClass).unbind(".ui-datepicker-calendar") }, _checkExternalClick: function (e) { if (t.datepicker._curInst) { var i = t(e.target), s = t.datepicker._getInst(i[0]); (i[0].id !== t.datepicker._mainDivId && 0 === i.parents("#" + t.datepicker._mainDivId).length && !i.hasClass(t.datepicker.markerClassName) && !i.closest("." + t.datepicker._triggerClass).length && t.datepicker._datepickerShowing && (!t.datepicker._inDialog || !t.blockUI) || i.hasClass(t.datepicker.markerClassName) && t.datepicker._curInst !== s) && t.datepicker._hideDatepicker() } }, _adjustDate: function (e, i, s) { var n = t(e), a = this._getInst(n[0]); this._isDisabledDatepicker(n[0]) || (this._adjustInstDate(a, i + ("M" === s ? this._get(a, "showCurrentAtPos") : 0), s), this._updateDatepicker(a)) }, _gotoToday: function (e) { var i, s = t(e), n = this._getInst(s[0]); this._get(n, "gotoCurrent") && n.currentDay ? (n.selectedDay = n.currentDay, n.drawMonth = n.selectedMonth = n.currentMonth, n.drawYear = n.selectedYear = n.currentYear) : (i = new Date, n.selectedDay = i.getDate(), n.drawMonth = n.selectedMonth = i.getMonth(), n.drawYear = n.selectedYear = i.getFullYear()), this._notifyChange(n), this._adjustDate(s) }, _selectMonthYear: function (e, i, s) { var n = t(e), a = this._getInst(n[0]); a["selected" + ("M" === s ? "Month" : "Year")] = a["draw" + ("M" === s ? "Month" : "Year")] = parseInt(i.options[i.selectedIndex].value, 10), this._notifyChange(a), this._adjustDate(n) }, _selectDay: function (e, i, s, n) { var a, r = t(e); t(n).hasClass(this._unselectableClass) || this._isDisabledDatepicker(r[0]) || (a = this._getInst(r[0]), a.selectedDay = a.currentDay = t("a", n).html(), a.selectedMonth = a.currentMonth = i, a.selectedYear = a.currentYear = s, this._selectDate(e, this._formatDate(a, a.currentDay, a.currentMonth, a.currentYear))) }, _clearDate: function (e) { var i = t(e); this._selectDate(i, "") }, _selectDate: function (e, i) { var s, n = t(e), a = this._getInst(n[0]); i = null != i ? i : this._formatDate(a), a.input && a.input.val(i), this._updateAlternate(a), s = this._get(a, "onSelect"), s ? s.apply(a.input ? a.input[0] : null, [i, a]) : a.input && a.input.trigger("change"), a.inline ? this._updateDatepicker(a) : (this._hideDatepicker(), this._lastInput = a.input[0], "object" != typeof a.input[0] && a.input.focus(), this._lastInput = null) }, _updateAlternate: function (e) { var i, s, n, a = this._get(e, "altField"); a && (i = this._get(e, "altFormat") || this._get(e, "dateFormat"), s = this._getDate(e), n = this.formatDate(i, s, this._getFormatConfig(e)), t(a).each(function () { t(this).val(n) })) }, noWeekends: function (t) { var e = t.getDay(); return [e > 0 && 6 > e, ""] }, iso8601Week: function (t) { var e, i = new Date(t.getTime()); return i.setDate(i.getDate() + 4 - (i.getDay() || 7)), e = i.getTime(), i.setMonth(0), i.setDate(1), Math.floor(Math.round((e - i) / 864e5) / 7) + 1 }, parseDate: function (i, s, n) { if (null == i || null == s) throw "Invalid arguments"; if (s = "object" == typeof s ? "" + s : s + "", "" === s) return null; var a, r, o, h, l = 0, c = (n ? n.shortYearCutoff : null) || this._defaults.shortYearCutoff, u = "string" != typeof c ? c : (new Date).getFullYear() % 100 + parseInt(c, 10), d = (n ? n.dayNamesShort : null) || this._defaults.dayNamesShort, p = (n ? n.dayNames : null) || this._defaults.dayNames, f = (n ? n.monthNamesShort : null) || this._defaults.monthNamesShort, m = (n ? n.monthNames : null) || this._defaults.monthNames, g = -1, v = -1, _ = -1, b = -1, y = !1, x = function (t) { var e = i.length > a + 1 && i.charAt(a + 1) === t; return e && a++, e }, k = function (t) { var e = x(t), i = "@" === t ? 14 : "!" === t ? 20 : "y" === t && e ? 4 : "o" === t ? 3 : 2, n = RegExp("^\\d{1," + i + "}"), a = s.substring(l).match(n); if (!a) throw "Missing number at position " + l; return l += a[0].length, parseInt(a[0], 10) }, w = function (i, n, a) { var r = -1, o = t.map(x(i) ? a : n, function (t, e) { return [[e, t]] }).sort(function (t, e) { return -(t[1].length - e[1].length) }); if (t.each(o, function (t, i) { var n = i[1]; return s.substr(l, n.length).toLowerCase() === n.toLowerCase() ? (r = i[0], l += n.length, !1) : e }), -1 !== r) return r + 1; throw "Unknown name at position " + l }, D = function () { if (s.charAt(l) !== i.charAt(a)) throw "Unexpected literal at position " + l; l++ }; for (a = 0; i.length > a; a++) if (y) "'" !== i.charAt(a) || x("'") ? D() : y = !1; else switch (i.charAt(a)) { case "d": _ = k("d"); break; case "D": w("D", d, p); break; case "o": b = k("o"); break; case "m": v = k("m"); break; case "M": v = w("M", f, m); break; case "y": g = k("y"); break; case "@": h = new Date(k("@")), g = h.getFullYear(), v = h.getMonth() + 1, _ = h.getDate(); break; case "!": h = new Date((k("!") - this._ticksTo1970) / 1e4), g = h.getFullYear(), v = h.getMonth() + 1, _ = h.getDate(); break; case "'": x("'") ? D() : y = !0; break; default: D() } if (s.length > l && (o = s.substr(l), !/^\s+/.test(o))) throw "Extra/unparsed characters found in date: " + o; if (-1 === g ? g = (new Date).getFullYear() : 100 > g && (g += (new Date).getFullYear() - (new Date).getFullYear() % 100 + (u >= g ? 0 : -100)), b > -1) for (v = 1, _ = b; ;) { if (r = this._getDaysInMonth(g, v - 1), r >= _) break; v++, _ -= r } if (h = this._daylightSavingAdjust(new Date(g, v - 1, _)), h.getFullYear() !== g || h.getMonth() + 1 !== v || h.getDate() !== _) throw "Invalid date"; return h }, ATOM: "yy-mm-dd", COOKIE: "D, dd M yy", ISO_8601: "yy-mm-dd", RFC_822: "D, d M y", RFC_850: "DD, dd-M-y", RFC_1036: "D, d M y", RFC_1123: "D, d M yy", RFC_2822: "D, d M yy", RSS: "D, d M y", TICKS: "!", TIMESTAMP: "@", W3C: "yy-mm-dd", _ticksTo1970: 1e7 * 60 * 60 * 24 * (718685 + Math.floor(492.5) - Math.floor(19.7) + Math.floor(4.925)), formatDate: function (t, e, i) { if (!e) return ""; var s, n = (i ? i.dayNamesShort : null) || this._defaults.dayNamesShort, a = (i ? i.dayNames : null) || this._defaults.dayNames, r = (i ? i.monthNamesShort : null) || this._defaults.monthNamesShort, o = (i ? i.monthNames : null) || this._defaults.monthNames, h = function (e) { var i = t.length > s + 1 && t.charAt(s + 1) === e; return i && s++, i }, l = function (t, e, i) { var s = "" + e; if (h(t)) for (; i > s.length;) s = "0" + s; return s }, c = function (t, e, i, s) { return h(t) ? s[e] : i[e] }, u = "", d = !1; if (e) for (s = 0; t.length > s; s++) if (d) "'" !== t.charAt(s) || h("'") ? u += t.charAt(s) : d = !1; else switch (t.charAt(s)) { case "d": u += l("d", e.getDate(), 2); break; case "D": u += c("D", e.getDay(), n, a); break; case "o": u += l("o", Math.round((new Date(e.getFullYear(), e.getMonth(), e.getDate()).getTime() - new Date(e.getFullYear(), 0, 0).getTime()) / 864e5), 3); break; case "m": u += l("m", e.getMonth() + 1, 2); break; case "M": u += c("M", e.getMonth(), r, o); break; case "y": u += h("y") ? e.getFullYear() : (10 > e.getYear() % 100 ? "0" : "") + e.getYear() % 100; break; case "@": u += e.getTime(); break; case "!": u += 1e4 * e.getTime() + this._ticksTo1970; break; case "'": h("'") ? u += "'" : d = !0; break; default: u += t.charAt(s) } return u }, _possibleChars: function (t) { var e, i = "", s = !1, n = function (i) { var s = t.length > e + 1 && t.charAt(e + 1) === i; return s && e++, s }; for (e = 0; t.length > e; e++) if (s) "'" !== t.charAt(e) || n("'") ? i += t.charAt(e) : s = !1; else switch (t.charAt(e)) { case "d": case "m": case "y": case "@": i += "0123456789"; break; case "D": case "M": return null; case "'": n("'") ? i += "'" : s = !0; break; default: i += t.charAt(e) } return i }, _get: function (t, i) { return t.settings[i] !== e ? t.settings[i] : this._defaults[i] }, _setDateFromField: function (t, e) { if (t.input.val() !== t.lastVal) { var i = this._get(t, "dateFormat"), s = t.lastVal = t.input ? t.input.val() : null, n = this._getDefaultDate(t), a = n, r = this._getFormatConfig(t); try { a = this.parseDate(i, s, r) || n } catch (o) { s = e ? "" : s } t.selectedDay = a.getDate(), t.drawMonth = t.selectedMonth = a.getMonth(), t.drawYear = t.selectedYear = a.getFullYear(), t.currentDay = s ? a.getDate() : 0, t.currentMonth = s ? a.getMonth() : 0, t.currentYear = s ? a.getFullYear() : 0, this._adjustInstDate(t) } }, _getDefaultDate: function (t) { return this._restrictMinMax(t, this._determineDate(t, this._get(t, "defaultDate"), new Date)) }, _determineDate: function (e, i, s) { var n = function (t) { var e = new Date; return e.setDate(e.getDate() + t), e }, a = function (i) { try { return t.datepicker.parseDate(t.datepicker._get(e, "dateFormat"), i, t.datepicker._getFormatConfig(e)) } catch (s) { } for (var n = (i.toLowerCase().match(/^c/) ? t.datepicker._getDate(e) : null) || new Date, a = n.getFullYear(), r = n.getMonth(), o = n.getDate(), h = /([+\-]?[0-9]+)\s*(d|D|w|W|m|M|y|Y)?/g, l = h.exec(i) ; l;) { switch (l[2] || "d") { case "d": case "D": o += parseInt(l[1], 10); break; case "w": case "W": o += 7 * parseInt(l[1], 10); break; case "m": case "M": r += parseInt(l[1], 10), o = Math.min(o, t.datepicker._getDaysInMonth(a, r)); break; case "y": case "Y": a += parseInt(l[1], 10), o = Math.min(o, t.datepicker._getDaysInMonth(a, r)) } l = h.exec(i) } return new Date(a, r, o) }, r = null == i || "" === i ? s : "string" == typeof i ? a(i) : "number" == typeof i ? isNaN(i) ? s : n(i) : new Date(i.getTime()); return r = r && "Invalid Date" == "" + r ? s : r, r && (r.setHours(0), r.setMinutes(0), r.setSeconds(0), r.setMilliseconds(0)), this._daylightSavingAdjust(r) }, _daylightSavingAdjust: function (t) { return t ? (t.setHours(t.getHours() > 12 ? t.getHours() + 2 : 0), t) : null }, _setDate: function (t, e, i) { var s = !e, n = t.selectedMonth, a = t.selectedYear, r = this._restrictMinMax(t, this._determineDate(t, e, new Date)); t.selectedDay = t.currentDay = r.getDate(), t.drawMonth = t.selectedMonth = t.currentMonth = r.getMonth(), t.drawYear = t.selectedYear = t.currentYear = r.getFullYear(), n === t.selectedMonth && a === t.selectedYear || i || this._notifyChange(t), this._adjustInstDate(t), t.input && t.input.val(s ? "" : this._formatDate(t)) }, _getDate: function (t) { var e = !t.currentYear || t.input && "" === t.input.val() ? null : this._daylightSavingAdjust(new Date(t.currentYear, t.currentMonth, t.currentDay)); return e }, _attachHandlers: function (e) { var i = this._get(e, "stepMonths"), s = "#" + e.id.replace(/\\\\/g, "\\"); e.dpDiv.find("[data-handler]").map(function () { var e = { prev: function () { t.datepicker._adjustDate(s, -i, "M") }, next: function () { t.datepicker._adjustDate(s, +i, "M") }, hide: function () { t.datepicker._hideDatepicker() }, today: function () { t.datepicker._gotoToday(s) }, selectDay: function () { return t.datepicker._selectDay(s, +this.getAttribute("data-month"), +this.getAttribute("data-year"), this), !1 }, selectMonth: function () { return t.datepicker._selectMonthYear(s, this, "M"), !1 }, selectYear: function () { return t.datepicker._selectMonthYear(s, this, "Y"), !1 } }; t(this).bind(this.getAttribute("data-event"), e[this.getAttribute("data-handler")]) }) }, _generateHTML: function (t) { var e, i, s, n, a, r, o, h, l, c, u, d, p, f, m, g, v, _, b, y, x, k, w, D, T, C, M, S, N, I, P, A, z, H, E, F, O, W, j, R = new Date, L = this._daylightSavingAdjust(new Date(R.getFullYear(), R.getMonth(), R.getDate())), Y = this._get(t, "isRTL"), B = this._get(t, "showButtonPanel"), J = this._get(t, "hideIfNoPrevNext"), K = this._get(t, "navigationAsDateFormat"), Q = this._getNumberOfMonths(t), V = this._get(t, "showCurrentAtPos"), U = this._get(t, "stepMonths"), q = 1 !== Q[0] || 1 !== Q[1], X = this._daylightSavingAdjust(t.currentDay ? new Date(t.currentYear, t.currentMonth, t.currentDay) : new Date(9999, 9, 9)), G = this._getMinMaxDate(t, "min"), $ = this._getMinMaxDate(t, "max"), Z = t.drawMonth - V, te = t.drawYear; if (0 > Z && (Z += 12, te--), $) for (e = this._daylightSavingAdjust(new Date($.getFullYear(), $.getMonth() - Q[0] * Q[1] + 1, $.getDate())), e = G && G > e ? G : e; this._daylightSavingAdjust(new Date(te, Z, 1)) > e;) Z--, 0 > Z && (Z = 11, te--); for (t.drawMonth = Z, t.drawYear = te, i = this._get(t, "prevText"), i = K ? this.formatDate(i, this._daylightSavingAdjust(new Date(te, Z - U, 1)), this._getFormatConfig(t)) : i, s = this._canAdjustMonth(t, -1, te, Z) ? "<a class='ui-datepicker-prev ui-corner-all' data-handler='prev' data-event='click' title='" + i + "'><span class='ui-icon ui-icon-circle-triangle-" + (Y ? "e" : "w") + "'>" + i + "</span></a>" : J ? "" : "<a class='ui-datepicker-prev ui-corner-all ui-state-disabled' title='" + i + "'><span class='ui-icon ui-icon-circle-triangle-" + (Y ? "e" : "w") + "'>" + i + "</span></a>", n = this._get(t, "nextText"), n = K ? this.formatDate(n, this._daylightSavingAdjust(new Date(te, Z + U, 1)), this._getFormatConfig(t)) : n, a = this._canAdjustMonth(t, 1, te, Z) ? "<a class='ui-datepicker-next ui-corner-all' data-handler='next' data-event='click' title='" + n + "'><span class='ui-icon ui-icon-circle-triangle-" + (Y ? "w" : "e") + "'>" + n + "</span></a>" : J ? "" : "<a class='ui-datepicker-next ui-corner-all ui-state-disabled' title='" + n + "'><span class='ui-icon ui-icon-circle-triangle-" + (Y ? "w" : "e") + "'>" + n + "</span></a>", r = this._get(t, "currentText"), o = this._get(t, "gotoCurrent") && t.currentDay ? X : L, r = K ? this.formatDate(r, o, this._getFormatConfig(t)) : r, h = t.inline ? "" : "<button type='button' class='ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all' data-handler='hide' data-event='click'>" + this._get(t, "closeText") + "</button>", l = B ? "<div class='ui-datepicker-buttonpane ui-widget-content'>" + (Y ? h : "") + (this._isInRange(t, o) ? "<button type='button' class='ui-datepicker-current ui-state-default ui-priority-secondary ui-corner-all' data-handler='today' data-event='click'>" + r + "</button>" : "") + (Y ? "" : h) + "</div>" : "", c = parseInt(this._get(t, "firstDay"), 10), c = isNaN(c) ? 0 : c, u = this._get(t, "showWeek"), d = this._get(t, "dayNames"), p = this._get(t, "dayNamesMin"), f = this._get(t, "monthNames"), m = this._get(t, "monthNamesShort"), g = this._get(t, "beforeShowDay"), v = this._get(t, "showOtherMonths"), _ = this._get(t, "selectOtherMonths"), b = this._getDefaultDate(t), y = "", k = 0; Q[0] > k; k++) { for (w = "", this.maxRows = 4, D = 0; Q[1] > D; D++) { if (T = this._daylightSavingAdjust(new Date(te, Z, t.selectedDay)), C = " ui-corner-all", M = "", q) { if (M += "<div class='ui-datepicker-group", Q[1] > 1) switch (D) { case 0: M += " ui-datepicker-group-first", C = " ui-corner-" + (Y ? "right" : "left"); break; case Q[1] - 1: M += " ui-datepicker-group-last", C = " ui-corner-" + (Y ? "left" : "right"); break; default: M += " ui-datepicker-group-middle", C = "" } M += "'>" } for (M += "<div class='ui-datepicker-header ui-widget-header ui-helper-clearfix" + C + "'>" + (/all|left/.test(C) && 0 === k ? Y ? a : s : "") + (/all|right/.test(C) && 0 === k ? Y ? s : a : "") + this._generateMonthYearHeader(t, Z, te, G, $, k > 0 || D > 0, f, m) + "</div><table class='ui-datepicker-calendar'><thead>" + "<tr>", S = u ? "<th class='ui-datepicker-week-col'>" + this._get(t, "weekHeader") + "</th>" : "", x = 0; 7 > x; x++) N = (x + c) % 7, S += "<th" + ((x + c + 6) % 7 >= 5 ? " class='ui-datepicker-week-end'" : "") + ">" + "<span title='" + d[N] + "'>" + p[N] + "</span></th>"; for (M += S + "</tr></thead><tbody>", I = this._getDaysInMonth(te, Z), te === t.selectedYear && Z === t.selectedMonth && (t.selectedDay = Math.min(t.selectedDay, I)), P = (this._getFirstDayOfMonth(te, Z) - c + 7) % 7, A = Math.ceil((P + I) / 7), z = q ? this.maxRows > A ? this.maxRows : A : A, this.maxRows = z, H = this._daylightSavingAdjust(new Date(te, Z, 1 - P)), E = 0; z > E; E++) { for (M += "<tr>", F = u ? "<td class='ui-datepicker-week-col'>" + this._get(t, "calculateWeek")(H) + "</td>" : "", x = 0; 7 > x; x++) O = g ? g.apply(t.input ? t.input[0] : null, [H]) : [!0, ""], W = H.getMonth() !== Z, j = W && !_ || !O[0] || G && G > H || $ && H > $, F += "<td class='" + ((x + c + 6) % 7 >= 5 ? " ui-datepicker-week-end" : "") + (W ? " ui-datepicker-other-month" : "") + (H.getTime() === T.getTime() && Z === t.selectedMonth && t._keyEvent || b.getTime() === H.getTime() && b.getTime() === T.getTime() ? " " + this._dayOverClass : "") + (j ? " " + this._unselectableClass + " ui-state-disabled" : "") + (W && !v ? "" : " " + O[1] + (H.getTime() === X.getTime() ? " " + this._currentClass : "") + (H.getTime() === L.getTime() ? " ui-datepicker-today" : "")) + "'" + (W && !v || !O[2] ? "" : " title='" + O[2].replace(/'/g, "&#39;") + "'") + (j ? "" : " data-handler='selectDay' data-event='click' data-month='" + H.getMonth() + "' data-year='" + H.getFullYear() + "'") + ">" + (W && !v ? "&#xa0;" : j ? "<span class='ui-state-default'>" + H.getDate() + "</span>" : "<a class='ui-state-default" + (H.getTime() === L.getTime() ? " ui-state-highlight" : "") + (H.getTime() === X.getTime() ? " ui-state-active" : "") + (W ? " ui-priority-secondary" : "") + "' href='#'>" + H.getDate() + "</a>") + "</td>", H.setDate(H.getDate() + 1), H = this._daylightSavingAdjust(H); M += F + "</tr>" } Z++, Z > 11 && (Z = 0, te++), M += "</tbody></table>" + (q ? "</div>" + (Q[0] > 0 && D === Q[1] - 1 ? "<div class='ui-datepicker-row-break'></div>" : "") : ""), w += M } y += w } return y += l, t._keyEvent = !1, y }, _generateMonthYearHeader: function (t, e, i, s, n, a, r, o) {
            var h, l, c, u, d, p, f, m, g = this._get(t, "changeMonth"), v = this._get(t, "changeYear"), _ = this._get(t, "showMonthAfterYear"), b = "<div class='ui-datepicker-title'>", y = ""; if (a || !g) y += "<span class='ui-datepicker-month'>" + r[e] + "</span>"; else { for (h = s && s.getFullYear() === i, l = n && n.getFullYear() === i, y += "<select class='ui-datepicker-month' data-handler='selectMonth' data-event='change'>", c = 0; 12 > c; c++) (!h || c >= s.getMonth()) && (!l || n.getMonth() >= c) && (y += "<option value='" + c + "'" + (c === e ? " selected='selected'" : "") + ">" + o[c] + "</option>"); y += "</select>" } if (_ || (b += y + (!a && g && v ? "" : "&#xa0;")), !t.yearshtml) if (t.yearshtml = "", a || !v) b += "<span class='ui-datepicker-year'>" + i + "</span>"; else {
                for (u = this._get(t, "yearRange").split(":"), d = (new Date).getFullYear(), p = function (t) {
                var e = t.match(/c[+\-].*/) ? i + parseInt(t.substring(1), 10) : t.match(/[+\-].*/) ? d + parseInt(t, 10) : parseInt(t, 10);
                return isNaN(e) ? d : e
                }, f = p(u[0]), m = Math.max(f, p(u[1] || "")), f = s ? Math.max(f, s.getFullYear()) : f, m = n ? Math.min(m, n.getFullYear()) : m, t.yearshtml += "<select class='ui-datepicker-year' data-handler='selectYear' data-event='change'>"; m >= f; f++) t.yearshtml += "<option value='" + f + "'" + (f === i ? " selected='selected'" : "") + ">" + f + "</option>"; t.yearshtml += "</select>", b += t.yearshtml, t.yearshtml = null
            } return b += this._get(t, "yearSuffix"), _ && (b += (!a && g && v ? "" : "&#xa0;") + y), b += "</div>"
        }, _adjustInstDate: function (t, e, i) { var s = t.drawYear + ("Y" === i ? e : 0), n = t.drawMonth + ("M" === i ? e : 0), a = Math.min(t.selectedDay, this._getDaysInMonth(s, n)) + ("D" === i ? e : 0), r = this._restrictMinMax(t, this._daylightSavingAdjust(new Date(s, n, a))); t.selectedDay = r.getDate(), t.drawMonth = t.selectedMonth = r.getMonth(), t.drawYear = t.selectedYear = r.getFullYear(), ("M" === i || "Y" === i) && this._notifyChange(t) }, _restrictMinMax: function (t, e) { var i = this._getMinMaxDate(t, "min"), s = this._getMinMaxDate(t, "max"), n = i && i > e ? i : e; return s && n > s ? s : n }, _notifyChange: function (t) { var e = this._get(t, "onChangeMonthYear"); e && e.apply(t.input ? t.input[0] : null, [t.selectedYear, t.selectedMonth + 1, t]) }, _getNumberOfMonths: function (t) { var e = this._get(t, "numberOfMonths"); return null == e ? [1, 1] : "number" == typeof e ? [1, e] : e }, _getMinMaxDate: function (t, e) { return this._determineDate(t, this._get(t, e + "Date"), null) }, _getDaysInMonth: function (t, e) { return 32 - this._daylightSavingAdjust(new Date(t, e, 32)).getDate() }, _getFirstDayOfMonth: function (t, e) { return new Date(t, e, 1).getDay() }, _canAdjustMonth: function (t, e, i, s) { var n = this._getNumberOfMonths(t), a = this._daylightSavingAdjust(new Date(i, s + (0 > e ? e : n[0] * n[1]), 1)); return 0 > e && a.setDate(this._getDaysInMonth(a.getFullYear(), a.getMonth())), this._isInRange(t, a) }, _isInRange: function (t, e) { var i, s, n = this._getMinMaxDate(t, "min"), a = this._getMinMaxDate(t, "max"), r = null, o = null, h = this._get(t, "yearRange"); return h && (i = h.split(":"), s = (new Date).getFullYear(), r = parseInt(i[0], 10), o = parseInt(i[1], 10), i[0].match(/[+\-].*/) && (r += s), i[1].match(/[+\-].*/) && (o += s)), (!n || e.getTime() >= n.getTime()) && (!a || e.getTime() <= a.getTime()) && (!r || e.getFullYear() >= r) && (!o || o >= e.getFullYear()) }, _getFormatConfig: function (t) { var e = this._get(t, "shortYearCutoff"); return e = "string" != typeof e ? e : (new Date).getFullYear() % 100 + parseInt(e, 10), { shortYearCutoff: e, dayNamesShort: this._get(t, "dayNamesShort"), dayNames: this._get(t, "dayNames"), monthNamesShort: this._get(t, "monthNamesShort"), monthNames: this._get(t, "monthNames") } }, _formatDate: function (t, e, i, s) { e || (t.currentDay = t.selectedDay, t.currentMonth = t.selectedMonth, t.currentYear = t.selectedYear); var n = e ? "object" == typeof e ? e : this._daylightSavingAdjust(new Date(s, i, e)) : this._daylightSavingAdjust(new Date(t.currentYear, t.currentMonth, t.currentDay)); return this.formatDate(this._get(t, "dateFormat"), n, this._getFormatConfig(t)) }
    }), t.fn.datepicker = function (e) { if (!this.length) return this; t.datepicker.initialized || (t(document).mousedown(t.datepicker._checkExternalClick), t.datepicker.initialized = !0), 0 === t("#" + t.datepicker._mainDivId).length && t("body").append(t.datepicker.dpDiv); var i = Array.prototype.slice.call(arguments, 1); return "string" != typeof e || "isDisabled" !== e && "getDate" !== e && "widget" !== e ? "option" === e && 2 === arguments.length && "string" == typeof arguments[1] ? t.datepicker["_" + e + "Datepicker"].apply(t.datepicker, [this[0]].concat(i)) : this.each(function () { "string" == typeof e ? t.datepicker["_" + e + "Datepicker"].apply(t.datepicker, [this].concat(i)) : t.datepicker._attachDatepicker(this, e) }) : t.datepicker["_" + e + "Datepicker"].apply(t.datepicker, [this[0]].concat(i)) }, t.datepicker = new i, t.datepicker.initialized = !1, t.datepicker.uuid = (new Date).getTime(), t.datepicker.version = "1.10.3"
})(jQuery); (function (t) { t.widget("ui.menu", { version: "1.10.3", defaultElement: "<ul>", delay: 300, options: { icons: { submenu: "ui-icon-carat-1-e" }, menus: "ul", position: { my: "left top", at: "right top" }, role: "menu", blur: null, focus: null, select: null }, _create: function () { this.activeMenu = this.element, this.mouseHandled = !1, this.element.uniqueId().addClass("ui-menu ui-widget ui-widget-content ui-corner-all").toggleClass("ui-menu-icons", !!this.element.find(".ui-icon").length).attr({ role: this.options.role, tabIndex: 0 }).bind("click" + this.eventNamespace, t.proxy(function (t) { this.options.disabled && t.preventDefault() }, this)), this.options.disabled && this.element.addClass("ui-state-disabled").attr("aria-disabled", "true"), this._on({ "mousedown .ui-menu-item > a": function (t) { t.preventDefault() }, "click .ui-state-disabled > a": function (t) { t.preventDefault() }, "click .ui-menu-item:has(a)": function (e) { var i = t(e.target).closest(".ui-menu-item"); !this.mouseHandled && i.not(".ui-state-disabled").length && (this.mouseHandled = !0, this.select(e), i.has(".ui-menu").length ? this.expand(e) : this.element.is(":focus") || (this.element.trigger("focus", [!0]), this.active && 1 === this.active.parents(".ui-menu").length && clearTimeout(this.timer))) }, "mouseenter .ui-menu-item": function (e) { var i = t(e.currentTarget); i.siblings().children(".ui-state-active").removeClass("ui-state-active"), this.focus(e, i) }, mouseleave: "collapseAll", "mouseleave .ui-menu": "collapseAll", focus: function (t, e) { var i = this.active || this.element.children(".ui-menu-item").eq(0); e || this.focus(t, i) }, blur: function (e) { this._delay(function () { t.contains(this.element[0], this.document[0].activeElement) || this.collapseAll(e) }) }, keydown: "_keydown" }), this.refresh(), this._on(this.document, { click: function (e) { t(e.target).closest(".ui-menu").length || this.collapseAll(e), this.mouseHandled = !1 } }) }, _destroy: function () { this.element.removeAttr("aria-activedescendant").find(".ui-menu").addBack().removeClass("ui-menu ui-widget ui-widget-content ui-corner-all ui-menu-icons").removeAttr("role").removeAttr("tabIndex").removeAttr("aria-labelledby").removeAttr("aria-expanded").removeAttr("aria-hidden").removeAttr("aria-disabled").removeUniqueId().show(), this.element.find(".ui-menu-item").removeClass("ui-menu-item").removeAttr("role").removeAttr("aria-disabled").children("a").removeUniqueId().removeClass("ui-corner-all ui-state-hover").removeAttr("tabIndex").removeAttr("role").removeAttr("aria-haspopup").children().each(function () { var e = t(this); e.data("ui-menu-submenu-carat") && e.remove() }), this.element.find(".ui-menu-divider").removeClass("ui-menu-divider ui-widget-content") }, _keydown: function (e) { function i(t) { return t.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, "\\$&") } var s, n, a, o, r, h = !0; switch (e.keyCode) { case t.ui.keyCode.PAGE_UP: this.previousPage(e); break; case t.ui.keyCode.PAGE_DOWN: this.nextPage(e); break; case t.ui.keyCode.HOME: this._move("first", "first", e); break; case t.ui.keyCode.END: this._move("last", "last", e); break; case t.ui.keyCode.UP: this.previous(e); break; case t.ui.keyCode.DOWN: this.next(e); break; case t.ui.keyCode.LEFT: this.collapse(e); break; case t.ui.keyCode.RIGHT: this.active && !this.active.is(".ui-state-disabled") && this.expand(e); break; case t.ui.keyCode.ENTER: case t.ui.keyCode.SPACE: this._activate(e); break; case t.ui.keyCode.ESCAPE: this.collapse(e); break; default: h = !1, n = this.previousFilter || "", a = String.fromCharCode(e.keyCode), o = !1, clearTimeout(this.filterTimer), a === n ? o = !0 : a = n + a, r = RegExp("^" + i(a), "i"), s = this.activeMenu.children(".ui-menu-item").filter(function () { return r.test(t(this).children("a").text()) }), s = o && -1 !== s.index(this.active.next()) ? this.active.nextAll(".ui-menu-item") : s, s.length || (a = String.fromCharCode(e.keyCode), r = RegExp("^" + i(a), "i"), s = this.activeMenu.children(".ui-menu-item").filter(function () { return r.test(t(this).children("a").text()) })), s.length ? (this.focus(e, s), s.length > 1 ? (this.previousFilter = a, this.filterTimer = this._delay(function () { delete this.previousFilter }, 1e3)) : delete this.previousFilter) : delete this.previousFilter } h && e.preventDefault() }, _activate: function (t) { this.active.is(".ui-state-disabled") || (this.active.children("a[aria-haspopup='true']").length ? this.expand(t) : this.select(t)) }, refresh: function () { var e, i = this.options.icons.submenu, s = this.element.find(this.options.menus); s.filter(":not(.ui-menu)").addClass("ui-menu ui-widget ui-widget-content ui-corner-all").hide().attr({ role: this.options.role, "aria-hidden": "true", "aria-expanded": "false" }).each(function () { var e = t(this), s = e.prev("a"), n = t("<span>").addClass("ui-menu-icon ui-icon " + i).data("ui-menu-submenu-carat", !0); s.attr("aria-haspopup", "true").prepend(n), e.attr("aria-labelledby", s.attr("id")) }), e = s.add(this.element), e.children(":not(.ui-menu-item):has(a)").addClass("ui-menu-item").attr("role", "presentation").children("a").uniqueId().addClass("ui-corner-all").attr({ tabIndex: -1, role: this._itemRole() }), e.children(":not(.ui-menu-item)").each(function () { var e = t(this); /[^\-\u2014\u2013\s]/.test(e.text()) || e.addClass("ui-widget-content ui-menu-divider") }), e.children(".ui-state-disabled").attr("aria-disabled", "true"), this.active && !t.contains(this.element[0], this.active[0]) && this.blur() }, _itemRole: function () { return { menu: "menuitem", listbox: "option" }[this.options.role] }, _setOption: function (t, e) { "icons" === t && this.element.find(".ui-menu-icon").removeClass(this.options.icons.submenu).addClass(e.submenu), this._super(t, e) }, focus: function (t, e) { var i, s; this.blur(t, t && "focus" === t.type), this._scrollIntoView(e), this.active = e.first(), s = this.active.children("a").addClass("ui-state-focus"), this.options.role && this.element.attr("aria-activedescendant", s.attr("id")), this.active.parent().closest(".ui-menu-item").children("a:first").addClass("ui-state-active"), t && "keydown" === t.type ? this._close() : this.timer = this._delay(function () { this._close() }, this.delay), i = e.children(".ui-menu"), i.length && /^mouse/.test(t.type) && this._startOpening(i), this.activeMenu = e.parent(), this._trigger("focus", t, { item: e }) }, _scrollIntoView: function (e) { var i, s, n, a, o, r; this._hasScroll() && (i = parseFloat(t.css(this.activeMenu[0], "borderTopWidth")) || 0, s = parseFloat(t.css(this.activeMenu[0], "paddingTop")) || 0, n = e.offset().top - this.activeMenu.offset().top - i - s, a = this.activeMenu.scrollTop(), o = this.activeMenu.height(), r = e.height(), 0 > n ? this.activeMenu.scrollTop(a + n) : n + r > o && this.activeMenu.scrollTop(a + n - o + r)) }, blur: function (t, e) { e || clearTimeout(this.timer), this.active && (this.active.children("a").removeClass("ui-state-focus"), this.active = null, this._trigger("blur", t, { item: this.active })) }, _startOpening: function (t) { clearTimeout(this.timer), "true" === t.attr("aria-hidden") && (this.timer = this._delay(function () { this._close(), this._open(t) }, this.delay)) }, _open: function (e) { var i = t.extend({ of: this.active }, this.options.position); clearTimeout(this.timer), this.element.find(".ui-menu").not(e.parents(".ui-menu")).hide().attr("aria-hidden", "true"), e.show().removeAttr("aria-hidden").attr("aria-expanded", "true").position(i) }, collapseAll: function (e, i) { clearTimeout(this.timer), this.timer = this._delay(function () { var s = i ? this.element : t(e && e.target).closest(this.element.find(".ui-menu")); s.length || (s = this.element), this._close(s), this.blur(e), this.activeMenu = s }, this.delay) }, _close: function (t) { t || (t = this.active ? this.active.parent() : this.element), t.find(".ui-menu").hide().attr("aria-hidden", "true").attr("aria-expanded", "false").end().find("a.ui-state-active").removeClass("ui-state-active") }, collapse: function (t) { var e = this.active && this.active.parent().closest(".ui-menu-item", this.element); e && e.length && (this._close(), this.focus(t, e)) }, expand: function (t) { var e = this.active && this.active.children(".ui-menu ").children(".ui-menu-item").first(); e && e.length && (this._open(e.parent()), this._delay(function () { this.focus(t, e) })) }, next: function (t) { this._move("next", "first", t) }, previous: function (t) { this._move("prev", "last", t) }, isFirstItem: function () { return this.active && !this.active.prevAll(".ui-menu-item").length }, isLastItem: function () { return this.active && !this.active.nextAll(".ui-menu-item").length }, _move: function (t, e, i) { var s; this.active && (s = "first" === t || "last" === t ? this.active["first" === t ? "prevAll" : "nextAll"](".ui-menu-item").eq(-1) : this.active[t + "All"](".ui-menu-item").eq(0)), s && s.length && this.active || (s = this.activeMenu.children(".ui-menu-item")[e]()), this.focus(i, s) }, nextPage: function (e) { var i, s, n; return this.active ? (this.isLastItem() || (this._hasScroll() ? (s = this.active.offset().top, n = this.element.height(), this.active.nextAll(".ui-menu-item").each(function () { return i = t(this), 0 > i.offset().top - s - n }), this.focus(e, i)) : this.focus(e, this.activeMenu.children(".ui-menu-item")[this.active ? "last" : "first"]())), undefined) : (this.next(e), undefined) }, previousPage: function (e) { var i, s, n; return this.active ? (this.isFirstItem() || (this._hasScroll() ? (s = this.active.offset().top, n = this.element.height(), this.active.prevAll(".ui-menu-item").each(function () { return i = t(this), i.offset().top - s + n > 0 }), this.focus(e, i)) : this.focus(e, this.activeMenu.children(".ui-menu-item").first())), undefined) : (this.next(e), undefined) }, _hasScroll: function () { return this.element.outerHeight() < this.element.prop("scrollHeight") }, select: function (e) { this.active = this.active || t(e.target).closest(".ui-menu-item"); var i = { item: this.active }; this.active.has(".ui-menu").length || this.collapseAll(e, !0), this._trigger("select", e, i) } }) })(jQuery); (function (t) { var e = 5; t.widget("ui.slider", t.ui.mouse, { version: "1.10.3", widgetEventPrefix: "slide", options: { animate: !1, distance: 0, max: 100, min: 0, orientation: "horizontal", range: !1, step: 1, value: 0, values: null, change: null, slide: null, start: null, stop: null }, _create: function () { this._keySliding = !1, this._mouseSliding = !1, this._animateOff = !0, this._handleIndex = null, this._detectOrientation(), this._mouseInit(), this.element.addClass("ui-slider ui-slider-" + this.orientation + " ui-widget" + " ui-widget-content" + " ui-corner-all"), this._refresh(), this._setOption("disabled", this.options.disabled), this._animateOff = !1 }, _refresh: function () { this._createRange(), this._createHandles(), this._setupEvents(), this._refreshValue() }, _createHandles: function () { var e, i, s = this.options, n = this.element.find(".ui-slider-handle").addClass("ui-state-default ui-corner-all"), a = "<a class='ui-slider-handle ui-state-default ui-corner-all' href='#'></a>", o = []; for (i = s.values && s.values.length || 1, n.length > i && (n.slice(i).remove(), n = n.slice(0, i)), e = n.length; i > e; e++) o.push(a); this.handles = n.add(t(o.join("")).appendTo(this.element)), this.handle = this.handles.eq(0), this.handles.each(function (e) { t(this).data("ui-slider-handle-index", e) }) }, _createRange: function () { var e = this.options, i = ""; e.range ? (e.range === !0 && (e.values ? e.values.length && 2 !== e.values.length ? e.values = [e.values[0], e.values[0]] : t.isArray(e.values) && (e.values = e.values.slice(0)) : e.values = [this._valueMin(), this._valueMin()]), this.range && this.range.length ? this.range.removeClass("ui-slider-range-min ui-slider-range-max").css({ left: "", bottom: "" }) : (this.range = t("<div></div>").appendTo(this.element), i = "ui-slider-range ui-widget-header ui-corner-all"), this.range.addClass(i + ("min" === e.range || "max" === e.range ? " ui-slider-range-" + e.range : ""))) : this.range = t([]) }, _setupEvents: function () { var t = this.handles.add(this.range).filter("a"); this._off(t), this._on(t, this._handleEvents), this._hoverable(t), this._focusable(t) }, _destroy: function () { this.handles.remove(), this.range.remove(), this.element.removeClass("ui-slider ui-slider-horizontal ui-slider-vertical ui-widget ui-widget-content ui-corner-all"), this._mouseDestroy() }, _mouseCapture: function (e) { var i, s, n, a, o, r, h, l, u = this, c = this.options; return c.disabled ? !1 : (this.elementSize = { width: this.element.outerWidth(), height: this.element.outerHeight() }, this.elementOffset = this.element.offset(), i = { x: e.pageX, y: e.pageY }, s = this._normValueFromMouse(i), n = this._valueMax() - this._valueMin() + 1, this.handles.each(function (e) { var i = Math.abs(s - u.values(e)); (n > i || n === i && (e === u._lastChangedValue || u.values(e) === c.min)) && (n = i, a = t(this), o = e) }), r = this._start(e, o), r === !1 ? !1 : (this._mouseSliding = !0, this._handleIndex = o, a.addClass("ui-state-active").focus(), h = a.offset(), l = !t(e.target).parents().addBack().is(".ui-slider-handle"), this._clickOffset = l ? { left: 0, top: 0 } : { left: e.pageX - h.left - a.width() / 2, top: e.pageY - h.top - a.height() / 2 - (parseInt(a.css("borderTopWidth"), 10) || 0) - (parseInt(a.css("borderBottomWidth"), 10) || 0) + (parseInt(a.css("marginTop"), 10) || 0) }, this.handles.hasClass("ui-state-hover") || this._slide(e, o, s), this._animateOff = !0, !0)) }, _mouseStart: function () { return !0 }, _mouseDrag: function (t) { var e = { x: t.pageX, y: t.pageY }, i = this._normValueFromMouse(e); return this._slide(t, this._handleIndex, i), !1 }, _mouseStop: function (t) { return this.handles.removeClass("ui-state-active"), this._mouseSliding = !1, this._stop(t, this._handleIndex), this._change(t, this._handleIndex), this._handleIndex = null, this._clickOffset = null, this._animateOff = !1, !1 }, _detectOrientation: function () { this.orientation = "vertical" === this.options.orientation ? "vertical" : "horizontal" }, _normValueFromMouse: function (t) { var e, i, s, n, a; return "horizontal" === this.orientation ? (e = this.elementSize.width, i = t.x - this.elementOffset.left - (this._clickOffset ? this._clickOffset.left : 0)) : (e = this.elementSize.height, i = t.y - this.elementOffset.top - (this._clickOffset ? this._clickOffset.top : 0)), s = i / e, s > 1 && (s = 1), 0 > s && (s = 0), "vertical" === this.orientation && (s = 1 - s), n = this._valueMax() - this._valueMin(), a = this._valueMin() + s * n, this._trimAlignValue(a) }, _start: function (t, e) { var i = { handle: this.handles[e], value: this.value() }; return this.options.values && this.options.values.length && (i.value = this.values(e), i.values = this.values()), this._trigger("start", t, i) }, _slide: function (t, e, i) { var s, n, a; this.options.values && this.options.values.length ? (s = this.values(e ? 0 : 1), 2 === this.options.values.length && this.options.range === !0 && (0 === e && i > s || 1 === e && s > i) && (i = s), i !== this.values(e) && (n = this.values(), n[e] = i, a = this._trigger("slide", t, { handle: this.handles[e], value: i, values: n }), s = this.values(e ? 0 : 1), a !== !1 && this.values(e, i, !0))) : i !== this.value() && (a = this._trigger("slide", t, { handle: this.handles[e], value: i }), a !== !1 && this.value(i)) }, _stop: function (t, e) { var i = { handle: this.handles[e], value: this.value() }; this.options.values && this.options.values.length && (i.value = this.values(e), i.values = this.values()), this._trigger("stop", t, i) }, _change: function (t, e) { if (!this._keySliding && !this._mouseSliding) { var i = { handle: this.handles[e], value: this.value() }; this.options.values && this.options.values.length && (i.value = this.values(e), i.values = this.values()), this._lastChangedValue = e, this._trigger("change", t, i) } }, value: function (t) { return arguments.length ? (this.options.value = this._trimAlignValue(t), this._refreshValue(), this._change(null, 0), undefined) : this._value() }, values: function (e, i) { var s, n, a; if (arguments.length > 1) return this.options.values[e] = this._trimAlignValue(i), this._refreshValue(), this._change(null, e), undefined; if (!arguments.length) return this._values(); if (!t.isArray(arguments[0])) return this.options.values && this.options.values.length ? this._values(e) : this.value(); for (s = this.options.values, n = arguments[0], a = 0; s.length > a; a += 1) s[a] = this._trimAlignValue(n[a]), this._change(null, a); this._refreshValue() }, _setOption: function (e, i) { var s, n = 0; switch ("range" === e && this.options.range === !0 && ("min" === i ? (this.options.value = this._values(0), this.options.values = null) : "max" === i && (this.options.value = this._values(this.options.values.length - 1), this.options.values = null)), t.isArray(this.options.values) && (n = this.options.values.length), t.Widget.prototype._setOption.apply(this, arguments), e) { case "orientation": this._detectOrientation(), this.element.removeClass("ui-slider-horizontal ui-slider-vertical").addClass("ui-slider-" + this.orientation), this._refreshValue(); break; case "value": this._animateOff = !0, this._refreshValue(), this._change(null, 0), this._animateOff = !1; break; case "values": for (this._animateOff = !0, this._refreshValue(), s = 0; n > s; s += 1) this._change(null, s); this._animateOff = !1; break; case "min": case "max": this._animateOff = !0, this._refreshValue(), this._animateOff = !1; break; case "range": this._animateOff = !0, this._refresh(), this._animateOff = !1 } }, _value: function () { var t = this.options.value; return t = this._trimAlignValue(t) }, _values: function (t) { var e, i, s; if (arguments.length) return e = this.options.values[t], e = this._trimAlignValue(e); if (this.options.values && this.options.values.length) { for (i = this.options.values.slice(), s = 0; i.length > s; s += 1) i[s] = this._trimAlignValue(i[s]); return i } return [] }, _trimAlignValue: function (t) { if (this._valueMin() >= t) return this._valueMin(); if (t >= this._valueMax()) return this._valueMax(); var e = this.options.step > 0 ? this.options.step : 1, i = (t - this._valueMin()) % e, s = t - i; return 2 * Math.abs(i) >= e && (s += i > 0 ? e : -e), parseFloat(s.toFixed(5)) }, _valueMin: function () { return this.options.min }, _valueMax: function () { return this.options.max }, _refreshValue: function () { var e, i, s, n, a, o = this.options.range, r = this.options, h = this, l = this._animateOff ? !1 : r.animate, u = {}; this.options.values && this.options.values.length ? this.handles.each(function (s) { i = 100 * ((h.values(s) - h._valueMin()) / (h._valueMax() - h._valueMin())), u["horizontal" === h.orientation ? "left" : "bottom"] = i + "%", t(this).stop(1, 1)[l ? "animate" : "css"](u, r.animate), h.options.range === !0 && ("horizontal" === h.orientation ? (0 === s && h.range.stop(1, 1)[l ? "animate" : "css"]({ left: i + "%" }, r.animate), 1 === s && h.range[l ? "animate" : "css"]({ width: i - e + "%" }, { queue: !1, duration: r.animate })) : (0 === s && h.range.stop(1, 1)[l ? "animate" : "css"]({ bottom: i + "%" }, r.animate), 1 === s && h.range[l ? "animate" : "css"]({ height: i - e + "%" }, { queue: !1, duration: r.animate }))), e = i }) : (s = this.value(), n = this._valueMin(), a = this._valueMax(), i = a !== n ? 100 * ((s - n) / (a - n)) : 0, u["horizontal" === this.orientation ? "left" : "bottom"] = i + "%", this.handle.stop(1, 1)[l ? "animate" : "css"](u, r.animate), "min" === o && "horizontal" === this.orientation && this.range.stop(1, 1)[l ? "animate" : "css"]({ width: i + "%" }, r.animate), "max" === o && "horizontal" === this.orientation && this.range[l ? "animate" : "css"]({ width: 100 - i + "%" }, { queue: !1, duration: r.animate }), "min" === o && "vertical" === this.orientation && this.range.stop(1, 1)[l ? "animate" : "css"]({ height: i + "%" }, r.animate), "max" === o && "vertical" === this.orientation && this.range[l ? "animate" : "css"]({ height: 100 - i + "%" }, { queue: !1, duration: r.animate })) }, _handleEvents: { keydown: function (i) { var s, n, a, o, r = t(i.target).data("ui-slider-handle-index"); switch (i.keyCode) { case t.ui.keyCode.HOME: case t.ui.keyCode.END: case t.ui.keyCode.PAGE_UP: case t.ui.keyCode.PAGE_DOWN: case t.ui.keyCode.UP: case t.ui.keyCode.RIGHT: case t.ui.keyCode.DOWN: case t.ui.keyCode.LEFT: if (i.preventDefault(), !this._keySliding && (this._keySliding = !0, t(i.target).addClass("ui-state-active"), s = this._start(i, r), s === !1)) return } switch (o = this.options.step, n = a = this.options.values && this.options.values.length ? this.values(r) : this.value(), i.keyCode) { case t.ui.keyCode.HOME: a = this._valueMin(); break; case t.ui.keyCode.END: a = this._valueMax(); break; case t.ui.keyCode.PAGE_UP: a = this._trimAlignValue(n + (this._valueMax() - this._valueMin()) / e); break; case t.ui.keyCode.PAGE_DOWN: a = this._trimAlignValue(n - (this._valueMax() - this._valueMin()) / e); break; case t.ui.keyCode.UP: case t.ui.keyCode.RIGHT: if (n === this._valueMax()) return; a = this._trimAlignValue(n + o); break; case t.ui.keyCode.DOWN: case t.ui.keyCode.LEFT: if (n === this._valueMin()) return; a = this._trimAlignValue(n - o) } this._slide(i, r, a) }, click: function (t) { t.preventDefault() }, keyup: function (e) { var i = t(e.target).data("ui-slider-handle-index"); this._keySliding && (this._keySliding = !1, this._stop(e, i), this._change(e, i), t(e.target).removeClass("ui-state-active")) } } }) })(jQuery); (function (t) { function e(t) { return function () { var e = this.element.val(); t.apply(this, arguments), this._refresh(), e !== this.element.val() && this._trigger("change") } } t.widget("ui.spinner", { version: "1.10.3", defaultElement: "<input>", widgetEventPrefix: "spin", options: { culture: null, icons: { down: "ui-icon-triangle-1-s", up: "ui-icon-triangle-1-n" }, incremental: !0, max: null, min: null, numberFormat: null, page: 10, step: 1, change: null, spin: null, start: null, stop: null }, _create: function () { this._setOption("max", this.options.max), this._setOption("min", this.options.min), this._setOption("step", this.options.step), this._value(this.element.val(), !0), this._draw(), this._on(this._events), this._refresh(), this._on(this.window, { beforeunload: function () { this.element.removeAttr("autocomplete") } }) }, _getCreateOptions: function () { var e = {}, i = this.element; return t.each(["min", "max", "step"], function (t, s) { var n = i.attr(s); void 0 !== n && n.length && (e[s] = n) }), e }, _events: { keydown: function (t) { this._start(t) && this._keydown(t) && t.preventDefault() }, keyup: "_stop", focus: function () { this.previous = this.element.val() }, blur: function (t) { return this.cancelBlur ? (delete this.cancelBlur, void 0) : (this._stop(), this._refresh(), this.previous !== this.element.val() && this._trigger("change", t), void 0) }, mousewheel: function (t, e) { if (e) { if (!this.spinning && !this._start(t)) return !1; this._spin((e > 0 ? 1 : -1) * this.options.step, t), clearTimeout(this.mousewheelTimer), this.mousewheelTimer = this._delay(function () { this.spinning && this._stop(t) }, 100), t.preventDefault() } }, "mousedown .ui-spinner-button": function (e) { function i() { var t = this.element[0] === this.document[0].activeElement; t || (this.element.focus(), this.previous = s, this._delay(function () { this.previous = s })) } var s; s = this.element[0] === this.document[0].activeElement ? this.previous : this.element.val(), e.preventDefault(), i.call(this), this.cancelBlur = !0, this._delay(function () { delete this.cancelBlur, i.call(this) }), this._start(e) !== !1 && this._repeat(null, t(e.currentTarget).hasClass("ui-spinner-up") ? 1 : -1, e) }, "mouseup .ui-spinner-button": "_stop", "mouseenter .ui-spinner-button": function (e) { return t(e.currentTarget).hasClass("ui-state-active") ? this._start(e) === !1 ? !1 : (this._repeat(null, t(e.currentTarget).hasClass("ui-spinner-up") ? 1 : -1, e), void 0) : void 0 }, "mouseleave .ui-spinner-button": "_stop" }, _draw: function () { var t = this.uiSpinner = this.element.addClass("ui-spinner-input").attr("autocomplete", "off").wrap(this._uiSpinnerHtml()).parent().append(this._buttonHtml()); this.element.attr("role", "spinbutton"), this.buttons = t.find(".ui-spinner-button").attr("tabIndex", -1).button().removeClass("ui-corner-all"), this.buttons.height() > Math.ceil(.5 * t.height()) && t.height() > 0 && t.height(t.height()), this.options.disabled && this.disable() }, _keydown: function (e) { var i = this.options, s = t.ui.keyCode; switch (e.keyCode) { case s.UP: return this._repeat(null, 1, e), !0; case s.DOWN: return this._repeat(null, -1, e), !0; case s.PAGE_UP: return this._repeat(null, i.page, e), !0; case s.PAGE_DOWN: return this._repeat(null, -i.page, e), !0 } return !1 }, _uiSpinnerHtml: function () { return "<span class='ui-spinner ui-widget ui-widget-content ui-corner-all'></span>" }, _buttonHtml: function () { return "<a class='ui-spinner-button ui-spinner-up ui-corner-tr'><span class='ui-icon " + this.options.icons.up + "'>&#9650;</span>" + "</a>" + "<a class='ui-spinner-button ui-spinner-down ui-corner-br'>" + "<span class='ui-icon " + this.options.icons.down + "'>&#9660;</span>" + "</a>" }, _start: function (t) { return this.spinning || this._trigger("start", t) !== !1 ? (this.counter || (this.counter = 1), this.spinning = !0, !0) : !1 }, _repeat: function (t, e, i) { t = t || 500, clearTimeout(this.timer), this.timer = this._delay(function () { this._repeat(40, e, i) }, t), this._spin(e * this.options.step, i) }, _spin: function (t, e) { var i = this.value() || 0; this.counter || (this.counter = 1), i = this._adjustValue(i + t * this._increment(this.counter)), this.spinning && this._trigger("spin", e, { value: i }) === !1 || (this._value(i), this.counter++) }, _increment: function (e) { var i = this.options.incremental; return i ? t.isFunction(i) ? i(e) : Math.floor(e * e * e / 5e4 - e * e / 500 + 17 * e / 200 + 1) : 1 }, _precision: function () { var t = this._precisionOf(this.options.step); return null !== this.options.min && (t = Math.max(t, this._precisionOf(this.options.min))), t }, _precisionOf: function (t) { var e = "" + t, i = e.indexOf("."); return -1 === i ? 0 : e.length - i - 1 }, _adjustValue: function (t) { var e, i, s = this.options; return e = null !== s.min ? s.min : 0, i = t - e, i = Math.round(i / s.step) * s.step, t = e + i, t = parseFloat(t.toFixed(this._precision())), null !== s.max && t > s.max ? s.max : null !== s.min && s.min > t ? s.min : t }, _stop: function (t) { this.spinning && (clearTimeout(this.timer), clearTimeout(this.mousewheelTimer), this.counter = 0, this.spinning = !1, this._trigger("stop", t)) }, _setOption: function (t, e) { if ("culture" === t || "numberFormat" === t) { var i = this._parse(this.element.val()); return this.options[t] = e, this.element.val(this._format(i)), void 0 } ("max" === t || "min" === t || "step" === t) && "string" == typeof e && (e = this._parse(e)), "icons" === t && (this.buttons.first().find(".ui-icon").removeClass(this.options.icons.up).addClass(e.up), this.buttons.last().find(".ui-icon").removeClass(this.options.icons.down).addClass(e.down)), this._super(t, e), "disabled" === t && (e ? (this.element.prop("disabled", !0), this.buttons.button("disable")) : (this.element.prop("disabled", !1), this.buttons.button("enable"))) }, _setOptions: e(function (t) { this._super(t), this._value(this.element.val()) }), _parse: function (t) { return "string" == typeof t && "" !== t && (t = window.Globalize && this.options.numberFormat ? Globalize.parseFloat(t, 10, this.options.culture) : +t), "" === t || isNaN(t) ? null : t }, _format: function (t) { return "" === t ? "" : window.Globalize && this.options.numberFormat ? Globalize.format(t, this.options.numberFormat, this.options.culture) : t }, _refresh: function () { this.element.attr({ "aria-valuemin": this.options.min, "aria-valuemax": this.options.max, "aria-valuenow": this._parse(this.element.val()) }) }, _value: function (t, e) { var i; "" !== t && (i = this._parse(t), null !== i && (e || (i = this._adjustValue(i)), t = this._format(i))), this.element.val(t), this._refresh() }, _destroy: function () { this.element.removeClass("ui-spinner-input").prop("disabled", !1).removeAttr("autocomplete").removeAttr("role").removeAttr("aria-valuemin").removeAttr("aria-valuemax").removeAttr("aria-valuenow"), this.uiSpinner.replaceWith(this.element) }, stepUp: e(function (t) { this._stepUp(t) }), _stepUp: function (t) { this._start() && (this._spin((t || 1) * this.options.step), this._stop()) }, stepDown: e(function (t) { this._stepDown(t) }), _stepDown: function (t) { this._start() && (this._spin((t || 1) * -this.options.step), this._stop()) }, pageUp: e(function (t) { this._stepUp((t || 1) * this.options.page) }), pageDown: e(function (t) { this._stepDown((t || 1) * this.options.page) }), value: function (t) { return arguments.length ? (e(this._value).call(this, t), void 0) : this._parse(this.element.val()) }, widget: function () { return this.uiSpinner } }) })(jQuery); (function (t, e) { var i = "ui-effects-"; t.effects = { effect: {} }, function (t, e) { function i(t, e, i) { var s = u[e.type] || {}; return null == t ? i || !e.def ? null : e.def : (t = s.floor ? ~~t : parseFloat(t), isNaN(t) ? e.def : s.mod ? (t + s.mod) % s.mod : 0 > t ? 0 : t > s.max ? s.max : t) } function s(i) { var s = l(), n = s._rgba = []; return i = i.toLowerCase(), f(h, function (t, a) { var o, r = a.re.exec(i), h = r && a.parse(r), l = a.space || "rgba"; return h ? (o = s[l](h), s[c[l].cache] = o[c[l].cache], n = s._rgba = o._rgba, !1) : e }), n.length ? ("0,0,0,0" === n.join() && t.extend(n, a.transparent), s) : a[i] } function n(t, e, i) { return i = (i + 1) % 1, 1 > 6 * i ? t + 6 * (e - t) * i : 1 > 2 * i ? e : 2 > 3 * i ? t + 6 * (e - t) * (2 / 3 - i) : t } var a, o = "backgroundColor borderBottomColor borderLeftColor borderRightColor borderTopColor color columnRuleColor outlineColor textDecorationColor textEmphasisColor", r = /^([\-+])=\s*(\d+\.?\d*)/, h = [{ re: /rgba?\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/, parse: function (t) { return [t[1], t[2], t[3], t[4]] } }, { re: /rgba?\(\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/, parse: function (t) { return [2.55 * t[1], 2.55 * t[2], 2.55 * t[3], t[4]] } }, { re: /#([a-f0-9]{2})([a-f0-9]{2})([a-f0-9]{2})/, parse: function (t) { return [parseInt(t[1], 16), parseInt(t[2], 16), parseInt(t[3], 16)] } }, { re: /#([a-f0-9])([a-f0-9])([a-f0-9])/, parse: function (t) { return [parseInt(t[1] + t[1], 16), parseInt(t[2] + t[2], 16), parseInt(t[3] + t[3], 16)] } }, { re: /hsla?\(\s*(\d+(?:\.\d+)?)\s*,\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/, space: "hsla", parse: function (t) { return [t[1], t[2] / 100, t[3] / 100, t[4]] } }], l = t.Color = function (e, i, s, n) { return new t.Color.fn.parse(e, i, s, n) }, c = { rgba: { props: { red: { idx: 0, type: "byte" }, green: { idx: 1, type: "byte" }, blue: { idx: 2, type: "byte" } } }, hsla: { props: { hue: { idx: 0, type: "degrees" }, saturation: { idx: 1, type: "percent" }, lightness: { idx: 2, type: "percent" } } } }, u = { "byte": { floor: !0, max: 255 }, percent: { max: 1 }, degrees: { mod: 360, floor: !0 } }, d = l.support = {}, p = t("<p>")[0], f = t.each; p.style.cssText = "background-color:rgba(1,1,1,.5)", d.rgba = p.style.backgroundColor.indexOf("rgba") > -1, f(c, function (t, e) { e.cache = "_" + t, e.props.alpha = { idx: 3, type: "percent", def: 1 } }), l.fn = t.extend(l.prototype, { parse: function (n, o, r, h) { if (n === e) return this._rgba = [null, null, null, null], this; (n.jquery || n.nodeType) && (n = t(n).css(o), o = e); var u = this, d = t.type(n), p = this._rgba = []; return o !== e && (n = [n, o, r, h], d = "array"), "string" === d ? this.parse(s(n) || a._default) : "array" === d ? (f(c.rgba.props, function (t, e) { p[e.idx] = i(n[e.idx], e) }), this) : "object" === d ? (n instanceof l ? f(c, function (t, e) { n[e.cache] && (u[e.cache] = n[e.cache].slice()) }) : f(c, function (e, s) { var a = s.cache; f(s.props, function (t, e) { if (!u[a] && s.to) { if ("alpha" === t || null == n[t]) return; u[a] = s.to(u._rgba) } u[a][e.idx] = i(n[t], e, !0) }), u[a] && 0 > t.inArray(null, u[a].slice(0, 3)) && (u[a][3] = 1, s.from && (u._rgba = s.from(u[a]))) }), this) : e }, is: function (t) { var i = l(t), s = !0, n = this; return f(c, function (t, a) { var o, r = i[a.cache]; return r && (o = n[a.cache] || a.to && a.to(n._rgba) || [], f(a.props, function (t, i) { return null != r[i.idx] ? s = r[i.idx] === o[i.idx] : e })), s }), s }, _space: function () { var t = [], e = this; return f(c, function (i, s) { e[s.cache] && t.push(i) }), t.pop() }, transition: function (t, e) { var s = l(t), n = s._space(), a = c[n], o = 0 === this.alpha() ? l("transparent") : this, r = o[a.cache] || a.to(o._rgba), h = r.slice(); return s = s[a.cache], f(a.props, function (t, n) { var a = n.idx, o = r[a], l = s[a], c = u[n.type] || {}; null !== l && (null === o ? h[a] = l : (c.mod && (l - o > c.mod / 2 ? o += c.mod : o - l > c.mod / 2 && (o -= c.mod)), h[a] = i((l - o) * e + o, n))) }), this[n](h) }, blend: function (e) { if (1 === this._rgba[3]) return this; var i = this._rgba.slice(), s = i.pop(), n = l(e)._rgba; return l(t.map(i, function (t, e) { return (1 - s) * n[e] + s * t })) }, toRgbaString: function () { var e = "rgba(", i = t.map(this._rgba, function (t, e) { return null == t ? e > 2 ? 1 : 0 : t }); return 1 === i[3] && (i.pop(), e = "rgb("), e + i.join() + ")" }, toHslaString: function () { var e = "hsla(", i = t.map(this.hsla(), function (t, e) { return null == t && (t = e > 2 ? 1 : 0), e && 3 > e && (t = Math.round(100 * t) + "%"), t }); return 1 === i[3] && (i.pop(), e = "hsl("), e + i.join() + ")" }, toHexString: function (e) { var i = this._rgba.slice(), s = i.pop(); return e && i.push(~~(255 * s)), "#" + t.map(i, function (t) { return t = (t || 0).toString(16), 1 === t.length ? "0" + t : t }).join("") }, toString: function () { return 0 === this._rgba[3] ? "transparent" : this.toRgbaString() } }), l.fn.parse.prototype = l.fn, c.hsla.to = function (t) { if (null == t[0] || null == t[1] || null == t[2]) return [null, null, null, t[3]]; var e, i, s = t[0] / 255, n = t[1] / 255, a = t[2] / 255, o = t[3], r = Math.max(s, n, a), h = Math.min(s, n, a), l = r - h, c = r + h, u = .5 * c; return e = h === r ? 0 : s === r ? 60 * (n - a) / l + 360 : n === r ? 60 * (a - s) / l + 120 : 60 * (s - n) / l + 240, i = 0 === l ? 0 : .5 >= u ? l / c : l / (2 - c), [Math.round(e) % 360, i, u, null == o ? 1 : o] }, c.hsla.from = function (t) { if (null == t[0] || null == t[1] || null == t[2]) return [null, null, null, t[3]]; var e = t[0] / 360, i = t[1], s = t[2], a = t[3], o = .5 >= s ? s * (1 + i) : s + i - s * i, r = 2 * s - o; return [Math.round(255 * n(r, o, e + 1 / 3)), Math.round(255 * n(r, o, e)), Math.round(255 * n(r, o, e - 1 / 3)), a] }, f(c, function (s, n) { var a = n.props, o = n.cache, h = n.to, c = n.from; l.fn[s] = function (s) { if (h && !this[o] && (this[o] = h(this._rgba)), s === e) return this[o].slice(); var n, r = t.type(s), u = "array" === r || "object" === r ? s : arguments, d = this[o].slice(); return f(a, function (t, e) { var s = u["object" === r ? t : e.idx]; null == s && (s = d[e.idx]), d[e.idx] = i(s, e) }), c ? (n = l(c(d)), n[o] = d, n) : l(d) }, f(a, function (e, i) { l.fn[e] || (l.fn[e] = function (n) { var a, o = t.type(n), h = "alpha" === e ? this._hsla ? "hsla" : "rgba" : s, l = this[h](), c = l[i.idx]; return "undefined" === o ? c : ("function" === o && (n = n.call(this, c), o = t.type(n)), null == n && i.empty ? this : ("string" === o && (a = r.exec(n), a && (n = c + parseFloat(a[2]) * ("+" === a[1] ? 1 : -1))), l[i.idx] = n, this[h](l))) }) }) }), l.hook = function (e) { var i = e.split(" "); f(i, function (e, i) { t.cssHooks[i] = { set: function (e, n) { var a, o, r = ""; if ("transparent" !== n && ("string" !== t.type(n) || (a = s(n)))) { if (n = l(a || n), !d.rgba && 1 !== n._rgba[3]) { for (o = "backgroundColor" === i ? e.parentNode : e; ("" === r || "transparent" === r) && o && o.style;) try { r = t.css(o, "backgroundColor"), o = o.parentNode } catch (h) { } n = n.blend(r && "transparent" !== r ? r : "_default") } n = n.toRgbaString() } try { e.style[i] = n } catch (h) { } } }, t.fx.step[i] = function (e) { e.colorInit || (e.start = l(e.elem, i), e.end = l(e.end), e.colorInit = !0), t.cssHooks[i].set(e.elem, e.start.transition(e.end, e.pos)) } }) }, l.hook(o), t.cssHooks.borderColor = { expand: function (t) { var e = {}; return f(["Top", "Right", "Bottom", "Left"], function (i, s) { e["border" + s + "Color"] = t }), e } }, a = t.Color.names = { aqua: "#00ffff", black: "#000000", blue: "#0000ff", fuchsia: "#ff00ff", gray: "#808080", green: "#008000", lime: "#00ff00", maroon: "#800000", navy: "#000080", olive: "#808000", purple: "#800080", red: "#ff0000", silver: "#c0c0c0", teal: "#008080", white: "#ffffff", yellow: "#ffff00", transparent: [null, null, null, 0], _default: "#ffffff" } }(jQuery), function () { function i(e) { var i, s, n = e.ownerDocument.defaultView ? e.ownerDocument.defaultView.getComputedStyle(e, null) : e.currentStyle, a = {}; if (n && n.length && n[0] && n[n[0]]) for (s = n.length; s--;) i = n[s], "string" == typeof n[i] && (a[t.camelCase(i)] = n[i]); else for (i in n) "string" == typeof n[i] && (a[i] = n[i]); return a } function s(e, i) { var s, n, o = {}; for (s in i) n = i[s], e[s] !== n && (a[s] || (t.fx.step[s] || !isNaN(parseFloat(n))) && (o[s] = n)); return o } var n = ["add", "remove", "toggle"], a = { border: 1, borderBottom: 1, borderColor: 1, borderLeft: 1, borderRight: 1, borderTop: 1, borderWidth: 1, margin: 1, padding: 1 }; t.each(["borderLeftStyle", "borderRightStyle", "borderBottomStyle", "borderTopStyle"], function (e, i) { t.fx.step[i] = function (t) { ("none" !== t.end && !t.setAttr || 1 === t.pos && !t.setAttr) && (jQuery.style(t.elem, i, t.end), t.setAttr = !0) } }), t.fn.addBack || (t.fn.addBack = function (t) { return this.add(null == t ? this.prevObject : this.prevObject.filter(t)) }), t.effects.animateClass = function (e, a, o, r) { var h = t.speed(a, o, r); return this.queue(function () { var a, o = t(this), r = o.attr("class") || "", l = h.children ? o.find("*").addBack() : o; l = l.map(function () { var e = t(this); return { el: e, start: i(this) } }), a = function () { t.each(n, function (t, i) { e[i] && o[i + "Class"](e[i]) }) }, a(), l = l.map(function () { return this.end = i(this.el[0]), this.diff = s(this.start, this.end), this }), o.attr("class", r), l = l.map(function () { var e = this, i = t.Deferred(), s = t.extend({}, h, { queue: !1, complete: function () { i.resolve(e) } }); return this.el.animate(this.diff, s), i.promise() }), t.when.apply(t, l.get()).done(function () { a(), t.each(arguments, function () { var e = this.el; t.each(this.diff, function (t) { e.css(t, "") }) }), h.complete.call(o[0]) }) }) }, t.fn.extend({ addClass: function (e) { return function (i, s, n, a) { return s ? t.effects.animateClass.call(this, { add: i }, s, n, a) : e.apply(this, arguments) } }(t.fn.addClass), removeClass: function (e) { return function (i, s, n, a) { return arguments.length > 1 ? t.effects.animateClass.call(this, { remove: i }, s, n, a) : e.apply(this, arguments) } }(t.fn.removeClass), toggleClass: function (i) { return function (s, n, a, o, r) { return "boolean" == typeof n || n === e ? a ? t.effects.animateClass.call(this, n ? { add: s } : { remove: s }, a, o, r) : i.apply(this, arguments) : t.effects.animateClass.call(this, { toggle: s }, n, a, o) } }(t.fn.toggleClass), switchClass: function (e, i, s, n, a) { return t.effects.animateClass.call(this, { add: i, remove: e }, s, n, a) } }) }(), function () { function s(e, i, s, n) { return t.isPlainObject(e) && (i = e, e = e.effect), e = { effect: e }, null == i && (i = {}), t.isFunction(i) && (n = i, s = null, i = {}), ("number" == typeof i || t.fx.speeds[i]) && (n = s, s = i, i = {}), t.isFunction(s) && (n = s, s = null), i && t.extend(e, i), s = s || i.duration, e.duration = t.fx.off ? 0 : "number" == typeof s ? s : s in t.fx.speeds ? t.fx.speeds[s] : t.fx.speeds._default, e.complete = n || i.complete, e } function n(e) { return !e || "number" == typeof e || t.fx.speeds[e] ? !0 : "string" != typeof e || t.effects.effect[e] ? t.isFunction(e) ? !0 : "object" != typeof e || e.effect ? !1 : !0 : !0 } t.extend(t.effects, { version: "1.10.3", save: function (t, e) { for (var s = 0; e.length > s; s++) null !== e[s] && t.data(i + e[s], t[0].style[e[s]]) }, restore: function (t, s) { var n, a; for (a = 0; s.length > a; a++) null !== s[a] && (n = t.data(i + s[a]), n === e && (n = ""), t.css(s[a], n)) }, setMode: function (t, e) { return "toggle" === e && (e = t.is(":hidden") ? "show" : "hide"), e }, getBaseline: function (t, e) { var i, s; switch (t[0]) { case "top": i = 0; break; case "middle": i = .5; break; case "bottom": i = 1; break; default: i = t[0] / e.height } switch (t[1]) { case "left": s = 0; break; case "center": s = .5; break; case "right": s = 1; break; default: s = t[1] / e.width } return { x: s, y: i } }, createWrapper: function (e) { if (e.parent().is(".ui-effects-wrapper")) return e.parent(); var i = { width: e.outerWidth(!0), height: e.outerHeight(!0), "float": e.css("float") }, s = t("<div></div>").addClass("ui-effects-wrapper").css({ fontSize: "100%", background: "transparent", border: "none", margin: 0, padding: 0 }), n = { width: e.width(), height: e.height() }, a = document.activeElement; try { a.id } catch (o) { a = document.body } return e.wrap(s), (e[0] === a || t.contains(e[0], a)) && t(a).focus(), s = e.parent(), "static" === e.css("position") ? (s.css({ position: "relative" }), e.css({ position: "relative" })) : (t.extend(i, { position: e.css("position"), zIndex: e.css("z-index") }), t.each(["top", "left", "bottom", "right"], function (t, s) { i[s] = e.css(s), isNaN(parseInt(i[s], 10)) && (i[s] = "auto") }), e.css({ position: "relative", top: 0, left: 0, right: "auto", bottom: "auto" })), e.css(n), s.css(i).show() }, removeWrapper: function (e) { var i = document.activeElement; return e.parent().is(".ui-effects-wrapper") && (e.parent().replaceWith(e), (e[0] === i || t.contains(e[0], i)) && t(i).focus()), e }, setTransition: function (e, i, s, n) { return n = n || {}, t.each(i, function (t, i) { var a = e.cssUnit(i); a[0] > 0 && (n[i] = a[0] * s + a[1]) }), n } }), t.fn.extend({ effect: function () { function e(e) { function s() { t.isFunction(a) && a.call(n[0]), t.isFunction(e) && e() } var n = t(this), a = i.complete, r = i.mode; (n.is(":hidden") ? "hide" === r : "show" === r) ? (n[r](), s()) : o.call(n[0], i, s) } var i = s.apply(this, arguments), n = i.mode, a = i.queue, o = t.effects.effect[i.effect]; return t.fx.off || !o ? n ? this[n](i.duration, i.complete) : this.each(function () { i.complete && i.complete.call(this) }) : a === !1 ? this.each(e) : this.queue(a || "fx", e) }, show: function (t) { return function (e) { if (n(e)) return t.apply(this, arguments); var i = s.apply(this, arguments); return i.mode = "show", this.effect.call(this, i) } }(t.fn.show), hide: function (t) { return function (e) { if (n(e)) return t.apply(this, arguments); var i = s.apply(this, arguments); return i.mode = "hide", this.effect.call(this, i) } }(t.fn.hide), toggle: function (t) { return function (e) { if (n(e) || "boolean" == typeof e) return t.apply(this, arguments); var i = s.apply(this, arguments); return i.mode = "toggle", this.effect.call(this, i) } }(t.fn.toggle), cssUnit: function (e) { var i = this.css(e), s = []; return t.each(["em", "px", "%", "pt"], function (t, e) { i.indexOf(e) > 0 && (s = [parseFloat(i), e]) }), s } }) }(), function () { var e = {}; t.each(["Quad", "Cubic", "Quart", "Quint", "Expo"], function (t, i) { e[i] = function (e) { return Math.pow(e, t + 2) } }), t.extend(e, { Sine: function (t) { return 1 - Math.cos(t * Math.PI / 2) }, Circ: function (t) { return 1 - Math.sqrt(1 - t * t) }, Elastic: function (t) { return 0 === t || 1 === t ? t : -Math.pow(2, 8 * (t - 1)) * Math.sin((80 * (t - 1) - 7.5) * Math.PI / 15) }, Back: function (t) { return t * t * (3 * t - 2) }, Bounce: function (t) { for (var e, i = 4; ((e = Math.pow(2, --i)) - 1) / 11 > t;); return 1 / Math.pow(4, 3 - i) - 7.5625 * Math.pow((3 * e - 2) / 22 - t, 2) } }), t.each(e, function (e, i) { t.easing["easeIn" + e] = i, t.easing["easeOut" + e] = function (t) { return 1 - i(1 - t) }, t.easing["easeInOut" + e] = function (t) { return .5 > t ? i(2 * t) / 2 : 1 - i(-2 * t + 2) / 2 } }) }() })(jQuery); (function (t) { var e = /up|down|vertical/, i = /up|left|vertical|horizontal/; t.effects.effect.blind = function (s, n) { var a, o, r, h = t(this), l = ["position", "top", "bottom", "left", "right", "height", "width"], c = t.effects.setMode(h, s.mode || "hide"), u = s.direction || "up", d = e.test(u), p = d ? "height" : "width", f = d ? "top" : "left", m = i.test(u), g = {}, v = "show" === c; h.parent().is(".ui-effects-wrapper") ? t.effects.save(h.parent(), l) : t.effects.save(h, l), h.show(), a = t.effects.createWrapper(h).css({ overflow: "hidden" }), o = a[p](), r = parseFloat(a.css(f)) || 0, g[p] = v ? o : 0, m || (h.css(d ? "bottom" : "right", 0).css(d ? "top" : "left", "auto").css({ position: "absolute" }), g[f] = v ? r : o + r), v && (a.css(p, 0), m || a.css(f, r + o)), a.animate(g, { duration: s.duration, easing: s.easing, queue: !1, complete: function () { "hide" === c && h.hide(), t.effects.restore(h, l), t.effects.removeWrapper(h), n() } }) } })(jQuery); (function (t) { t.effects.effect.fade = function (e, i) { var s = t(this), n = t.effects.setMode(s, e.mode || "toggle"); s.animate({ opacity: n }, { queue: !1, duration: e.duration, easing: e.easing, complete: i }) } })(jQuery); (function (t) { t.effects.effect.slide = function (e, i) { var s, n = t(this), a = ["position", "top", "bottom", "left", "right", "width", "height"], o = t.effects.setMode(n, e.mode || "show"), r = "show" === o, h = e.direction || "left", l = "up" === h || "down" === h ? "top" : "left", c = "up" === h || "left" === h, u = {}; t.effects.save(n, a), n.show(), s = e.distance || n["top" === l ? "outerHeight" : "outerWidth"](!0), t.effects.createWrapper(n).css({ overflow: "hidden" }), r && n.css(l, c ? isNaN(s) ? "-" + s : -s : s), u[l] = (r ? c ? "+=" : "-=" : c ? "-=" : "+=") + s, n.animate(u, { queue: !1, duration: e.duration, easing: e.easing, complete: function () { "hide" === o && n.hide(), t.effects.restore(n, a), t.effects.removeWrapper(n), i() } }) } })(jQuery);


/*
 * jQuery timepicker addon
 * By: Trent Richardson [http://trentrichardson.com]
 * Version 1.3
 * Last Modified: 05/05/2013
 *
 * Copyright 2013 Trent Richardson
 * You may use this project under MIT or GPL licenses.
 * http://trentrichardson.com/Impromptu/GPL-LICENSE.txt
 * http://trentrichardson.com/Impromptu/MIT-LICENSE.txt
 */

/*jslint evil: true, white: false, undef: false, nomen: false */

(function ($) {

    /*
	* Lets not redefine timepicker, Prevent "Uncaught RangeError: Maximum call stack size exceeded"
	*/
    $.ui.timepicker = $.ui.timepicker || {};
    if ($.ui.timepicker.version) {
        return;
    }

    /*
	* Extend jQueryUI, get it started with our version number
	*/
    $.extend($.ui, {
        timepicker: {
            version: "1.3"
        }
    });

    /* 
	* Timepicker manager.
	* Use the singleton instance of this class, $.timepicker, to interact with the time picker.
	* Settings for (groups of) time pickers are maintained in an instance object,
	* allowing multiple different settings on the same page.
	*/
    var Timepicker = function () {
        this.regional = []; // Available regional settings, indexed by language code
        this.regional[''] = { // Default regional settings
            currentText: 'Now',
            closeText: 'Done',
            amNames: ['AM', 'A'],
            pmNames: ['PM', 'P'],
            timeFormat: 'HH:mm',
            timeSuffix: '',
            timeOnlyTitle: 'Choose Time',
            timeText: 'Time',
            hourText: 'Hour',
            minuteText: 'Minute',
            secondText: 'Second',
            millisecText: 'Millisecond',
            microsecText: 'Microsecond',
            timezoneText: 'Time Zone',
            isRTL: false
        };
        this._defaults = { // Global defaults for all the datetime picker instances
            showButtonPanel: true,
            timeOnly: false,
            showHour: null,
            showMinute: null,
            showSecond: null,
            showMillisec: null,
            showMicrosec: null,
            showTimezone: null,
            showTime: true,
            stepHour: 1,
            stepMinute: 1,
            stepSecond: 1,
            stepMillisec: 1,
            stepMicrosec: 1,
            hour: 0,
            minute: 0,
            second: 0,
            millisec: 0,
            microsec: 0,
            timezone: null,
            hourMin: 0,
            minuteMin: 0,
            secondMin: 0,
            millisecMin: 0,
            microsecMin: 0,
            hourMax: 23,
            minuteMax: 59,
            secondMax: 59,
            millisecMax: 999,
            microsecMax: 999,
            minDateTime: null,
            maxDateTime: null,
            onSelect: null,
            hourGrid: 0,
            minuteGrid: 0,
            secondGrid: 0,
            millisecGrid: 0,
            microsecGrid: 0,
            alwaysSetTime: true,
            separator: ' ',
            altFieldTimeOnly: true,
            altTimeFormat: null,
            altSeparator: null,
            altTimeSuffix: null,
            pickerTimeFormat: null,
            pickerTimeSuffix: null,
            showTimepicker: true,
            timezoneList: null,
            addSliderAccess: false,
            sliderAccessArgs: null,
            controlType: 'slider',
            defaultValue: null,
            parse: 'strict'
        };
        $.extend(this._defaults, this.regional['']);
    };

    $.extend(Timepicker.prototype, {
        $input: null,
        $altInput: null,
        $timeObj: null,
        inst: null,
        hour_slider: null,
        minute_slider: null,
        second_slider: null,
        millisec_slider: null,
        microsec_slider: null,
        timezone_select: null,
        hour: 0,
        minute: 0,
        second: 0,
        millisec: 0,
        microsec: 0,
        timezone: null,
        hourMinOriginal: null,
        minuteMinOriginal: null,
        secondMinOriginal: null,
        millisecMinOriginal: null,
        microsecMinOriginal: null,
        hourMaxOriginal: null,
        minuteMaxOriginal: null,
        secondMaxOriginal: null,
        millisecMaxOriginal: null,
        microsecMaxOriginal: null,
        ampm: '',
        formattedDate: '',
        formattedTime: '',
        formattedDateTime: '',
        timezoneList: null,
        units: ['hour', 'minute', 'second', 'millisec', 'microsec'],
        support: {},
        control: null,

        /* 
		* Override the default settings for all instances of the time picker.
		* @param  settings  object - the new settings to use as defaults (anonymous object)
		* @return the manager object
		*/
        setDefaults: function (settings) {
            extendRemove(this._defaults, settings || {});
            return this;
        },

        /*
		* Create a new Timepicker instance
		*/
        _newInst: function ($input, o) {
            var tp_inst = new Timepicker(),
				inlineSettings = {},
            	fns = {},
		    	overrides, i;

            for (var attrName in this._defaults) {
                if (this._defaults.hasOwnProperty(attrName)) {
                    var attrValue = $input.attr('time:' + attrName);
                    if (attrValue) {
                        try {
                            inlineSettings[attrName] = eval(attrValue);
                        } catch (err) {
                            inlineSettings[attrName] = attrValue;
                        }
                    }
                }
            }

            overrides = {
                beforeShow: function (input, dp_inst) {
                    if ($.isFunction(tp_inst._defaults.evnts.beforeShow)) {
                        return tp_inst._defaults.evnts.beforeShow.call($input[0], input, dp_inst, tp_inst);
                    }
                },
                onChangeMonthYear: function (year, month, dp_inst) {
                    // Update the time as well : this prevents the time from disappearing from the $input field.
                    tp_inst._updateDateTime(dp_inst);
                    if ($.isFunction(tp_inst._defaults.evnts.onChangeMonthYear)) {
                        tp_inst._defaults.evnts.onChangeMonthYear.call($input[0], year, month, dp_inst, tp_inst);
                    }
                },
                onClose: function (dateText, dp_inst) {
                    if (tp_inst.timeDefined === true && $input.val() !== '') {
                        tp_inst._updateDateTime(dp_inst);
                    }
                    if ($.isFunction(tp_inst._defaults.evnts.onClose)) {
                        tp_inst._defaults.evnts.onClose.call($input[0], dateText, dp_inst, tp_inst);
                    }
                }
            };
            for (i in overrides) {
                if (overrides.hasOwnProperty(i)) {
                    fns[i] = o[i] || null;
                }
            }

            tp_inst._defaults = $.extend({}, this._defaults, inlineSettings, o, overrides, {
                evnts: fns,
                timepicker: tp_inst // add timepicker as a property of datepicker: $.datepicker._get(dp_inst, 'timepicker');
            });
            tp_inst.amNames = $.map(tp_inst._defaults.amNames, function (val) {
                return val.toUpperCase();
            });
            tp_inst.pmNames = $.map(tp_inst._defaults.pmNames, function (val) {
                return val.toUpperCase();
            });

            // detect which units are supported
            tp_inst.support = detectSupport(
					tp_inst._defaults.timeFormat +
					(tp_inst._defaults.pickerTimeFormat ? tp_inst._defaults.pickerTimeFormat : '') +
					(tp_inst._defaults.altTimeFormat ? tp_inst._defaults.altTimeFormat : ''));

            // controlType is string - key to our this._controls
            if (typeof (tp_inst._defaults.controlType) === 'string') {
                if (tp_inst._defaults.controlType == 'slider' && typeof (jQuery.ui.slider) === 'undefined') {
                    tp_inst._defaults.controlType = 'select';
                }
                tp_inst.control = tp_inst._controls[tp_inst._defaults.controlType];
            }
                // controlType is an object and must implement create, options, value methods
            else {
                tp_inst.control = tp_inst._defaults.controlType;
            }

            // prep the timezone options
            var timezoneList = [-720, -660, -600, -570, -540, -480, -420, -360, -300, -270, -240, -210, -180, -120, -60,
					0, 60, 120, 180, 210, 240, 270, 300, 330, 345, 360, 390, 420, 480, 525, 540, 570, 600, 630, 660, 690, 720, 765, 780, 840];
            if (tp_inst._defaults.timezoneList !== null) {
                timezoneList = tp_inst._defaults.timezoneList;
            }
            var tzl = timezoneList.length, tzi = 0, tzv = null;
            if (tzl > 0 && typeof timezoneList[0] !== 'object') {
                for (; tzi < tzl; tzi++) {
                    tzv = timezoneList[tzi];
                    timezoneList[tzi] = { value: tzv, label: $.timepicker.timezoneOffsetString(tzv, tp_inst.support.iso8601) };
                }
            }
            tp_inst._defaults.timezoneList = timezoneList;

            // set the default units
            tp_inst.timezone = tp_inst._defaults.timezone !== null ? $.timepicker.timezoneOffsetNumber(tp_inst._defaults.timezone) :
							((new Date()).getTimezoneOffset() * -1);
            tp_inst.hour = tp_inst._defaults.hour < tp_inst._defaults.hourMin ? tp_inst._defaults.hourMin :
							tp_inst._defaults.hour > tp_inst._defaults.hourMax ? tp_inst._defaults.hourMax : tp_inst._defaults.hour;
            tp_inst.minute = tp_inst._defaults.minute < tp_inst._defaults.minuteMin ? tp_inst._defaults.minuteMin :
							tp_inst._defaults.minute > tp_inst._defaults.minuteMax ? tp_inst._defaults.minuteMax : tp_inst._defaults.minute;
            tp_inst.second = tp_inst._defaults.second < tp_inst._defaults.secondMin ? tp_inst._defaults.secondMin :
							tp_inst._defaults.second > tp_inst._defaults.secondMax ? tp_inst._defaults.secondMax : tp_inst._defaults.second;
            tp_inst.millisec = tp_inst._defaults.millisec < tp_inst._defaults.millisecMin ? tp_inst._defaults.millisecMin :
							tp_inst._defaults.millisec > tp_inst._defaults.millisecMax ? tp_inst._defaults.millisecMax : tp_inst._defaults.millisec;
            tp_inst.microsec = tp_inst._defaults.microsec < tp_inst._defaults.microsecMin ? tp_inst._defaults.microsecMin :
							tp_inst._defaults.microsec > tp_inst._defaults.microsecMax ? tp_inst._defaults.microsecMax : tp_inst._defaults.microsec;
            tp_inst.ampm = '';
            tp_inst.$input = $input;

            if (o.altField) {
                tp_inst.$altInput = $(o.altField).css({
                    cursor: 'pointer'
                }).focus(function () {
                    $input.trigger("focus");
                });
            }

            if (tp_inst._defaults.minDate === 0 || tp_inst._defaults.minDateTime === 0) {
                tp_inst._defaults.minDate = new Date();
            }
            if (tp_inst._defaults.maxDate === 0 || tp_inst._defaults.maxDateTime === 0) {
                tp_inst._defaults.maxDate = new Date();
            }

            // datepicker needs minDate/maxDate, timepicker needs minDateTime/maxDateTime..
            if (tp_inst._defaults.minDate !== undefined && tp_inst._defaults.minDate instanceof Date) {
                tp_inst._defaults.minDateTime = new Date(tp_inst._defaults.minDate.getTime());
            }
            if (tp_inst._defaults.minDateTime !== undefined && tp_inst._defaults.minDateTime instanceof Date) {
                tp_inst._defaults.minDate = new Date(tp_inst._defaults.minDateTime.getTime());
            }
            if (tp_inst._defaults.maxDate !== undefined && tp_inst._defaults.maxDate instanceof Date) {
                tp_inst._defaults.maxDateTime = new Date(tp_inst._defaults.maxDate.getTime());
            }
            if (tp_inst._defaults.maxDateTime !== undefined && tp_inst._defaults.maxDateTime instanceof Date) {
                tp_inst._defaults.maxDate = new Date(tp_inst._defaults.maxDateTime.getTime());
            }
            tp_inst.$input.bind('focus', function () {
                tp_inst._onFocus();
            });

            return tp_inst;
        },

        /*
		* add our sliders to the calendar
		*/
        _addTimePicker: function (dp_inst) {
            var currDT = (this.$altInput && this._defaults.altFieldTimeOnly) ? this.$input.val() + ' ' + this.$altInput.val() : this.$input.val();

            this.timeDefined = this._parseTime(currDT);
            this._limitMinMaxDateTime(dp_inst, false);
            this._injectTimePicker();
        },

        /*
		* parse the time string from input value or _setTime
		*/
        _parseTime: function (timeString, withDate) {
            if (!this.inst) {
                this.inst = $.datepicker._getInst(this.$input[0]);
            }

            if (withDate || !this._defaults.timeOnly) {
                var dp_dateFormat = $.datepicker._get(this.inst, 'dateFormat');
                try {
                    var parseRes = parseDateTimeInternal(dp_dateFormat, this._defaults.timeFormat, timeString, $.datepicker._getFormatConfig(this.inst), this._defaults);
                    if (!parseRes.timeObj) {
                        return false;
                    }
                    $.extend(this, parseRes.timeObj);
                } catch (err) {
                    $.timepicker.log("Error parsing the date/time string: " + err +
									"\ndate/time string = " + timeString +
									"\ntimeFormat = " + this._defaults.timeFormat +
									"\ndateFormat = " + dp_dateFormat);
                    return false;
                }
                return true;
            } else {
                var timeObj = $.datepicker.parseTime(this._defaults.timeFormat, timeString, this._defaults);
                if (!timeObj) {
                    return false;
                }
                $.extend(this, timeObj);
                return true;
            }
        },

        /*
		* generate and inject html for timepicker into ui datepicker
		*/
        _injectTimePicker: function () {
            var $dp = this.inst.dpDiv,
				o = this.inst.settings,
				tp_inst = this,
				litem = '',
				uitem = '',
				show = null,
				max = {},
				gridSize = {},
				size = null,
				i = 0,
				l = 0;

            // Prevent displaying twice
            if ($dp.find("div.ui-timepicker-div").length === 0 && o.showTimepicker) {
                var noDisplay = ' style="display:none;"',
					html = '<div class="ui-timepicker-div' + (o.isRTL ? ' ui-timepicker-rtl' : '') + '"><dl>' + '<dt class="ui_tpicker_time_label"' + ((o.showTime) ? '' : noDisplay) + '>' + o.timeText + '</dt>' +
								'<dd class="ui_tpicker_time"' + ((o.showTime) ? '' : noDisplay) + '></dd>';

                // Create the markup
                for (i = 0, l = this.units.length; i < l; i++) {
                    litem = this.units[i];
                    uitem = litem.substr(0, 1).toUpperCase() + litem.substr(1);
                    show = o['show' + uitem] !== null ? o['show' + uitem] : this.support[litem];

                    // Added by Peter Medeiros:
                    // - Figure out what the hour/minute/second max should be based on the step values.
                    // - Example: if stepMinute is 15, then minMax is 45.
                    max[litem] = parseInt((o[litem + 'Max'] - ((o[litem + 'Max'] - o[litem + 'Min']) % o['step' + uitem])), 10);
                    gridSize[litem] = 0;

                    html += '<dt class="ui_tpicker_' + litem + '_label"' + (show ? '' : noDisplay) + '>' + o[litem + 'Text'] + '</dt>' +
								'<dd class="ui_tpicker_' + litem + '"><div class="ui_tpicker_' + litem + '_slider"' + (show ? '' : noDisplay) + '></div>';

                    if (show && o[litem + 'Grid'] > 0) {
                        html += '<div style="padding-left: 1px"><table class="ui-tpicker-grid-label"><tr>';

                        if (litem == 'hour') {
                            for (var h = o[litem + 'Min']; h <= max[litem]; h += parseInt(o[litem + 'Grid'], 10)) {
                                gridSize[litem]++;
                                var tmph = $.datepicker.formatTime(this.support.ampm ? 'hht' : 'HH', { hour: h }, o);
                                html += '<td data-for="' + litem + '">' + tmph + '</td>';
                            }
                        }
                        else {
                            for (var m = o[litem + 'Min']; m <= max[litem]; m += parseInt(o[litem + 'Grid'], 10)) {
                                gridSize[litem]++;
                                html += '<td data-for="' + litem + '">' + ((m < 10) ? '0' : '') + m + '</td>';
                            }
                        }

                        html += '</tr></table></div>';
                    }
                    html += '</dd>';
                }

                // Timezone
                var showTz = o.showTimezone !== null ? o.showTimezone : this.support.timezone;
                html += '<dt class="ui_tpicker_timezone_label"' + (showTz ? '' : noDisplay) + '>' + o.timezoneText + '</dt>';
                html += '<dd class="ui_tpicker_timezone" ' + (showTz ? '' : noDisplay) + '></dd>';

                // Create the elements from string
                html += '</dl></div>';
                var $tp = $(html);

                // if we only want time picker...
                if (o.timeOnly === true) {
                    $tp.prepend('<div class="ui-widget-header ui-helper-clearfix ui-corner-all">' + '<div class="ui-datepicker-title">' + o.timeOnlyTitle + '</div>' + '</div>');
                    $dp.find('.ui-datepicker-header, .ui-datepicker-calendar').hide();
                }

                // add sliders, adjust grids, add events
                for (i = 0, l = tp_inst.units.length; i < l; i++) {
                    litem = tp_inst.units[i];
                    uitem = litem.substr(0, 1).toUpperCase() + litem.substr(1);
                    show = o['show' + uitem] !== null ? o['show' + uitem] : this.support[litem];

                    // add the slider
                    tp_inst[litem + '_slider'] = tp_inst.control.create(tp_inst, $tp.find('.ui_tpicker_' + litem + '_slider'), litem, tp_inst[litem], o[litem + 'Min'], max[litem], o['step' + uitem]);

                    // adjust the grid and add click event
                    if (show && o[litem + 'Grid'] > 0) {
                        size = 100 * gridSize[litem] * o[litem + 'Grid'] / (max[litem] - o[litem + 'Min']);
                        $tp.find('.ui_tpicker_' + litem + ' table').css({
                            width: size + "%",
                            marginLeft: o.isRTL ? '0' : ((size / (-2 * gridSize[litem])) + "%"),
                            marginRight: o.isRTL ? ((size / (-2 * gridSize[litem])) + "%") : '0',
                            borderCollapse: 'collapse'
                        }).find("td").click(function (e) {
                            var $t = $(this),
                                h = $t.html(),
                                n = parseInt(h.replace(/[^0-9]/g), 10),
                                ap = h.replace(/[^apm]/ig),
                                f = $t.data('for'); // loses scope, so we use data-for

                            if (f == 'hour') {
                                if (ap.indexOf('p') !== -1 && n < 12) {
                                    n += 12;
                                }
                                else {
                                    if (ap.indexOf('a') !== -1 && n === 12) {
                                        n = 0;
                                    }
                                }
                            }

                            tp_inst.control.value(tp_inst, tp_inst[f + '_slider'], litem, n);

                            tp_inst._onTimeChange();
                            tp_inst._onSelectHandler();
                        }).css({
                            cursor: 'pointer',
                            width: (100 / gridSize[litem]) + '%',
                            textAlign: 'center',
                            overflow: 'hidden'
                        });
                    } // end if grid > 0
                } // end for loop

                // Add timezone options
                this.timezone_select = $tp.find('.ui_tpicker_timezone').append('<select></select>').find("select");
                $.fn.append.apply(this.timezone_select,
				$.map(o.timezoneList, function (val, idx) {
				    return $("<option />").val(typeof val == "object" ? val.value : val).text(typeof val == "object" ? val.label : val);
				}));
                if (typeof (this.timezone) != "undefined" && this.timezone !== null && this.timezone !== "") {
                    var local_timezone = (new Date(this.inst.selectedYear, this.inst.selectedMonth, this.inst.selectedDay, 12)).getTimezoneOffset() * -1;
                    if (local_timezone == this.timezone) {
                        selectLocalTimezone(tp_inst);
                    } else {
                        this.timezone_select.val(this.timezone);
                    }
                } else {
                    if (typeof (this.hour) != "undefined" && this.hour !== null && this.hour !== "") {
                        this.timezone_select.val(o.timezone);
                    } else {
                        selectLocalTimezone(tp_inst);
                    }
                }
                this.timezone_select.change(function () {
                    tp_inst._onTimeChange();
                    tp_inst._onSelectHandler();
                });
                // End timezone options

                // inject timepicker into datepicker
                var $buttonPanel = $dp.find('.ui-datepicker-buttonpane');
                if ($buttonPanel.length) {
                    $buttonPanel.before($tp);
                } else {
                    $dp.append($tp);
                }

                this.$timeObj = $tp.find('.ui_tpicker_time');

                if (this.inst !== null) {
                    var timeDefined = this.timeDefined;
                    this._onTimeChange();
                    this.timeDefined = timeDefined;
                }

                // slideAccess integration: http://trentrichardson.com/2011/11/11/jquery-ui-sliders-and-touch-accessibility/
                if (this._defaults.addSliderAccess) {
                    var sliderAccessArgs = this._defaults.sliderAccessArgs,
						rtl = this._defaults.isRTL;
                    sliderAccessArgs.isRTL = rtl;

                    setTimeout(function () { // fix for inline mode
                        if ($tp.find('.ui-slider-access').length === 0) {
                            $tp.find('.ui-slider:visible').sliderAccess(sliderAccessArgs);

                            // fix any grids since sliders are shorter
                            var sliderAccessWidth = $tp.find('.ui-slider-access:eq(0)').outerWidth(true);
                            if (sliderAccessWidth) {
                                $tp.find('table:visible').each(function () {
                                    var $g = $(this),
										oldWidth = $g.outerWidth(),
										oldMarginLeft = $g.css(rtl ? 'marginRight' : 'marginLeft').toString().replace('%', ''),
										newWidth = oldWidth - sliderAccessWidth,
										newMarginLeft = ((oldMarginLeft * newWidth) / oldWidth) + '%',
										css = { width: newWidth, marginRight: 0, marginLeft: 0 };
                                    css[rtl ? 'marginRight' : 'marginLeft'] = newMarginLeft;
                                    $g.css(css);
                                });
                            }
                        }
                    }, 10);
                }
                // end slideAccess integration

            }
        },

        /*
		* This function tries to limit the ability to go outside the
		* min/max date range
		*/
        _limitMinMaxDateTime: function (dp_inst, adjustSliders) {
            var o = this._defaults,
				dp_date = new Date(dp_inst.selectedYear, dp_inst.selectedMonth, dp_inst.selectedDay);

            if (!this._defaults.showTimepicker) {
                return;
            } // No time so nothing to check here

            if ($.datepicker._get(dp_inst, 'minDateTime') !== null && $.datepicker._get(dp_inst, 'minDateTime') !== undefined && dp_date) {
                var minDateTime = $.datepicker._get(dp_inst, 'minDateTime'),
					minDateTimeDate = new Date(minDateTime.getFullYear(), minDateTime.getMonth(), minDateTime.getDate(), 0, 0, 0, 0);

                if (this.hourMinOriginal === null || this.minuteMinOriginal === null || this.secondMinOriginal === null || this.millisecMinOriginal === null || this.microsecMinOriginal === null) {
                    this.hourMinOriginal = o.hourMin;
                    this.minuteMinOriginal = o.minuteMin;
                    this.secondMinOriginal = o.secondMin;
                    this.millisecMinOriginal = o.millisecMin;
                    this.microsecMinOriginal = o.microsecMin;
                }

                if (dp_inst.settings.timeOnly || minDateTimeDate.getTime() == dp_date.getTime()) {
                    this._defaults.hourMin = minDateTime.getHours();
                    if (this.hour <= this._defaults.hourMin) {
                        this.hour = this._defaults.hourMin;
                        this._defaults.minuteMin = minDateTime.getMinutes();
                        if (this.minute <= this._defaults.minuteMin) {
                            this.minute = this._defaults.minuteMin;
                            this._defaults.secondMin = minDateTime.getSeconds();
                            if (this.second <= this._defaults.secondMin) {
                                this.second = this._defaults.secondMin;
                                this._defaults.millisecMin = minDateTime.getMilliseconds();
                                if (this.millisec <= this._defaults.millisecMin) {
                                    this.millisec = this._defaults.millisecMin;
                                    this._defaults.microsecMin = minDateTime.getMicroseconds();
                                } else {
                                    if (this.microsec < this._defaults.microsecMin) {
                                        this.microsec = this._defaults.microsecMin;
                                    }
                                    this._defaults.microsecMin = this.microsecMinOriginal;
                                }
                            } else {
                                this._defaults.millisecMin = this.millisecMinOriginal;
                                this._defaults.microsecMin = this.microsecMinOriginal;
                            }
                        } else {
                            this._defaults.secondMin = this.secondMinOriginal;
                            this._defaults.millisecMin = this.millisecMinOriginal;
                            this._defaults.microsecMin = this.microsecMinOriginal;
                        }
                    } else {
                        this._defaults.minuteMin = this.minuteMinOriginal;
                        this._defaults.secondMin = this.secondMinOriginal;
                        this._defaults.millisecMin = this.millisecMinOriginal;
                        this._defaults.microsecMin = this.microsecMinOriginal;
                    }
                } else {
                    this._defaults.hourMin = this.hourMinOriginal;
                    this._defaults.minuteMin = this.minuteMinOriginal;
                    this._defaults.secondMin = this.secondMinOriginal;
                    this._defaults.millisecMin = this.millisecMinOriginal;
                    this._defaults.microsecMin = this.microsecMinOriginal;
                }
            }

            if ($.datepicker._get(dp_inst, 'maxDateTime') !== null && $.datepicker._get(dp_inst, 'maxDateTime') !== undefined && dp_date) {
                var maxDateTime = $.datepicker._get(dp_inst, 'maxDateTime'),
					maxDateTimeDate = new Date(maxDateTime.getFullYear(), maxDateTime.getMonth(), maxDateTime.getDate(), 0, 0, 0, 0);

                if (this.hourMaxOriginal === null || this.minuteMaxOriginal === null || this.secondMaxOriginal === null || this.millisecMaxOriginal === null) {
                    this.hourMaxOriginal = o.hourMax;
                    this.minuteMaxOriginal = o.minuteMax;
                    this.secondMaxOriginal = o.secondMax;
                    this.millisecMaxOriginal = o.millisecMax;
                    this.microsecMaxOriginal = o.microsecMax;
                }

                if (dp_inst.settings.timeOnly || maxDateTimeDate.getTime() == dp_date.getTime()) {
                    this._defaults.hourMax = maxDateTime.getHours();
                    if (this.hour >= this._defaults.hourMax) {
                        this.hour = this._defaults.hourMax;
                        this._defaults.minuteMax = maxDateTime.getMinutes();
                        if (this.minute >= this._defaults.minuteMax) {
                            this.minute = this._defaults.minuteMax;
                            this._defaults.secondMax = maxDateTime.getSeconds();
                            if (this.second >= this._defaults.secondMax) {
                                this.second = this._defaults.secondMax;
                                this._defaults.millisecMax = maxDateTime.getMilliseconds();
                                if (this.millisec >= this._defaults.millisecMax) {
                                    this.millisec = this._defaults.millisecMax;
                                    this._defaults.microsecMax = maxDateTime.getMicroseconds();
                                } else {
                                    if (this.microsec > this._defaults.microsecMax) {
                                        this.microsec = this._defaults.microsecMax;
                                    }
                                    this._defaults.microsecMax = this.microsecMaxOriginal;
                                }
                            } else {
                                this._defaults.millisecMax = this.millisecMaxOriginal;
                                this._defaults.microsecMax = this.microsecMaxOriginal;
                            }
                        } else {
                            this._defaults.secondMax = this.secondMaxOriginal;
                            this._defaults.millisecMax = this.millisecMaxOriginal;
                            this._defaults.microsecMax = this.microsecMaxOriginal;
                        }
                    } else {
                        this._defaults.minuteMax = this.minuteMaxOriginal;
                        this._defaults.secondMax = this.secondMaxOriginal;
                        this._defaults.millisecMax = this.millisecMaxOriginal;
                        this._defaults.microsecMax = this.microsecMaxOriginal;
                    }
                } else {
                    this._defaults.hourMax = this.hourMaxOriginal;
                    this._defaults.minuteMax = this.minuteMaxOriginal;
                    this._defaults.secondMax = this.secondMaxOriginal;
                    this._defaults.millisecMax = this.millisecMaxOriginal;
                    this._defaults.microsecMax = this.microsecMaxOriginal;
                }
            }

            if (adjustSliders !== undefined && adjustSliders === true) {
                var hourMax = parseInt((this._defaults.hourMax - ((this._defaults.hourMax - this._defaults.hourMin) % this._defaults.stepHour)), 10),
					minMax = parseInt((this._defaults.minuteMax - ((this._defaults.minuteMax - this._defaults.minuteMin) % this._defaults.stepMinute)), 10),
					secMax = parseInt((this._defaults.secondMax - ((this._defaults.secondMax - this._defaults.secondMin) % this._defaults.stepSecond)), 10),
					millisecMax = parseInt((this._defaults.millisecMax - ((this._defaults.millisecMax - this._defaults.millisecMin) % this._defaults.stepMillisec)), 10);
                microsecMax = parseInt((this._defaults.microsecMax - ((this._defaults.microsecMax - this._defaults.microsecMin) % this._defaults.stepMicrosec)), 10);

                if (this.hour_slider) {
                    this.control.options(this, this.hour_slider, 'hour', { min: this._defaults.hourMin, max: hourMax });
                    this.control.value(this, this.hour_slider, 'hour', this.hour - (this.hour % this._defaults.stepHour));
                }
                if (this.minute_slider) {
                    this.control.options(this, this.minute_slider, 'minute', { min: this._defaults.minuteMin, max: minMax });
                    this.control.value(this, this.minute_slider, 'minute', this.minute - (this.minute % this._defaults.stepMinute));
                }
                if (this.second_slider) {
                    this.control.options(this, this.second_slider, 'second', { min: this._defaults.secondMin, max: secMax });
                    this.control.value(this, this.second_slider, 'second', this.second - (this.second % this._defaults.stepSecond));
                }
                if (this.millisec_slider) {
                    this.control.options(this, this.millisec_slider, 'millisec', { min: this._defaults.millisecMin, max: millisecMax });
                    this.control.value(this, this.millisec_slider, 'millisec', this.millisec - (this.millisec % this._defaults.stepMillisec));
                }
                if (this.microsec_slider) {
                    this.control.options(this, this.microsec_slider, 'microsec', { min: this._defaults.microsecMin, max: microsecMax });
                    this.control.value(this, this.microsec_slider, 'microsec', this.microsec - (this.microsec % this._defaults.stepMicrosec));
                }
            }

        },

        /*
		* when a slider moves, set the internal time...
		* on time change is also called when the time is updated in the text field
		*/
        _onTimeChange: function () {
            var hour = (this.hour_slider) ? this.control.value(this, this.hour_slider, 'hour') : false,
				minute = (this.minute_slider) ? this.control.value(this, this.minute_slider, 'minute') : false,
				second = (this.second_slider) ? this.control.value(this, this.second_slider, 'second') : false,
				millisec = (this.millisec_slider) ? this.control.value(this, this.millisec_slider, 'millisec') : false,
				microsec = (this.microsec_slider) ? this.control.value(this, this.microsec_slider, 'microsec') : false,
				timezone = (this.timezone_select) ? this.timezone_select.val() : false,
				o = this._defaults,
				pickerTimeFormat = o.pickerTimeFormat || o.timeFormat,
				pickerTimeSuffix = o.pickerTimeSuffix || o.timeSuffix;

            if (typeof (hour) == 'object') {
                hour = false;
            }
            if (typeof (minute) == 'object') {
                minute = false;
            }
            if (typeof (second) == 'object') {
                second = false;
            }
            if (typeof (millisec) == 'object') {
                millisec = false;
            }
            if (typeof (microsec) == 'object') {
                microsec = false;
            }
            if (typeof (timezone) == 'object') {
                timezone = false;
            }

            if (hour !== false) {
                hour = parseInt(hour, 10);
            }
            if (minute !== false) {
                minute = parseInt(minute, 10);
            }
            if (second !== false) {
                second = parseInt(second, 10);
            }
            if (millisec !== false) {
                millisec = parseInt(millisec, 10);
            }
            if (microsec !== false) {
                microsec = parseInt(microsec, 10);
            }

            var ampm = o[hour < 12 ? 'amNames' : 'pmNames'][0];

            // If the update was done in the input field, the input field should not be updated.
            // If the update was done using the sliders, update the input field.
            var hasChanged = (hour != this.hour || minute != this.minute || second != this.second || millisec != this.millisec || microsec != this.microsec
								|| (this.ampm.length > 0 && (hour < 12) != ($.inArray(this.ampm.toUpperCase(), this.amNames) !== -1))
								|| (this.timezone !== null && timezone != this.timezone));

            if (hasChanged) {

                if (hour !== false) {
                    this.hour = hour;
                }
                if (minute !== false) {
                    this.minute = minute;
                }
                if (second !== false) {
                    this.second = second;
                }
                if (millisec !== false) {
                    this.millisec = millisec;
                }
                if (microsec !== false) {
                    this.microsec = microsec;
                }
                if (timezone !== false) {
                    this.timezone = timezone;
                }

                if (!this.inst) {
                    this.inst = $.datepicker._getInst(this.$input[0]);
                }

                this._limitMinMaxDateTime(this.inst, true);
            }
            if (this.support.ampm) {
                this.ampm = ampm;
            }

            // Updates the time within the timepicker
            this.formattedTime = $.datepicker.formatTime(o.timeFormat, this, o);
            if (this.$timeObj) {
                if (pickerTimeFormat === o.timeFormat) {
                    this.$timeObj.text(this.formattedTime + pickerTimeSuffix);
                }
                else {
                    this.$timeObj.text($.datepicker.formatTime(pickerTimeFormat, this, o) + pickerTimeSuffix);
                }
            }

            this.timeDefined = true;
            if (hasChanged) {
                this._updateDateTime();
            }
        },

        /*
		* call custom onSelect.
		* bind to sliders slidestop, and grid click.
		*/
        _onSelectHandler: function () {
            var onSelect = this._defaults.onSelect || this.inst.settings.onSelect;
            var inputEl = this.$input ? this.$input[0] : null;
            if (onSelect && inputEl) {
                onSelect.apply(inputEl, [this.formattedDateTime, this]);
            }
        },

        /*
		* update our input with the new date time..
		*/
        _updateDateTime: function (dp_inst) {
            dp_inst = this.inst || dp_inst;
            var dt = $.datepicker._daylightSavingAdjust(new Date(dp_inst.selectedYear, dp_inst.selectedMonth, dp_inst.selectedDay)),
				dateFmt = $.datepicker._get(dp_inst, 'dateFormat'),
				formatCfg = $.datepicker._getFormatConfig(dp_inst),
				timeAvailable = dt !== null && this.timeDefined;
            this.formattedDate = $.datepicker.formatDate(dateFmt, (dt === null ? new Date() : dt), formatCfg);
            var formattedDateTime = this.formattedDate;

            // if a slider was changed but datepicker doesn't have a value yet, set it
            if (dp_inst.lastVal === "") {
                dp_inst.currentYear = dp_inst.selectedYear;
                dp_inst.currentMonth = dp_inst.selectedMonth;
                dp_inst.currentDay = dp_inst.selectedDay;
            }

            /*
			* remove following lines to force every changes in date picker to change the input value
			* Bug descriptions: when an input field has a default value, and click on the field to pop up the date picker. 
			* If the user manually empty the value in the input field, the date picker will never change selected value.
			*/
            //if (dp_inst.lastVal !== undefined && (dp_inst.lastVal.length > 0 && this.$input.val().length === 0)) {
            //	return;
            //}

            if (this._defaults.timeOnly === true) {
                formattedDateTime = this.formattedTime;
            } else if (this._defaults.timeOnly !== true && (this._defaults.alwaysSetTime || timeAvailable)) {
                formattedDateTime += this._defaults.separator + this.formattedTime + this._defaults.timeSuffix;
            }

            this.formattedDateTime = formattedDateTime;

            if (!this._defaults.showTimepicker) {
                this.$input.val(this.formattedDate);
            } else if (this.$altInput && this._defaults.timeOnly === false && this._defaults.altFieldTimeOnly === true) {
                this.$altInput.val(this.formattedTime);
                this.$input.val(this.formattedDate);
            } else if (this.$altInput) {
                this.$input.val(formattedDateTime);
                var altFormattedDateTime = '',
					altSeparator = this._defaults.altSeparator ? this._defaults.altSeparator : this._defaults.separator,
					altTimeSuffix = this._defaults.altTimeSuffix ? this._defaults.altTimeSuffix : this._defaults.timeSuffix;

                if (!this._defaults.timeOnly) {
                    if (this._defaults.altFormat) {
                        altFormattedDateTime = $.datepicker.formatDate(this._defaults.altFormat, (dt === null ? new Date() : dt), formatCfg);
                    }
                    else {
                        altFormattedDateTime = this.formattedDate;
                    }

                    if (altFormattedDateTime) {
                        altFormattedDateTime += altSeparator;
                    }
                }

                if (this._defaults.altTimeFormat) {
                    altFormattedDateTime += $.datepicker.formatTime(this._defaults.altTimeFormat, this, this._defaults) + altTimeSuffix;
                }
                else {
                    altFormattedDateTime += this.formattedTime + altTimeSuffix;
                }
                this.$altInput.val(altFormattedDateTime);
            } else {
                this.$input.val(formattedDateTime);
            }

            this.$input.trigger("change");
        },

        _onFocus: function () {
            if (!this.$input.val() && this._defaults.defaultValue) {
                this.$input.val(this._defaults.defaultValue);
                var inst = $.datepicker._getInst(this.$input.get(0)),
					tp_inst = $.datepicker._get(inst, 'timepicker');
                if (tp_inst) {
                    if (tp_inst._defaults.timeOnly && (inst.input.val() != inst.lastVal)) {
                        try {
                            $.datepicker._updateDatepicker(inst);
                        } catch (err) {
                            $.timepicker.log(err);
                        }
                    }
                }
            }
        },

        /*
		* Small abstraction to control types
		* We can add more, just be sure to follow the pattern: create, options, value
		*/
        _controls: {
            // slider methods
            slider: {
                create: function (tp_inst, obj, unit, val, min, max, step) {
                    var rtl = tp_inst._defaults.isRTL; // if rtl go -60->0 instead of 0->60
                    return obj.prop('slide', null).slider({
                        orientation: "horizontal",
                        value: rtl ? val * -1 : val,
                        min: rtl ? max * -1 : min,
                        max: rtl ? min * -1 : max,
                        step: step,
                        slide: function (event, ui) {
                            tp_inst.control.value(tp_inst, $(this), unit, rtl ? ui.value * -1 : ui.value);
                            tp_inst._onTimeChange();
                        },
                        stop: function (event, ui) {
                            tp_inst._onSelectHandler();
                        }
                    });
                },
                options: function (tp_inst, obj, unit, opts, val) {
                    if (tp_inst._defaults.isRTL) {
                        if (typeof (opts) == 'string') {
                            if (opts == 'min' || opts == 'max') {
                                if (val !== undefined) {
                                    return obj.slider(opts, val * -1);
                                }
                                return Math.abs(obj.slider(opts));
                            }
                            return obj.slider(opts);
                        }
                        var min = opts.min,
							max = opts.max;
                        opts.min = opts.max = null;
                        if (min !== undefined) {
                            opts.max = min * -1;
                        }
                        if (max !== undefined) {
                            opts.min = max * -1;
                        }
                        return obj.slider(opts);
                    }
                    if (typeof (opts) == 'string' && val !== undefined) {
                        return obj.slider(opts, val);
                    }
                    return obj.slider(opts);
                },
                value: function (tp_inst, obj, unit, val) {
                    if (tp_inst._defaults.isRTL) {
                        if (val !== undefined) {
                            return obj.slider('value', val * -1);
                        }
                        return Math.abs(obj.slider('value'));
                    }
                    if (val !== undefined) {
                        return obj.slider('value', val);
                    }
                    return obj.slider('value');
                }
            },
            // select methods
            select: {
                create: function (tp_inst, obj, unit, val, min, max, step) {
                    var sel = '<select class="ui-timepicker-select" data-unit="' + unit + '" data-min="' + min + '" data-max="' + max + '" data-step="' + step + '">',
						format = tp_inst._defaults.pickerTimeFormat || tp_inst._defaults.timeFormat;

                    for (var i = min; i <= max; i += step) {
                        sel += '<option value="' + i + '"' + (i == val ? ' selected' : '') + '>';
                        if (unit == 'hour') {
                            sel += $.datepicker.formatTime($.trim(format.replace(/[^ht ]/ig, '')), { hour: i }, tp_inst._defaults);
                        }
                        else if (unit == 'millisec' || unit == 'microsec' || i >= 10) { sel += i; }
                        else { sel += '0' + i.toString(); }
                        sel += '</option>';
                    }
                    sel += '</select>';

                    obj.children('select').remove();

                    $(sel).appendTo(obj).change(function (e) {
                        tp_inst._onTimeChange();
                        tp_inst._onSelectHandler();
                    });

                    return obj;
                },
                options: function (tp_inst, obj, unit, opts, val) {
                    var o = {},
						$t = obj.children('select');
                    if (typeof (opts) == 'string') {
                        if (val === undefined) {
                            return $t.data(opts);
                        }
                        o[opts] = val;
                    }
                    else { o = opts; }
                    return tp_inst.control.create(tp_inst, obj, $t.data('unit'), $t.val(), o.min || $t.data('min'), o.max || $t.data('max'), o.step || $t.data('step'));
                },
                value: function (tp_inst, obj, unit, val) {
                    var $t = obj.children('select');
                    if (val !== undefined) {
                        return $t.val(val);
                    }
                    return $t.val();
                }
            }
        } // end _controls

    });

    $.fn.extend({
        /*
		* shorthand just to use timepicker..
		*/
        timepicker: function (o) {
            o = o || {};
            var tmp_args = Array.prototype.slice.call(arguments);

            if (typeof o == 'object') {
                tmp_args[0] = $.extend(o, {
                    timeOnly: true
                });
            }

            return $(this).each(function () {
                $.fn.datetimepicker.apply($(this), tmp_args);
            });
        },

        /*
		* extend timepicker to datepicker
		*/
        datetimepicker: function (o) {
            o = o || {};
            var tmp_args = arguments;

            if (typeof (o) == 'string') {
                if (o == 'getDate') {
                    return $.fn.datepicker.apply($(this[0]), tmp_args);
                } else {
                    return this.each(function () {
                        var $t = $(this);
                        $t.datepicker.apply($t, tmp_args);
                    });
                }
            } else {
                return this.each(function () {
                    var $t = $(this);
                    $t.datepicker($.timepicker._newInst($t, o)._defaults);
                });
            }
        }
    });

    /*
	* Public Utility to parse date and time
	*/
    $.datepicker.parseDateTime = function (dateFormat, timeFormat, dateTimeString, dateSettings, timeSettings) {
        var parseRes = parseDateTimeInternal(dateFormat, timeFormat, dateTimeString, dateSettings, timeSettings);
        if (parseRes.timeObj) {
            var t = parseRes.timeObj;
            parseRes.date.setHours(t.hour, t.minute, t.second, t.millisec);
            parseRex.date.setMicroseconds(t.microsec);
        }

        return parseRes.date;
    };

    /*
	* Public utility to parse time
	*/
    $.datepicker.parseTime = function (timeFormat, timeString, options) {
        var o = extendRemove(extendRemove({}, $.timepicker._defaults), options || {}),
			iso8601 = (timeFormat.replace(/\'.*?\'/g, '').indexOf('Z') !== -1);

        // Strict parse requires the timeString to match the timeFormat exactly
        var strictParse = function (f, s, o) {

            // pattern for standard and localized AM/PM markers
            var getPatternAmpm = function (amNames, pmNames) {
                var markers = [];
                if (amNames) {
                    $.merge(markers, amNames);
                }
                if (pmNames) {
                    $.merge(markers, pmNames);
                }
                markers = $.map(markers, function (val) {
                    return val.replace(/[.*+?|()\[\]{}\\]/g, '\\$&');
                });
                return '(' + markers.join('|') + ')?';
            };

            // figure out position of time elements.. cause js cant do named captures
            var getFormatPositions = function (timeFormat) {
                var finds = timeFormat.toLowerCase().match(/(h{1,2}|m{1,2}|s{1,2}|l{1}|c{1}|t{1,2}|z|'.*?')/g),
					orders = {
					    h: -1,
					    m: -1,
					    s: -1,
					    l: -1,
					    c: -1,
					    t: -1,
					    z: -1
					};

                if (finds) {
                    for (var i = 0; i < finds.length; i++) {
                        if (orders[finds[i].toString().charAt(0)] == -1) {
                            orders[finds[i].toString().charAt(0)] = i + 1;
                        }
                    }
                }
                return orders;
            };

            var regstr = '^' + f.toString()
					.replace(/([hH]{1,2}|mm?|ss?|[tT]{1,2}|[zZ]|[lc]|'.*?')/g, function (match) {
					    var ml = match.length;
					    switch (match.charAt(0).toLowerCase()) {
					        case 'h': return ml === 1 ? '(\\d?\\d)' : '(\\d{' + ml + '})';
					        case 'm': return ml === 1 ? '(\\d?\\d)' : '(\\d{' + ml + '})';
					        case 's': return ml === 1 ? '(\\d?\\d)' : '(\\d{' + ml + '})';
					        case 'l': return '(\\d?\\d?\\d)';
					        case 'c': return '(\\d?\\d?\\d)';
					        case 'z': return '(z|[-+]\\d\\d:?\\d\\d|\\S+)?';
					        case 't': return getPatternAmpm(o.amNames, o.pmNames);
					        default:    // literal escaped in quotes
					            return '(' + match.replace(/\'/g, "").replace(/(\.|\$|\^|\\|\/|\(|\)|\[|\]|\?|\+|\*)/g, function (m) { return "\\" + m; }) + ')?';
					    }
					})
					.replace(/\s/g, '\\s?') +
					o.timeSuffix + '$',
				order = getFormatPositions(f),
				ampm = '',
				treg;

            treg = s.match(new RegExp(regstr, 'i'));

            var resTime = {
                hour: 0,
                minute: 0,
                second: 0,
                millisec: 0,
                microsec: 0
            };

            if (treg) {
                if (order.t !== -1) {
                    if (treg[order.t] === undefined || treg[order.t].length === 0) {
                        ampm = '';
                        resTime.ampm = '';
                    } else {
                        ampm = $.inArray(treg[order.t].toUpperCase(), o.amNames) !== -1 ? 'AM' : 'PM';
                        resTime.ampm = o[ampm == 'AM' ? 'amNames' : 'pmNames'][0];
                    }
                }

                if (order.h !== -1) {
                    if (ampm == 'AM' && treg[order.h] == '12') {
                        resTime.hour = 0; // 12am = 0 hour
                    } else {
                        if (ampm == 'PM' && treg[order.h] != '12') {
                            resTime.hour = parseInt(treg[order.h], 10) + 12; // 12pm = 12 hour, any other pm = hour + 12
                        } else {
                            resTime.hour = Number(treg[order.h]);
                        }
                    }
                }

                if (order.m !== -1) {
                    resTime.minute = Number(treg[order.m]);
                }
                if (order.s !== -1) {
                    resTime.second = Number(treg[order.s]);
                }
                if (order.l !== -1) {
                    resTime.millisec = Number(treg[order.l]);
                }
                if (order.c !== -1) {
                    resTime.microsec = Number(treg[order.c]);
                }
                if (order.z !== -1 && treg[order.z] !== undefined) {
                    resTime.timezone = $.timepicker.timezoneOffsetNumber(treg[order.z]);
                }


                return resTime;
            }
            return false;
        };// end strictParse

        // First try JS Date, if that fails, use strictParse
        var looseParse = function (f, s, o) {
            try {
                var d = new Date('2012-01-01 ' + s);
                if (isNaN(d.getTime())) {
                    d = new Date('2012-01-01T' + s);
                    if (isNaN(d.getTime())) {
                        d = new Date('01/01/2012 ' + s);
                        if (isNaN(d.getTime())) {
                            throw "Unable to parse time with native Date: " + s;
                        }
                    }
                }

                return {
                    hour: d.getHours(),
                    minute: d.getMinutes(),
                    second: d.getSeconds(),
                    millisec: d.getMilliseconds(),
                    microsec: d.getMicroseconds(),
                    timezone: d.getTimezoneOffset() * -1
                };
            }
            catch (err) {
                try {
                    return strictParse(f, s, o);
                }
                catch (err2) {
                    $.timepicker.log("Unable to parse \ntimeString: " + s + "\ntimeFormat: " + f);
                }
            }
            return false;
        }; // end looseParse

        if (typeof o.parse === "function") {
            return o.parse(timeFormat, timeString, o);
        }
        if (o.parse === 'loose') {
            return looseParse(timeFormat, timeString, o);
        }
        return strictParse(timeFormat, timeString, o);
    };

    /*
	* Public utility to format the time
	* format = string format of the time
	* time = a {}, not a Date() for timezones
	* options = essentially the regional[].. amNames, pmNames, ampm
	*/
    $.datepicker.formatTime = function (format, time, options) {
        options = options || {};
        options = $.extend({}, $.timepicker._defaults, options);
        time = $.extend({
            hour: 0,
            minute: 0,
            second: 0,
            millisec: 0,
            timezone: 0
        }, time);

        var tmptime = format,
			ampmName = options.amNames[0],
			hour = parseInt(time.hour, 10);

        if (hour > 11) {
            ampmName = options.pmNames[0];
        }

        tmptime = tmptime.replace(/(?:HH?|hh?|mm?|ss?|[tT]{1,2}|[zZ]|[lc]|('.*?'|".*?"))/g, function (match) {
            switch (match) {
                case 'HH':
                    return ('0' + hour).slice(-2);
                case 'H':
                    return hour;
                case 'hh':
                    return ('0' + convert24to12(hour)).slice(-2);
                case 'h':
                    return convert24to12(hour);
                case 'mm':
                    return ('0' + time.minute).slice(-2);
                case 'm':
                    return time.minute;
                case 'ss':
                    return ('0' + time.second).slice(-2);
                case 's':
                    return time.second;
                case 'l':
                    return ('00' + time.millisec).slice(-3);
                case 'c':
                    return ('00' + time.microsec).slice(-3);
                case 'z':
                    return $.timepicker.timezoneOffsetString(time.timezone === null ? options.timezone : time.timezone, false);
                case 'Z':
                    return $.timepicker.timezoneOffsetString(time.timezone === null ? options.timezone : time.timezone, true);
                case 'T':
                    return ampmName.charAt(0).toUpperCase();
                case 'TT':
                    return ampmName.toUpperCase();
                case 't':
                    return ampmName.charAt(0).toLowerCase();
                case 'tt':
                    return ampmName.toLowerCase();
                default:
                    return match.replace(/\'/g, "") || "'";
            }
        });

        tmptime = $.trim(tmptime);
        return tmptime;
    };

    /*
	* the bad hack :/ override datepicker so it doesnt close on select
	// inspired: http://stackoverflow.com/questions/1252512/jquery-datepicker-prevent-closing-picker-when-clicking-a-date/1762378#1762378
	*/
    $.datepicker._base_selectDate = $.datepicker._selectDate;
    $.datepicker._selectDate = function (id, dateStr) {
        var inst = this._getInst($(id)[0]),
			tp_inst = this._get(inst, 'timepicker');

        if (tp_inst) {
            tp_inst._limitMinMaxDateTime(inst, true);
            inst.inline = inst.stay_open = true;
            //This way the onSelect handler called from calendarpicker get the full dateTime
            this._base_selectDate(id, dateStr);
            inst.inline = inst.stay_open = false;
            this._notifyChange(inst);
            this._updateDatepicker(inst);
        } else {
            this._base_selectDate(id, dateStr);
        }
    };

    /*
	* second bad hack :/ override datepicker so it triggers an event when changing the input field
	* and does not redraw the datepicker on every selectDate event
	*/
    $.datepicker._base_updateDatepicker = $.datepicker._updateDatepicker;
    $.datepicker._updateDatepicker = function (inst) {

        // don't popup the datepicker if there is another instance already opened
        var input = inst.input[0];
        if ($.datepicker._curInst && $.datepicker._curInst != inst && $.datepicker._datepickerShowing && $.datepicker._lastInput != input) {
            return;
        }

        if (typeof (inst.stay_open) !== 'boolean' || inst.stay_open === false) {

            this._base_updateDatepicker(inst);

            // Reload the time control when changing something in the input text field.
            var tp_inst = this._get(inst, 'timepicker');
            if (tp_inst) {
                tp_inst._addTimePicker(inst);
            }
        }
    };

    /*
	* third bad hack :/ override datepicker so it allows spaces and colon in the input field
	*/
    $.datepicker._base_doKeyPress = $.datepicker._doKeyPress;
    $.datepicker._doKeyPress = function (event) {
        var inst = $.datepicker._getInst(event.target),
			tp_inst = $.datepicker._get(inst, 'timepicker');

        if (tp_inst) {
            if ($.datepicker._get(inst, 'constrainInput')) {
                var ampm = tp_inst.support.ampm,
					tz = tp_inst._defaults.showTimezone !== null ? tp_inst._defaults.showTimezone : tp_inst.support.timezone,
					dateChars = $.datepicker._possibleChars($.datepicker._get(inst, 'dateFormat')),
					datetimeChars = tp_inst._defaults.timeFormat.toString()
											.replace(/[hms]/g, '')
											.replace(/TT/g, ampm ? 'APM' : '')
											.replace(/Tt/g, ampm ? 'AaPpMm' : '')
											.replace(/tT/g, ampm ? 'AaPpMm' : '')
											.replace(/T/g, ampm ? 'AP' : '')
											.replace(/tt/g, ampm ? 'apm' : '')
											.replace(/t/g, ampm ? 'ap' : '') +
											" " + tp_inst._defaults.separator +
											tp_inst._defaults.timeSuffix +
											(tz ? tp_inst._defaults.timezoneList.join('') : '') +
											(tp_inst._defaults.amNames.join('')) + (tp_inst._defaults.pmNames.join('')) +
											dateChars,
					chr = String.fromCharCode(event.charCode === undefined ? event.keyCode : event.charCode);
                return event.ctrlKey || (chr < ' ' || !dateChars || datetimeChars.indexOf(chr) > -1);
            }
        }

        return $.datepicker._base_doKeyPress(event);
    };

    /*
	* Fourth bad hack :/ override _updateAlternate function used in inline mode to init altField
	*/
    $.datepicker._base_updateAlternate = $.datepicker._updateAlternate;
    /* Update any alternate field to synchronise with the main field. */
    $.datepicker._updateAlternate = function (inst) {
        var tp_inst = this._get(inst, 'timepicker');
        if (tp_inst) {
            var altField = tp_inst._defaults.altField;
            if (altField) { // update alternate field too
                var altFormat = tp_inst._defaults.altFormat || tp_inst._defaults.dateFormat,
					date = this._getDate(inst),
					formatCfg = $.datepicker._getFormatConfig(inst),
					altFormattedDateTime = '',
					altSeparator = tp_inst._defaults.altSeparator ? tp_inst._defaults.altSeparator : tp_inst._defaults.separator,
					altTimeSuffix = tp_inst._defaults.altTimeSuffix ? tp_inst._defaults.altTimeSuffix : tp_inst._defaults.timeSuffix,
					altTimeFormat = tp_inst._defaults.altTimeFormat !== null ? tp_inst._defaults.altTimeFormat : tp_inst._defaults.timeFormat;

                altFormattedDateTime += $.datepicker.formatTime(altTimeFormat, tp_inst, tp_inst._defaults) + altTimeSuffix;
                if (!tp_inst._defaults.timeOnly && !tp_inst._defaults.altFieldTimeOnly && date !== null) {
                    if (tp_inst._defaults.altFormat) {
                        altFormattedDateTime = $.datepicker.formatDate(tp_inst._defaults.altFormat, date, formatCfg) + altSeparator + altFormattedDateTime;
                    }
                    else {
                        altFormattedDateTime = tp_inst.formattedDate + altSeparator + altFormattedDateTime;
                    }
                }
                $(altField).val(altFormattedDateTime);
            }
        }
        else {
            $.datepicker._base_updateAlternate(inst);
        }
    };

    /*
	* Override key up event to sync manual input changes.
	*/
    $.datepicker._base_doKeyUp = $.datepicker._doKeyUp;
    $.datepicker._doKeyUp = function (event) {
        var inst = $.datepicker._getInst(event.target),
			tp_inst = $.datepicker._get(inst, 'timepicker');

        if (tp_inst) {
            if (tp_inst._defaults.timeOnly && (inst.input.val() != inst.lastVal)) {
                try {
                    $.datepicker._updateDatepicker(inst);
                } catch (err) {
                    $.timepicker.log(err);
                }
            }
        }

        return $.datepicker._base_doKeyUp(event);
    };

    /*
	* override "Today" button to also grab the time.
	*/
    $.datepicker._base_gotoToday = $.datepicker._gotoToday;
    $.datepicker._gotoToday = function (id) {
        var inst = this._getInst($(id)[0]),
			$dp = inst.dpDiv;
        this._base_gotoToday(id);
        var tp_inst = this._get(inst, 'timepicker');
        selectLocalTimezone(tp_inst);
        var now = new Date();
        this._setTime(inst, now);
        $('.ui-datepicker-today', $dp).click();
    };

    /*
	* Disable & enable the Time in the datetimepicker
	*/
    $.datepicker._disableTimepickerDatepicker = function (target) {
        var inst = this._getInst(target);
        if (!inst) {
            return;
        }

        var tp_inst = this._get(inst, 'timepicker');
        $(target).datepicker('getDate'); // Init selected[Year|Month|Day]
        if (tp_inst) {
            tp_inst._defaults.showTimepicker = false;
            tp_inst._updateDateTime(inst);
        }
    };

    $.datepicker._enableTimepickerDatepicker = function (target) {
        var inst = this._getInst(target);
        if (!inst) {
            return;
        }

        var tp_inst = this._get(inst, 'timepicker');
        $(target).datepicker('getDate'); // Init selected[Year|Month|Day]
        if (tp_inst) {
            tp_inst._defaults.showTimepicker = true;
            tp_inst._addTimePicker(inst); // Could be disabled on page load
            tp_inst._updateDateTime(inst);
        }
    };

    /*
	* Create our own set time function
	*/
    $.datepicker._setTime = function (inst, date) {
        var tp_inst = this._get(inst, 'timepicker');
        if (tp_inst) {
            var defaults = tp_inst._defaults;

            // calling _setTime with no date sets time to defaults
            tp_inst.hour = date ? date.getHours() : defaults.hour;
            tp_inst.minute = date ? date.getMinutes() : defaults.minute;
            tp_inst.second = date ? date.getSeconds() : defaults.second;
            tp_inst.millisec = date ? date.getMilliseconds() : defaults.millisec;
            tp_inst.microsec = date ? date.getMicroseconds() : defaults.microsec;

            //check if within min/max times.. 
            tp_inst._limitMinMaxDateTime(inst, true);

            tp_inst._onTimeChange();
            tp_inst._updateDateTime(inst);
        }
    };

    /*
	* Create new public method to set only time, callable as $().datepicker('setTime', date)
	*/
    $.datepicker._setTimeDatepicker = function (target, date, withDate) {
        var inst = this._getInst(target);
        if (!inst) {
            return;
        }

        var tp_inst = this._get(inst, 'timepicker');

        if (tp_inst) {
            this._setDateFromField(inst);
            var tp_date;
            if (date) {
                if (typeof date == "string") {
                    tp_inst._parseTime(date, withDate);
                    tp_date = new Date();
                    tp_date.setHours(tp_inst.hour, tp_inst.minute, tp_inst.second, tp_inst.millisec);
                    tp_date.setMicroseconds(tp_inst.microsec);
                } else {
                    tp_date = new Date(date.getTime());
                }
                if (tp_date.toString() == 'Invalid Date') {
                    tp_date = undefined;
                }
                this._setTime(inst, tp_date);
            }
        }

    };

    /*
	* override setDate() to allow setting time too within Date object
	*/
    $.datepicker._base_setDateDatepicker = $.datepicker._setDateDatepicker;
    $.datepicker._setDateDatepicker = function (target, date) {
        var inst = this._getInst(target);
        if (!inst) {
            return;
        }

        var tp_inst = this._get(inst, 'timepicker'),
			tp_date = (date instanceof Date) ? new Date(date.getTime()) : date;

        // This is important if you are using the timezone option, javascript's Date 
        // object will only return the timezone offset for the current locale, so we 
        // adjust it accordingly.  If not using timezone option this won't matter..
        // If a timezone is different in tp, keep the timezone as is
        if (tp_inst && tp_inst.timezone != null) {
            date = $.timepicker.timezoneAdjust(date, tp_inst.timezone);
            tp_date = $.timepicker.timezoneAdjust(tp_date, tp_inst.timezone);
        }

        this._updateDatepicker(inst);
        this._base_setDateDatepicker.apply(this, arguments);
        this._setTimeDatepicker(target, tp_date, true);
    };

    /*
	* override getDate() to allow getting time too within Date object
	*/
    $.datepicker._base_getDateDatepicker = $.datepicker._getDateDatepicker;
    $.datepicker._getDateDatepicker = function (target, noDefault) {
        var inst = this._getInst(target);
        if (!inst) {
            return;
        }

        var tp_inst = this._get(inst, 'timepicker');

        if (tp_inst) {
            // if it hasn't yet been defined, grab from field
            if (inst.lastVal === undefined) {
                this._setDateFromField(inst, noDefault);
            }

            var date = this._getDate(inst);
            if (date && tp_inst._parseTime($(target).val(), tp_inst.timeOnly)) {
                date.setHours(tp_inst.hour, tp_inst.minute, tp_inst.second, tp_inst.millisec);
                date.setMicroseconds(tp_inst.microsec);

                // This is important if you are using the timezone option, javascript's Date 
                // object will only return the timezone offset for the current locale, so we 
                // adjust it accordingly.  If not using timezone option this won't matter..
                if (tp_inst.timezone != null) {
                    date = $.timepicker.timezoneAdjust(date, tp_inst.timezone);
                }
            }
            return date;
        }
        return this._base_getDateDatepicker(target, noDefault);
    };

    /*
	* override parseDate() because UI 1.8.14 throws an error about "Extra characters"
	* An option in datapicker to ignore extra format characters would be nicer.
	*/
    $.datepicker._base_parseDate = $.datepicker.parseDate;
    $.datepicker.parseDate = function (format, value, settings) {
        var date;
        try {
            date = this._base_parseDate(format, value, settings);
        } catch (err) {
            // Hack!  The error message ends with a colon, a space, and
            // the "extra" characters.  We rely on that instead of
            // attempting to perfectly reproduce the parsing algorithm.
            if (err.indexOf(":") >= 0) {
                date = this._base_parseDate(format, value.substring(0, value.length - (err.length - err.indexOf(':') - 2)), settings);
                $.timepicker.log("Error parsing the date string: " + err + "\ndate string = " + value + "\ndate format = " + format);
            } else {
                throw err;
            }
        }
        return date;
    };

    /*
	* override formatDate to set date with time to the input
	*/
    $.datepicker._base_formatDate = $.datepicker._formatDate;
    $.datepicker._formatDate = function (inst, day, month, year) {
        var tp_inst = this._get(inst, 'timepicker');
        if (tp_inst) {
            tp_inst._updateDateTime(inst);
            return tp_inst.$input.val();
        }
        return this._base_formatDate(inst);
    };

    /*
	* override options setter to add time to maxDate(Time) and minDate(Time). MaxDate
	*/
    $.datepicker._base_optionDatepicker = $.datepicker._optionDatepicker;
    $.datepicker._optionDatepicker = function (target, name, value) {
        var inst = this._getInst(target),
	        name_clone;
        if (!inst) {
            return null;
        }

        var tp_inst = this._get(inst, 'timepicker');
        if (tp_inst) {
            var min = null,
				max = null,
				onselect = null,
				overrides = tp_inst._defaults.evnts,
				fns = {},
				prop;
            if (typeof name == 'string') { // if min/max was set with the string
                if (name === 'minDate' || name === 'minDateTime') {
                    min = value;
                } else if (name === 'maxDate' || name === 'maxDateTime') {
                    max = value;
                } else if (name === 'onSelect') {
                    onselect = value;
                } else if (overrides.hasOwnProperty(name)) {
                    if (typeof (value) === 'undefined') {
                        return overrides[name];
                    }
                    fns[name] = value;
                    name_clone = {}; //empty results in exiting function after overrides updated
                }
            } else if (typeof name == 'object') { //if min/max was set with the JSON
                if (name.minDate) {
                    min = name.minDate;
                } else if (name.minDateTime) {
                    min = name.minDateTime;
                } else if (name.maxDate) {
                    max = name.maxDate;
                } else if (name.maxDateTime) {
                    max = name.maxDateTime;
                }
                for (prop in overrides) {
                    if (overrides.hasOwnProperty(prop) && name[prop]) {
                        fns[prop] = name[prop];
                    }
                }
            }
            for (prop in fns) {
                if (fns.hasOwnProperty(prop)) {
                    overrides[prop] = fns[prop];
                    if (!name_clone) { name_clone = $.extend({}, name); }
                    delete name_clone[prop];
                }
            }
            if (name_clone && isEmptyObject(name_clone)) { return; }
            if (min) { //if min was set
                if (min === 0) {
                    min = new Date();
                } else {
                    min = new Date(min);
                }
                tp_inst._defaults.minDate = min;
                tp_inst._defaults.minDateTime = min;
            } else if (max) { //if max was set
                if (max === 0) {
                    max = new Date();
                } else {
                    max = new Date(max);
                }
                tp_inst._defaults.maxDate = max;
                tp_inst._defaults.maxDateTime = max;
            } else if (onselect) {
                tp_inst._defaults.onSelect = onselect;
            }
        }
        if (value === undefined) {
            return this._base_optionDatepicker.call($.datepicker, target, name);
        }
        return this._base_optionDatepicker.call($.datepicker, target, name_clone || name, value);
    };

    /*
	* jQuery isEmptyObject does not check hasOwnProperty - if someone has added to the object prototype,
	* it will return false for all objects
	*/
    var isEmptyObject = function (obj) {
        var prop;
        for (prop in obj) {
            if (obj.hasOwnProperty(obj)) {
                return false;
            }
        }
        return true;
    };

    /*
	* jQuery extend now ignores nulls!
	*/
    var extendRemove = function (target, props) {
        $.extend(target, props);
        for (var name in props) {
            if (props[name] === null || props[name] === undefined) {
                target[name] = props[name];
            }
        }
        return target;
    };

    /*
	* Determine by the time format which units are supported
	* Returns an object of booleans for each unit
	*/
    var detectSupport = function (timeFormat) {
        var tf = timeFormat.replace(/\'.*?\'/g, '').toLowerCase(), // removes literals
			isIn = function (f, t) { // does the format contain the token?
			    return f.indexOf(t) !== -1 ? true : false;
			};
        return {
            hour: isIn(tf, 'h'),
            minute: isIn(tf, 'm'),
            second: isIn(tf, 's'),
            millisec: isIn(tf, 'l'),
            microsec: isIn(tf, 'c'),
            timezone: isIn(tf, 'z'),
            ampm: isIn('t') && isIn(timeFormat, 'h'),
            iso8601: isIn(timeFormat, 'Z')
        };
    };

    /*
	* Converts 24 hour format into 12 hour
	* Returns 12 hour without leading 0
	*/
    var convert24to12 = function (hour) {
        if (hour > 12) {
            hour = hour - 12;
        }

        if (hour === 0) {
            hour = 12;
        }

        return String(hour);
    };

    /*
	* Splits datetime string into date ans time substrings.
	* Throws exception when date can't be parsed
	* Returns [dateString, timeString]
	*/
    var splitDateTime = function (dateFormat, dateTimeString, dateSettings, timeSettings) {
        try {
            // The idea is to get the number separator occurances in datetime and the time format requested (since time has 
            // fewer unknowns, mostly numbers and am/pm). We will use the time pattern to split.
            var separator = timeSettings && timeSettings.separator ? timeSettings.separator : $.timepicker._defaults.separator,
				format = timeSettings && timeSettings.timeFormat ? timeSettings.timeFormat : $.timepicker._defaults.timeFormat,
				timeParts = format.split(separator), // how many occurances of separator may be in our format?
				timePartsLen = timeParts.length,
				allParts = dateTimeString.split(separator),
				allPartsLen = allParts.length;

            if (allPartsLen > 1) {
                return [
						allParts.splice(0, allPartsLen - timePartsLen).join(separator),
						allParts.splice(0, timePartsLen).join(separator)
                ];
            }

        } catch (err) {
            $.timepicker.log('Could not split the date from the time. Please check the following datetimepicker options' +
					"\nthrown error: " + err +
					"\ndateTimeString" + dateTimeString +
					"\ndateFormat = " + dateFormat +
					"\nseparator = " + timeSettings.separator +
					"\ntimeFormat = " + timeSettings.timeFormat);

            if (err.indexOf(":") >= 0) {
                // Hack!  The error message ends with a colon, a space, and
                // the "extra" characters.  We rely on that instead of
                // attempting to perfectly reproduce the parsing algorithm.
                var dateStringLength = dateTimeString.length - (err.length - err.indexOf(':') - 2),
					timeString = dateTimeString.substring(dateStringLength);

                return [$.trim(dateTimeString.substring(0, dateStringLength)), $.trim(dateTimeString.substring(dateStringLength))];

            } else {
                throw err;
            }
        }
        return [dateTimeString, ''];
    };

    /*
	* Internal function to parse datetime interval
	* Returns: {date: Date, timeObj: Object}, where
	*   date - parsed date without time (type Date)
	*   timeObj = {hour: , minute: , second: , millisec: , microsec: } - parsed time. Optional
	*/
    var parseDateTimeInternal = function (dateFormat, timeFormat, dateTimeString, dateSettings, timeSettings) {
        var date;
        var splitRes = splitDateTime(dateFormat, dateTimeString, dateSettings, timeSettings);
        date = $.datepicker._base_parseDate(dateFormat, splitRes[0], dateSettings);
        if (splitRes[1] !== '') {
            var timeString = splitRes[1],
				parsedTime = $.datepicker.parseTime(timeFormat, timeString, timeSettings);

            if (parsedTime === null) {
                throw 'Wrong time format';
            }
            return {
                date: date,
                timeObj: parsedTime
            };
        } else {
            return {
                date: date
            };
        }
    };

    /*
	* Internal function to set timezone_select to the local timezone
	*/
    var selectLocalTimezone = function (tp_inst, date) {
        if (tp_inst && tp_inst.timezone_select) {
            var now = typeof date !== 'undefined' ? date : new Date();
            tp_inst.timezone_select.val(now.getTimezoneOffset() * -1);
        }
    };

    /*
	* Create a Singleton Insance
	*/
    $.timepicker = new Timepicker();

    /**
	 * Get the timezone offset as string from a date object (eg '+0530' for UTC+5.5)
	 * @param  number if not a number this value is returned
	 * @param boolean if true formats in accordance to iso8601 "+12:45"
	 * @return string
	 */
    $.timepicker.timezoneOffsetString = function (tzMinutes, iso8601) {
        if (isNaN(tzMinutes) || tzMinutes > 840) {
            return tzMinutes;
        }

        var off = tzMinutes,
			minutes = off % 60,
			hours = (off - minutes) / 60,
			iso = iso8601 ? ':' : '',
			tz = (off >= 0 ? '+' : '-') + ('0' + (hours * 101).toString()).slice(-2) + iso + ('0' + (minutes * 101).toString()).slice(-2);

        if (tz == '+00:00') {
            return 'Z';
        }
        return tz;
    };

    /**
	 * Get the number in minutes that represents a timezone string
	 * @param  string formated like "+0500", "-1245"
	 * @return number
	 */
    $.timepicker.timezoneOffsetNumber = function (tzString) {
        tzString = tzString.toString().replace(':', ''); // excuse any iso8601, end up with "+1245"

        if (tzString.toUpperCase() === 'Z') { // if iso8601 with Z, its 0 minute offset
            return 0;
        }

        if (!/^(\-|\+)\d{4}$/.test(tzString)) { // possibly a user defined tz, so just give it back
            return tzString;
        }

        return ((tzString.substr(0, 1) == '-' ? -1 : 1) * // plus or minus
					((parseInt(tzString.substr(1, 2), 10) * 60) + // hours (converted to minutes)
					parseInt(tzString.substr(3, 2), 10))); // minutes
    };

    /**
	 * No way to set timezone in js Date, so we must adjust the minutes to compensate. (think setDate, getDate)
	 * @param  date
	 * @param  string formated like "+0500", "-1245"
	 * @return date
	 */
    $.timepicker.timezoneAdjust = function (date, toTimezone) {
        var toTz = $.timepicker.timezoneOffsetNumber(toTimezone);
        if (!isNaN(toTz)) {
            var currTz = date.getTimezoneOffset() * -1,
				diff = currTz - toTz; // difference in minutes

            date.setMinutes(date.getMinutes() + diff);
        }
        return date;
    };

    /**
	 * Calls `timepicker()` on the `startTime` and `endTime` elements, and configures them to
	 * enforce date range limits.
	 * n.b. The input value must be correctly formatted (reformatting is not supported)
	 * @param  Element startTime
	 * @param  Element endTime
	 * @param  obj options Options for the timepicker() call
	 * @return jQuery
	 */
    $.timepicker.timeRange = function (startTime, endTime, options) {
        return $.timepicker.handleRange('timepicker', startTime, endTime, options);
    };

    /**
	 * Calls `datetimepicker` on the `startTime` and `endTime` elements, and configures them to
	 * enforce date range limits.
	 * @param  Element startTime
	 * @param  Element endTime
	 * @param  obj options Options for the `timepicker()` call. Also supports `reformat`,
	 *   a boolean value that can be used to reformat the input values to the `dateFormat`.
	 * @param  string method Can be used to specify the type of picker to be added
	 * @return jQuery
	 */
    $.timepicker.datetimeRange = function (startTime, endTime, options) {
        $.timepicker.handleRange('datetimepicker', startTime, endTime, options);
    };

    /**
	 * Calls `method` on the `startTime` and `endTime` elements, and configures them to
	 * enforce date range limits.
	 * @param  Element startTime
	 * @param  Element endTime
	 * @param  obj options Options for the `timepicker()` call. Also supports `reformat`,
	 *   a boolean value that can be used to reformat the input values to the `dateFormat`.
	 * @return jQuery
	 */
    $.timepicker.dateRange = function (startTime, endTime, options) {
        $.timepicker.handleRange('datepicker', startTime, endTime, options);
    };

    /**
	 * Calls `method` on the `startTime` and `endTime` elements, and configures them to
	 * enforce date range limits.
	 * @param  string method Can be used to specify the type of picker to be added
	 * @param  Element startTime
	 * @param  Element endTime
	 * @param  obj options Options for the `timepicker()` call. Also supports `reformat`,
	 *   a boolean value that can be used to reformat the input values to the `dateFormat`.
	 * @return jQuery
	 */
    $.timepicker.handleRange = function (method, startTime, endTime, options) {
        options = $.extend({}, {
            minInterval: 0, // min allowed interval in milliseconds
            maxInterval: 0, // max allowed interval in milliseconds
            start: {},      // options for start picker
            end: {}         // options for end picker
        }, options);

        $.fn[method].call(startTime, $.extend({
            onClose: function (dateText, inst) {
                checkDates($(this), endTime);
            },
            onSelect: function (selectedDateTime) {
                selected($(this), endTime, 'minDate');
            }
        }, options, options.start));
        $.fn[method].call(endTime, $.extend({
            onClose: function (dateText, inst) {
                checkDates($(this), startTime);
            },
            onSelect: function (selectedDateTime) {
                selected($(this), startTime, 'maxDate');
            }
        }, options, options.end));

        checkDates(startTime, endTime);
        selected(startTime, endTime, 'minDate');
        selected(endTime, startTime, 'maxDate');

        function checkDates(changed, other) {
            var startdt = startTime[method]('getDate'),
				enddt = endTime[method]('getDate'),
				changeddt = changed[method]('getDate');

            if (startdt !== null) {
                var minDate = new Date(startdt.getTime()),
					maxDate = new Date(startdt.getTime());

                minDate.setMilliseconds(minDate.getMilliseconds() + options.minInterval);
                maxDate.setMilliseconds(maxDate.getMilliseconds() + options.maxInterval);

                if (options.minInterval > 0 && minDate > enddt) { // minInterval check
                    endTime[method]('setDate', minDate);
                }
                else if (options.maxInterval > 0 && maxDate < enddt) { // max interval check
                    endTime[method]('setDate', maxDate);
                }
                else if (startdt > enddt) {
                    other[method]('setDate', changeddt);
                }
            }
        }

        function selected(changed, other, option) {
            if (!changed.val()) {
                return;
            }
            var date = changed[method].call(changed, 'getDate');
            if (date !== null && options.minInterval > 0) {
                if (option == 'minDate') {
                    date.setMilliseconds(date.getMilliseconds() + options.minInterval);
                }
                if (option == 'maxDate') {
                    date.setMilliseconds(date.getMilliseconds() - options.minInterval);
                }
            }
            if (date.getTime) {
                other[method].call(other, 'option', option, date);
            }
        }
        return $([startTime.get(0), endTime.get(0)]);
    };

    /**
	 * Log error or data to the console during error or debugging
	 * @param  Object err pass any type object to log to the console during error or debugging
	 * @return void
	 */
    $.timepicker.log = function (err) {
        if (window.console) {
            console.log(err);
        }
    };

    /*
	* Rough microsecond support
	*/
    if (!Date.prototype.getMicroseconds) {
        Date.microseconds = 0;
        Date.prototype.getMicroseconds = function () { return this.microseconds; };
        Date.prototype.setMicroseconds = function (m) { this.microseconds = m; return this; };
    }

    /*
	* Keep up with the version
	*/
    $.timepicker.version = "1.3";

})(jQuery);

 
/*! jQuery Validation Plugin - v1.11.1 - 3/22/2013\n* https://github.com/jzaefferer/jquery-validation
* Copyright (c) 2013 Jörn Zaefferer; Licensed MIT */(function (t) { t.extend(t.fn, { validate: function (e) { if (!this.length) return e && e.debug && window.console && console.warn("Nothing selected, can't validate, returning nothing."), void 0; var i = t.data(this[0], "validator"); return i ? i : (this.attr("novalidate", "novalidate"), i = new t.validator(e, this[0]), t.data(this[0], "validator", i), i.settings.onsubmit && (this.validateDelegate(":submit", "click", function (e) { i.settings.submitHandler && (i.submitButton = e.target), t(e.target).hasClass("cancel") && (i.cancelSubmit = !0), void 0 !== t(e.target).attr("formnovalidate") && (i.cancelSubmit = !0) }), this.submit(function (e) { function s() { var s; return i.settings.submitHandler ? (i.submitButton && (s = t("<input type='hidden'/>").attr("name", i.submitButton.name).val(t(i.submitButton).val()).appendTo(i.currentForm)), i.settings.submitHandler.call(i, i.currentForm, e), i.submitButton && s.remove(), !1) : !0 } return i.settings.debug && e.preventDefault(), i.cancelSubmit ? (i.cancelSubmit = !1, s()) : i.form() ? i.pendingRequest ? (i.formSubmitted = !0, !1) : s() : (i.focusInvalid(), !1) })), i) }, valid: function () { if (t(this[0]).is("form")) return this.validate().form(); var e = !0, i = t(this[0].form).validate(); return this.each(function () { e = e && i.element(this) }), e }, removeAttrs: function (e) { var i = {}, s = this; return t.each(e.split(/\s/), function (t, e) { i[e] = s.attr(e), s.removeAttr(e) }), i }, rules: function (e, i) { var s = this[0]; if (e) { var r = t.data(s.form, "validator").settings, n = r.rules, a = t.validator.staticRules(s); switch (e) { case "add": t.extend(a, t.validator.normalizeRule(i)), delete a.messages, n[s.name] = a, i.messages && (r.messages[s.name] = t.extend(r.messages[s.name], i.messages)); break; case "remove": if (!i) return delete n[s.name], a; var u = {}; return t.each(i.split(/\s/), function (t, e) { u[e] = a[e], delete a[e] }), u } } var o = t.validator.normalizeRules(t.extend({}, t.validator.classRules(s), t.validator.attributeRules(s), t.validator.dataRules(s), t.validator.staticRules(s)), s); if (o.required) { var l = o.required; delete o.required, o = t.extend({ required: l }, o) } return o } }), t.extend(t.expr[":"], { blank: function (e) { return !t.trim("" + t(e).val()) }, filled: function (e) { return !!t.trim("" + t(e).val()) }, unchecked: function (e) { return !t(e).prop("checked") } }), t.validator = function (e, i) { this.settings = t.extend(!0, {}, t.validator.defaults, e), this.currentForm = i, this.init() }, t.validator.format = function (e, i) { return 1 === arguments.length ? function () { var i = t.makeArray(arguments); return i.unshift(e), t.validator.format.apply(this, i) } : (arguments.length > 2 && i.constructor !== Array && (i = t.makeArray(arguments).slice(1)), i.constructor !== Array && (i = [i]), t.each(i, function (t, i) { e = e.replace(RegExp("\\{" + t + "\\}", "g"), function () { return i }) }), e) }, t.extend(t.validator, { defaults: { messages: {}, groups: {}, rules: {}, errorClass: "error", validClass: "valid", errorElement: "label", focusInvalid: !0, errorContainer: t([]), errorLabelContainer: t([]), onsubmit: !0, ignore: ":hidden", ignoreTitle: !1, onfocusin: function (t) { this.lastActive = t, this.settings.focusCleanup && !this.blockFocusCleanup && (this.settings.unhighlight && this.settings.unhighlight.call(this, t, this.settings.errorClass, this.settings.validClass), this.addWrapper(this.errorsFor(t)).hide()) }, onfocusout: function (t) { this.checkable(t) || !(t.name in this.submitted) && this.optional(t) || this.element(t) }, onkeyup: function (t, e) { (9 !== e.which || "" !== this.elementValue(t)) && (t.name in this.submitted || t === this.lastElement) && this.element(t) }, onclick: function (t) { t.name in this.submitted ? this.element(t) : t.parentNode.name in this.submitted && this.element(t.parentNode) }, highlight: function (e, i, s) { "radio" === e.type ? this.findByName(e.name).addClass(i).removeClass(s) : t(e).addClass(i).removeClass(s) }, unhighlight: function (e, i, s) { "radio" === e.type ? this.findByName(e.name).removeClass(i).addClass(s) : t(e).removeClass(i).addClass(s) } }, setDefaults: function (e) { t.extend(t.validator.defaults, e) }, messages: { required: "This field is required.", remote: "Please fix this field.", email: "Please enter a valid email address.", url:"Please enter a valid URL.", date: "Please enter a valid date.", dateISO: "Please enter a valid date (ISO).", number: "Please enter a valid number.", digits: "Please enter only digits.", creditcard: "Please enter a valid credit card number.", equalTo: "Please enter the same value again.", maxlength: t.validator.format("Please enter no more than {0} characters."), minlength: t.validator.format("Please enter at least {0} characters."), rangelength: t.validator.format("Please enter a value between {0} and {1} characters long."), range: t.validator.format("Please enter a value between {0} and {1}."), max: t.validator.format("Please enter a value less than or equal to {0}."), min: t.validator.format("Please enter a value greater than or equal to {0}.") }, autoCreateRanges: !1, prototype: { init: function () { function e(e) { var i = t.data(this[0].form, "validator"), s = "on" + e.type.replace(/^validate/, ""); i.settings[s] && i.settings[s].call(i, this[0], e) } this.labelContainer = t(this.settings.errorLabelContainer), this.errorContext = this.labelContainer.length && this.labelContainer || t(this.currentForm), this.containers = t(this.settings.errorContainer).add(this.settings.errorLabelContainer), this.submitted = {}, this.valueCache = {}, this.pendingRequest = 0, this.pending = {}, this.invalid = {}, this.reset(); var i = this.groups = {}; t.each(this.settings.groups, function (e, s) { "string" == typeof s && (s = s.split(/\s/)), t.each(s, function (t, s) { i[s] = e }) }); var s = this.settings.rules; t.each(s, function (e, i) { s[e] = t.validator.normalizeRule(i) }), t(this.currentForm).validateDelegate(":text, [type='password'], [type='file'], select, textarea, [type='number'], [type='search'] ,[type='tel'], [type='url'], [type='email'], [type='datetime'], [type='date'], [type='month'], [type='week'], [type='time'], [type='datetime-local'], [type='range'], [type='color'] ", "focusin focusout keyup", e).validateDelegate("[type='radio'], [type='checkbox'], select, option", "click", e), this.settings.invalidHandler && t(this.currentForm).bind("invalid-form.validate", this.settings.invalidHandler) }, form: function () { return this.checkForm(), t.extend(this.submitted, this.errorMap), this.invalid = t.extend({}, this.errorMap), this.valid() || t(this.currentForm).triggerHandler("invalid-form", [this]), this.showErrors(), this.valid() }, checkForm: function () { this.prepareForm(); for (var t = 0, e = this.currentElements = this.elements() ; e[t]; t++) this.check(e[t]); return this.valid() }, element: function (e) { e = this.validationTargetFor(this.clean(e)), this.lastElement = e, this.prepareElement(e), this.currentElements = t(e); var i = this.check(e) !== !1; return i ? delete this.invalid[e.name] : this.invalid[e.name] = !0, this.numberOfInvalids() || (this.toHide = this.toHide.add(this.containers)), this.showErrors(), i }, showErrors: function (e) { if (e) { t.extend(this.errorMap, e), this.errorList = []; for (var i in e) this.errorList.push({ message: e[i], element: this.findByName(i)[0] }); this.successList = t.grep(this.successList, function (t) { return !(t.name in e) }) } this.settings.showErrors ? this.settings.showErrors.call(this, this.errorMap, this.errorList) : this.defaultShowErrors() }, resetForm: function () { t.fn.resetForm && t(this.currentForm).resetForm(), this.submitted = {}, this.lastElement = null, this.prepareForm(), this.hideErrors(), this.elements().removeClass(this.settings.errorClass).removeData("previousValue") }, numberOfInvalids: function () { return this.objectLength(this.invalid) }, objectLength: function (t) { var e = 0; for (var i in t) e++; return e }, hideErrors: function () { this.addWrapper(this.toHide).hide() }, valid: function () { return 0 === this.size() }, size: function () { return this.errorList.length }, focusInvalid: function () { if (this.settings.focusInvalid) try { t(this.findLastActive() || this.errorList.length && this.errorList[0].element || []).filter(":visible").focus().trigger("focusin") } catch (e) { } }, findLastActive: function () { var e = this.lastActive; return e && 1 === t.grep(this.errorList, function (t) { return t.element.name === e.name }).length && e }, elements: function () { var e = this, i = {}; return t(this.currentForm).find("input, select, textarea").not(":submit, :reset, :image, [disabled]").not(this.settings.ignore).filter(function () { return !this.name && e.settings.debug && window.console && console.error("%o has no name assigned", this), this.name in i || !e.objectLength(t(this).rules()) ? !1 : (i[this.name] = !0, !0) }) }, clean: function (e) { return t(e)[0] }, errors: function () { var e = this.settings.errorClass.replace(" ", "."); return t(this.settings.errorElement + "." + e, this.errorContext) }, reset: function () { this.successList = [], this.errorList = [], this.errorMap = {}, this.toShow = t([]), this.toHide = t([]), this.currentElements = t([]) }, prepareForm: function () { this.reset(), this.toHide = this.errors().add(this.containers) }, prepareElement: function (t) { this.reset(), this.toHide = this.errorsFor(t) }, elementValue: function (e) { var i = t(e).attr("type"), s = t(e).val(); return "radio" === i || "checkbox" === i ? t("input[name='" + t(e).attr("name") + "']:checked").val() : "string" == typeof s ? s.replace(/\r/g, "") : s }, check: function (e) { e = this.validationTargetFor(this.clean(e)); var i, s = t(e).rules(), r = !1, n = this.elementValue(e); for (var a in s) { var u = { method: a, parameters: s[a] }; try { if (i = t.validator.methods[a].call(this, n, e, u.parameters), "dependency-mismatch" === i) { r = !0; continue } if (r = !1, "pending" === i) return this.toHide = this.toHide.not(this.errorsFor(e)), void 0; if (!i) return this.formatAndAdd(e, u), !1 } catch (o) { throw this.settings.debug && window.console && console.log("Exception occurred when checking element " + e.id + ", check the '" + u.method + "' method.", o), o } } return r ? void 0 : (this.objectLength(s) && this.successList.push(e), !0) }, customDataMessage: function (e, i) { return t(e).data("msg-" + i.toLowerCase()) || e.attributes && t(e).attr("data-msg-" + i.toLowerCase()) }, customMessage: function (t, e) { var i = this.settings.messages[t]; return i && (i.constructor === String ? i : i[e]) }, findDefined: function () { for (var t = 0; arguments.length > t; t++) if (void 0 !== arguments[t]) return arguments[t]; return void 0 }, defaultMessage: function (e, i) { return this.findDefined(this.customMessage(e.name, i), this.customDataMessage(e, i), !this.settings.ignoreTitle && e.title || void 0, t.validator.messages[i], "<strong>Warning: No message defined for " + e.name + "</strong>") }, formatAndAdd: function (e, i) { var s = this.defaultMessage(e, i.method), r = /\$?\{(\d+)\}/g; "function" == typeof s ? s = s.call(this, i.parameters, e) : r.test(s) && (s = t.validator.format(s.replace(r, "{$1}"), i.parameters)), this.errorList.push({ message: s, element: e }), this.errorMap[e.name] = s, this.submitted[e.name] = s }, addWrapper: function (t) { return this.settings.wrapper && (t = t.add(t.parent(this.settings.wrapper))), t }, defaultShowErrors: function () { var t, e; for (t = 0; this.errorList[t]; t++) { var i = this.errorList[t]; this.settings.highlight && this.settings.highlight.call(this, i.element, this.settings.errorClass, this.settings.validClass), this.showLabel(i.element, i.message) } if (this.errorList.length && (this.toShow = this.toShow.add(this.containers)), this.settings.success) for (t = 0; this.successList[t]; t++) this.showLabel(this.successList[t]); if (this.settings.unhighlight) for (t = 0, e = this.validElements() ; e[t]; t++) this.settings.unhighlight.call(this, e[t], this.settings.errorClass, this.settings.validClass); this.toHide = this.toHide.not(this.toShow), this.hideErrors(), this.addWrapper(this.toShow).show() }, validElements: function () { return this.currentElements.not(this.invalidElements()) }, invalidElements: function () { return t(this.errorList).map(function () { return this.element }) }, showLabel: function (e, i) { var s = this.errorsFor(e); s.length ? (s.removeClass(this.settings.validClass).addClass(this.settings.errorClass), s.html(i)) : (s = t("<" + this.settings.errorElement + ">").attr("for", this.idOrName(e)).addClass(this.settings.errorClass).html(i || ""), this.settings.wrapper && (s = s.hide().show().wrap("<" + this.settings.wrapper + "/>").parent()), this.labelContainer.append(s).length || (this.settings.errorPlacement ? this.settings.errorPlacement(s, t(e)) : s.insertAfter(e))), !i && this.settings.success && (s.text(""), "string" == typeof this.settings.success ? s.addClass(this.settings.success) : this.settings.success(s, e)), this.toShow = this.toShow.add(s) }, errorsFor: function (e) { var i = this.idOrName(e); return this.errors().filter(function () { return t(this).attr("for") === i }) }, idOrName: function (t) { return this.groups[t.name] || (this.checkable(t) ? t.name : t.id || t.name) }, validationTargetFor: function (t) { return this.checkable(t) && (t = this.findByName(t.name).not(this.settings.ignore)[0]), t }, checkable: function (t) { return /radio|checkbox/i.test(t.type) }, findByName: function (e) { return t(this.currentForm).find("[name='" + e + "']") }, getLength: function (e, i) { switch (i.nodeName.toLowerCase()) { case "select": return t("option:selected", i).length; case "input": if (this.checkable(i)) return this.findByName(i.name).filter(":checked").length } return e.length }, depend: function (t, e) { return this.dependTypes[typeof t] ? this.dependTypes[typeof t](t, e) : !0 }, dependTypes: { "boolean": function (t) { return t }, string: function (e, i) { return !!t(e, i.form).length }, "function": function (t, e) { return t(e) } }, optional: function (e) { var i = this.elementValue(e); return !t.validator.methods.required.call(this, i, e) && "dependency-mismatch" }, startRequest: function (t) { this.pending[t.name] || (this.pendingRequest++, this.pending[t.name] = !0) }, stopRequest: function (e, i) { this.pendingRequest--, 0 > this.pendingRequest && (this.pendingRequest = 0), delete this.pending[e.name], i && 0 === this.pendingRequest && this.formSubmitted && this.form() ? (t(this.currentForm).submit(), this.formSubmitted = !1) : !i && 0 === this.pendingRequest && this.formSubmitted && (t(this.currentForm).triggerHandler("invalid-form", [this]), this.formSubmitted = !1) }, previousValue: function (e) { return t.data(e, "previousValue") || t.data(e, "previousValue", { old: null, valid: !0, message: this.defaultMessage(e, "remote") }) } }, classRuleSettings: { required: { required: !0 }, email: { email: !0 }, url:{ url:!0 }, date: { date: !0 }, dateISO: { dateISO: !0 }, number: { number: !0 }, digits: { digits: !0 }, creditcard: { creditcard: !0 } }, addClassRules: function (e, i) { e.constructor === String ? this.classRuleSettings[e] = i : t.extend(this.classRuleSettings, e) }, classRules: function (e) { var i = {}, s = t(e).attr("class"); return s && t.each(s.split(" "), function () { this in t.validator.classRuleSettings && t.extend(i, t.validator.classRuleSettings[this]) }), i }, attributeRules: function (e) { var i = {}, s = t(e), r = s[0].getAttribute("type"); for (var n in t.validator.methods) { var a; "required" === n ? (a = s.get(0).getAttribute(n), "" === a && (a = !0), a = !!a) : a = s.attr(n), /min|max/.test(n) && (null === r || /number|range|text/.test(r)) && (a = Number(a)), a ? i[n] = a : r === n && "range" !== r && (i[n] = !0) } return i.maxlength && /-1|2147483647|524288/.test(i.maxlength) && delete i.maxlength, i }, dataRules: function (e) { var i, s, r = {}, n = t(e); for (i in t.validator.methods) s = n.data("rule-" + i.toLowerCase()), void 0 !== s && (r[i] = s); return r }, staticRules: function (e) { var i = {}, s = t.data(e.form, "validator"); return s.settings.rules && (i = t.validator.normalizeRule(s.settings.rules[e.name]) || {}), i }, normalizeRules: function (e, i) { return t.each(e, function (s, r) { if (r === !1) return delete e[s], void 0; if (r.param || r.depends) { var n = !0; switch (typeof r.depends) { case "string": n = !!t(r.depends, i.form).length; break; case "function": n = r.depends.call(i, i) } n ? e[s] = void 0 !== r.param ? r.param : !0 : delete e[s] } }), t.each(e, function (s, r) { e[s] = t.isFunction(r) ? r(i) : r }), t.each(["minlength", "maxlength"], function () { e[this] && (e[this] = Number(e[this])) }), t.each(["rangelength", "range"], function () { var i; e[this] && (t.isArray(e[this]) ? e[this] = [Number(e[this][0]), Number(e[this][1])] : "string" == typeof e[this] && (i = e[this].split(/[\s,]+/), e[this] = [Number(i[0]), Number(i[1])])) }), t.validator.autoCreateRanges && (e.min && e.max && (e.range = [e.min, e.max], delete e.min, delete e.max), e.minlength && e.maxlength && (e.rangelength = [e.minlength, e.maxlength], delete e.minlength, delete e.maxlength)), e }, normalizeRule: function (e) { if ("string" == typeof e) { var i = {}; t.each(e.split(/\s/), function () { i[this] = !0 }), e = i } return e }, addMethod: function (e, i, s) { t.validator.methods[e] = i, t.validator.messages[e] = void 0 !== s ? s : t.validator.messages[e], 3 > i.length && t.validator.addClassRules(e, t.validator.normalizeRule(e)) }, methods: { required: function (e, i, s) { if (!this.depend(s, i)) return "dependency-mismatch"; if ("select" === i.nodeName.toLowerCase()) { var r = t(i).val(); return r && r.length > 0 } return this.checkable(i) ? this.getLength(e, i) > 0 : t.trim(e).length > 0 }, email: function (t, e) { return this.optional(e) || /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(t) }, url:function (t, e) { return this.optional(e) || /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(t) }, date: function (t, e) { return this.optional(e) || !/Invalid|NaN/.test("" + new Date(t)) }, dateISO: function (t, e) { return this.optional(e) || /^\d{4}[\/\-]\d{1,2}[\/\-]\d{1,2}$/.test(t) }, number: function (t, e) { return this.optional(e) || /^-?(?:\d+|\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/.test(t) }, digits: function (t, e) { return this.optional(e) || /^\d+$/.test(t) }, creditcard: function (t, e) { if (this.optional(e)) return "dependency-mismatch"; if (/[^0-9 \-]+/.test(t)) return !1; var i = 0, s = 0, r = !1; t = t.replace(/\D/g, ""); for (var n = t.length - 1; n >= 0; n--) { var a = t.charAt(n); s = parseInt(a, 10), r && (s *= 2) > 9 && (s -= 9), i += s, r = !r } return 0 === i % 10 }, minlength: function (e, i, s) { var r = t.isArray(e) ? e.length : this.getLength(t.trim(e), i); return this.optional(i) || r >= s }, maxlength: function (e, i, s) { var r = t.isArray(e) ? e.length : this.getLength(t.trim(e), i); return this.optional(i) || s >= r }, rangelength: function (e, i, s) { var r = t.isArray(e) ? e.length : this.getLength(t.trim(e), i); return this.optional(i) || r >= s[0] && s[1] >= r }, min: function (t, e, i) { return this.optional(e) || t >= i }, max: function (t, e, i) { return this.optional(e) || i >= t }, range: function (t, e, i) { return this.optional(e) || t >= i[0] && i[1] >= t }, equalTo: function (e, i, s) { var r = t(s); return this.settings.onfocusout && r.unbind(".validate-equalTo").bind("blur.validate-equalTo", function () { t(i).valid() }), e === r.val() }, remote: function (e, i, s) { if (this.optional(i)) return "dependency-mismatch"; var r = this.previousValue(i); if (this.settings.messages[i.name] || (this.settings.messages[i.name] = {}), r.originalMessage = this.settings.messages[i.name].remote, this.settings.messages[i.name].remote = r.message, s = "string" == typeof s && { url:s } || s, r.old === e) return r.valid; r.old = e; var n = this; this.startRequest(i); var a = {}; return a[i.name] = e, t.ajax(t.extend(!0, { url:s, mode: "abort", port: "validate" + i.name, dataType: "json", data: a, success: function (s) { n.settings.messages[i.name].remote = r.originalMessage; var a = s === !0 || "true" === s; if (a) { var u = n.formSubmitted; n.prepareElement(i), n.formSubmitted = u, n.successList.push(i), delete n.invalid[i.name], n.showErrors() } else { var o = {}, l = s || n.defaultMessage(i, "remote"); o[i.name] = r.message = t.isFunction(l) ? l(e) : l, n.invalid[i.name] = !0, n.showErrors(o) } r.valid = a, n.stopRequest(i, a) } }, s)), "pending" } } }), t.format = t.validator.format })(jQuery), function (t) { var e = {}; if (t.ajaxPrefilter) t.ajaxPrefilter(function (t, i, s) { var r = t.port; "abort" === t.mode && (e[r] && e[r].abort(), e[r] = s) }); else { var i = t.ajax; t.ajax = function (s) { var r = ("mode" in s ? s : t.ajaxSettings).mode, n = ("port" in s ? s : t.ajaxSettings).port; return "abort" === r ? (e[n] && e[n].abort(), e[n] = i.apply(this, arguments), e[n]) : i.apply(this, arguments) } } }(jQuery), function (t) { t.extend(t.fn, { validateDelegate: function (e, i, s) { return this.bind(i, function (i) { var r = t(i.target); return r.is(e) ? s.apply(r, arguments) : void 0 }) } }) }(jQuery);
jQuery.validator.addMethod("dateField", function (value, element) {
    if (this.optional(element) || !$(element).hasClass("required")) {
        return true;
    }
    return value != "dd/mm/yyyy";
}, "* You must choose a date.");

jQuery.validator.addMethod("timeField", function (value, element) {
    if (this.optional(element) || !$(element).hasClass("required")) {
        return true;
    }
    return value != "--:-- --";
}, "* You must choose a time."); 
/*! jquery-ui-map rc1 | Johan Säll Larsson */
eval(function (p, a, c, k, e, d) { e = function (c) { return (c < a ? "" : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36)) }; if (!''.replace(/^/, String)) { while (c--) d[e(c)] = k[c] || e(c); k = [function (e) { return d[e] }]; e = function () { return '\\w+' }; c = 1; }; while (c--) if (k[c]) p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]); return p; }('(3(d){d.a=3(a,b){7 c=a.r(".")[0],a=a.r(".")[1];d[c]=d[c]||{};d[c][a]=3(a,b){E.L&&2.11(a,b)};d[c][a].F=d.z({1g:c,1l:a},b);d.I[a]=3(b){7 e="1k"===1o b,g=G.F.16.17(E,1),i=2;k(e&&"1n"===b.1m(0,1))4 i;2.13(3(){7 h=d.12(2,a);h||(h=d.12(2,a,n d[c][a](b,2)));e&&(i=h[b].19(h,g))});4 i}};d.a("1i.1d",{p:{1e:"1z",1C:5},1s:3(a,b){4 b?(2.p[a]=b,2.6("j").B(a,b),2):2.p[a]},11:3(a,b){2.u=b;a=a||{};l.z(2.p,a,{10:2.v(a.10)});2.18();2.1a&&2.1a()},18:3(){7 a=2;2.m={j:n 8.9.1u(a.u,a.p),C:[],M:[],W:[]};8.9.y.1t(a.m.j,"1w",3(){d(a.u).14("1v",a.m.j)});a.x(a.p.1q,a.m.j)},S:3(a){7 b=2.6("O",n 8.9.1p);b.z(2.v(a));2.6("j").1r(b);4 2},1B:3(a){7 b=2.6("j").1E();4 b?b.1D(a.U()):!1},1y:3(a,b){2.6("j").1x[b].P(2.D(a));4 2},1A:3(a,b){a.j=2.6("j");a.T=2.v(a.T);7 c=n(a.1h||8.9.1f)(a),f=2.6("C");c.X?f[c.X]=c:f.P(c);c.O&&2.S(c.U());2.x(b,a.j,c);4 d(c)},w:3(a){2.t(2.6(a));2.B(a,[]);4 2},t:3(a){A(7 b K a)a.R(b)&&(a[b]o 8.9.15?(8.9.y.1j(a[b]),a[b].N&&a[b].N(s)):a[b]o G&&2.t(a[b]),a[b]=s)},22:3(a,b,c){a=2.6(a);b.q=d.21(b.q)?b.q:[b.q];A(7 f K a)k(a.R(f)){7 e=!1,g;A(g K b.q)k(-1<d.20(b.q[g],a[f][b.1Y]))e=!0;Q k(b.V&&"1X"===b.V){e=!1;1W}c(a[f],e)}4 2},6:3(a,b){7 c=2.m;k(!c[a]){k(-1<a.1Z(">")){A(7 d=a.1c(/ /g,"").r(">"),e=0;e<d.L;e++){k(!c[d[e]])k(b)c[d[e]]=e+1<d.L?[]:b;Q 4 s;c=c[d[e]]}4 c}b&&!c[a]&&2.B(a,b)}4 c[a]},27:3(a,b,c){7 d=2.6("J",a.28||n 8.9.29);d.26(a);d.23(2.6("j"),2.D(b));2.x(c,d);4 2},24:3(){s!=2.6("J")&&2.6("J").25();4 2},B:3(a,b){2.m[a]=b;4 2},1V:3(){7 a=2.6("j"),b=a.1K();d(a).1b("1J");a.1M(b);4 2},1L:3(){2.w("C").w("W").w("M").t(2.m);l.1G(2.u,2.1F)},x:3(a){a&&d.1I(a)&&a.19(2,G.F.16.17(E,1))},v:3(a){k(!a)4 n 8.9.H(0,0);k(a o 8.9.H)4 a;a=a.1c(/ /g,"").r(",");4 n 8.9.H(a[0],a[1])},D:3(a){4!a?s:a o l?a[0]:a o 1H?a:d("#"+a)[0]}});l.I.z({1b:3(a){8.9.y.14(2[0],a);4 2},Y:3(a,b,c){8.9&&2[0]o 8.9.15?8.9.y.1S(2[0],a,b):c?2.Z(a,b,c):2.Z(a,b);4 2}});l.13("1R 1U 1T 1O 1N 1Q 1P".r(" "),3(a,b){l.I[b]=3(a,d){4 2.Y(b,a,d)}})})(l);', 62, 134, '||this|function|return||get|var|google|maps||||||||||map|if|jQuery|instance|new|instanceof|options|value|split|null|_c|el|_latLng|clear|_call|event|extend|for|set|markers|_unwrap|arguments|prototype|Array|LatLng|fn|iw|in|length|overlays|setMap|bounds|push|else|hasOwnProperty|addBounds|position|getPosition|operator|services|id|addEventListener|bind|center|_setup|data|each|trigger|MVCObject|slice|call|_create|apply|_init|triggerEvent|replace|gmap|mapTypeId|Marker|namespace|marker|ui|clearInstanceListeners|string|pluginName|substring|_|typeof|LatLngBounds|callback|fitBounds|option|addListenerOnce|Map|init|bounds_changed|controls|addControl|roadmap|addMarker|inViewport|zoom|contains|getBounds|name|removeData|Object|isFunction|resize|getCenter|destroy|setCenter|mouseout|mouseover|dragend|drag|click|addListener|dblclick|rightclick|refresh|break|AND|property|indexOf|inArray|isArray|find|open|closeInfoWindow|close|setOptions|openInfoWindow|infoWindow|InfoWindow'.split('|'), 0, {}))
 /*!
 * jQuery UI Google Map 3.0-alpha
 * http://code.google.com/p/jquery-ui-map/
 * Copyright (c) 2010 - 2011 Johan SÃ¤ll Larsson
 * Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php
 *
 * Depends:
 *      jquery.ui.map.js
 */
(function ($) {

    $.extend($.ui.gmap.prototype, {

        /**
		 * Gets the current position
		 * @param callback:function(position, status)
		 * @param geoPositionOptions:object, see https://developer.mozilla.org/en/XPCOM_Interface_Reference/nsIDOMGeoPositionOptions
		 */
        getCurrentPosition: function (a, b) {
            var c = this;
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
					function (d) {
					    c._call(a, d, "OK");
					},
					function (error) {
					    c._call(a, null, error);
					},
					b
				);
            } else {
                c._call(a, null, "NOT_SUPPORTED");
            }
        },

        /**
		 * Watches current position
		 * To clear watch, call navigator.geolocation.clearWatch(this.get('watch'));
		 * @param callback:function(position, status)
		 * @param geoPositionOptions:object, see https://developer.mozilla.org/en/XPCOM_Interface_Reference/nsIDOMGeoPositionOptions
		 */
        watchPosition: function (a, b) {
            var c = this;
            if (navigator.geolocation) {
                this.set('watch', navigator.geolocation.watchPosition(
					function (d) {
					    c._call(a, d, "OK");
					},
					function (error) {
					    c._call(a, null, error);
					},
					b
				));
            } else {
                c._call(a, null, "NOT_SUPPORTED");
            }
        },

        /**
		 * Clears any watches
		 */
        clearWatch: function () {
            if (navigator.geolocation) {
                navigator.geolocation.clearWatch(this.get('watch'));
            }
        },

        /**
		 * Autocomplete using Google Geocoder
		 * @param panel:string/node/jquery
		 * @param callback:function(results, status)
		 */
        autocomplete: function (a, b) {
            var self = this;
            $(this._unwrap(a)).autocomplete({
                source: function (request, response) {
                    self.search({ 'address': request.term }, function (results, status) {
                        if (status === 'OK') {
                            response($.map(results, function (item) {
                                return { label: item.formatted_address, value: item.formatted_address, position: item.geometry.location }
                            }));
                        } else if (status === 'OVER_QUERY_LIMIT') {
                            alert('Google said it\'s too much!');
                        }
                    });
                },
                minLength: 3,
                select: function (event, ui) {
                    self._call(b, ui);
                },
                open: function () { $(this).removeClass("ui-corner-all").addClass("ui-corner-top"); },
                close: function () { $(this).removeClass("ui-corner-top").addClass("ui-corner-all"); }
            });
        },

        /**
		 * Retrieves a list of Places in a given area. The PlaceResultss passed to the callback are stripped-down versions of a full PlaceResult. A more detailed PlaceResult for each Place can be obtained by sending a Place Details request with the desired Place's reference value.
		 * @param a:google.maps.places.PlaceSearchRequest, http://code.google.com/apis/maps/documentation/javascript/reference.html#PlaceSearchRequest
		 * @param b:function(result:google.maps.places.PlaceResult, status:google.maps.places.PlacesServiceStatus), http://code.google.com/apis/maps/documentation/javascript/reference.html#PlaceResult
		 */
        placesSearch: function (a, b) {
            this.get('services > PlacesService', new google.maps.places.PlacesService(this.get('map'))).search(a, b);
        },

        clearDirections: function () {
            var a = this.get('services > DirectionsRenderer');
            if (a) {
                a.setMap(null);
                a.setPanel(null);
            }
        }


    });

}(jQuery));

/*!
* jQuery UI Google Map 3.0-rc
* http://code.google.com/p/jquery-ui-map/
* Copyright (c) 2010 - 2012 Johan SÃ¤ll Larsson
* Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php
*
* Depends:
*      jquery.ui.map.js
*/
(function ($) {

    $.extend($.ui.gmap.prototype, {

        /**
		 * Adds a shape to the map
		 * @param shapeType:string Polygon, Polyline, Rectangle, Circle
		 * @param shapeOptions:object
		 * @return object
		 */
        addShape: function (shapeType, shapeOptions) {
            var shape = new google.maps[shapeType](jQuery.extend({ 'map': this.get('map') }, shapeOptions));
            this.get('overlays > ' + shapeType, []).push(shape);
            return $(shape);
        },

        /**
		 * Adds fusion data to the map.
		 * @param fusionTableOptions:google.maps.FusionTablesLayerOptions, http://code.google.com/intl/sv-SE/apis/maps/documentation/javascript/reference.html#FusionTablesLayerOptions
		 * @param fusionTableId:int
		 */
        loadFusion: function (fusionTableOptions, fusionTableId) {
            ((!fusionTableId) ? this.get('overlays > FusionTablesLayer', new google.maps.FusionTablesLayer()) : this.get('overlays > FusionTablesLayer', new google.maps.FusionTablesLayer(fusionTableId, fusionTableOptions))).setOptions(jQuery.extend({ 'map': this.get('map') }, fusionTableOptions));
        },

        /**
		 * Adds markers from KML file or GeoRSS feed
		 * @param uid:String - an identifier for the RSS e.g. 'rss_dogs'
		 * @param url:String - URL to feed
		 * @param kmlLayerOptions:google.maps.KmlLayerOptions, http://code.google.com/intl/sv-SE/apis/maps/documentation/javascript/reference.html#KmlLayerOptions
		 */
        loadKML: function (uid, url, kmlLayerOptions) {
            this.get('overlays > ' + uid, new google.maps.KmlLayer(url, jQuery.extend({ 'map': this.get('map') }, kmlLayerOptions)));
        }

    });

}(jQuery)); 

//======================================================== FASTCLICK
         function FastButton(element, handler) {
            this.element = element;
            this.handler = handler;
            element.addEventListener('touchstart', this, false);
         };
         FastButton.prototype.handleEvent = function(event) {
            switch (event.type) {
               case 'touchstart': this.onTouchStart(event); break;
               case 'touchmove': this.onTouchMove(event); break;
               case 'touchend': this.onClick(event); break;
               case 'click': this.onClick(event); break;
            }
         };
         FastButton.prototype.onTouchStart = function(event) {
			//event.stopPropagation();
            this.element.addEventListener('touchend', this, false);
            document.body.addEventListener('touchmove', this, false);
            this.startX = event.touches[0].clientX;
            this.startY = event.touches[0].clientY;
			//isMoving = false;
         };
         FastButton.prototype.onTouchMove = function(event) {
            if(Math.abs(event.touches[0].clientX - this.startX) > 10 || Math.abs(event.touches[0].clientY - this.startY) > 10) {
               this.reset();
            }
         };
         FastButton.prototype.onClick = function(event) {
			event.stopPropagation();
            this.reset();
            this.handler(event);
            if(event.type == 'touchend') {
               preventGhostClick(this.startX, this.startY);
            }
         };
         FastButton.prototype.reset = function() {
            this.element.removeEventListener('touchend', this, false);
            document.body.removeEventListener('touchmove', this, false);			
         };
         function preventGhostClick(x, y) {
            coordinates.push(x, y);
            window.setTimeout(gpop, 2500);
         };
         function gpop() {
            coordinates.splice(0, 2);
         };
         function gonClick(event) {
            for(var i = 0; i < coordinates.length; i += 2) {
               var x = coordinates[i];
               var y = coordinates[i + 1];
               if(Math.abs(event.clientX - x) < 25 && Math.abs(event.clientY - y) < 25) {
                  event.stopPropagation();
                  event.preventDefault();
               }
            }
         };
         document.addEventListener('click', gonClick, true);
         var coordinates = [];
         function initFastButtons() {
			new FastButton(document.getElementById("fastclick"), goSomewhere);
         };
         function goSomewhere() {
			var theTarget = document.elementFromPoint(this.startX, this.startY);
			if(theTarget.nodeType == 3) theTarget = theTarget.parentNode;
			
			var theParent = theTarget;
			
			// Set button style back to normal
			while (theParent.tagName !== "LI") {										// Keep looking for the parent element until we hit the LI. That takes care of both buttons and list items
				if (theParent.tagName === "FORM" || theParent.tagName === "BODY" ) {
					break;
				}
				theParent = theParent.parentNode;
				if (theParent.className.indexOf("ui-btn-down-a") !== -1) {				// If the button class A is a button down, then
					theParent.className = theParent.className.replace("ui-btn-down-a","ui-btn-up-a");	// Make it button up.
				}
				if (theParent.className.indexOf("ui-btn-down-d") !== -1) {				// If the button class D is a button down, then
					theParent.className = theParent.className.replace("ui-btn-down-d","ui-btn-up-d");	// Make it button up.
				}
			}
			// Slash set button style
						
			var theEvent = document.createEvent('MouseEvents');
			theEvent.initEvent('click', true, true);
			theTarget.dispatchEvent(theEvent);
         };
//========================================================
 
// All AJAX javascript queries

function getIntray(intray, i) {
    $("#filter").blur();
    Load();
    $.ajax({
        url: "inc/ajax/ajax.getIntray.php",
        dataType: "html",
        data: {
            intray: intray,
            filterCode: i
        },
        timeout: 3000000, 
        success: function (data) {
            Unload();
            $("#" + intray + "Intray").html(data);
            $("#default").trigger("create");

        },
        error: function (request, status, error) {
            Unload();
            $("#" + intray + "Intray").html("<div class='float-left'>There has been an error: " + error + ". Please try again. If it continues please contact Merit.</div>");

        }
    });
}

function GetAddressDetails() {
    //alert("coming ajax");
    if ($("#lno").val().length > 0 && $("#lstreet").val().length > 0 && $("#ltype").val().length > 0 && $("#lsuburb").val().length > 0) {
        $.ajax({
            url: 'inc/ajax/ajax.getAddressBasic.php',
            type: 'POST',
            dataType: "json",
            data: {
                flatNumber: function () { return $("#lfno").val() },
                streetNumber: function () { return $("#lno").val() },
                streetName: function () { return $("#lstreet").val() },
                streetType: function () { return $("#ltype").val() },
                streetSuburb: function () { return $("#lsuburb").val() }
            },
            success: function (data) {
                //alert("prop id: " + data.property_no);
                if (data.property_no == "0" || data.property_no == "" ) {
                    $("#property_no").val("").removeClass("ui-autocomplete-loading");
                }
                else {                    
                    $("#property_no").val(data.property_no).removeClass("ui-autocomplete-loading");
                }
                $("#address").val(data.address_id);
                $("#addressId").val(data.address_id);
                $("#lroad_type").val(data.road_type).removeClass("ui-autocomplete-loading");
                $("#lroad_responsibility").val(data.road_responsibility).removeClass("ui-autocomplete-loading");
                $("#larea_group").val(data.area_group);
                if (data.address_id != "0" || data.address_id != "" || data.address_id > 0 ) {
                    $("#AddrSummary").removeAttr("disabled");
                }
            }
        });
    }
}

function GetCustomerAddressDetails() {
    if ($("#same").val() == "s" &&  $("#i_cstreet").val().length > 0 && $("#i_ctype").val().length > 0 && $("#i_csuburb").val().length > 0
        || $("#same").val() == "i" &&  $("#i_cstreet").val().length > 0 && $("#i_ctype").val().length > 0 && $("#i_csuburb").val().length > 0) {
        $.ajax({
            url: 'inc/ajax/ajax.getAddressBasic.php',
            type: 'POST',
            dataType: "json",
            data: {
                flatNumber: function () { return $("#i_cfno").val() },
                streetNumber: function () { return $("#i_cno").val() },
                streetName: function () { return $("#i_cstreet").val() },
                streetType: function () { return $("#i_ctype").val() },
                streetSuburb: function () { return $("#i_csuburb").val() }
            },
            success: function (data) {
                //alert(data.property_no);
                $("#cust_address_id").val(data.address_id);
                if (data.property_no == "0" || data.property_no == "") {
                    $("#i_cpropertynumber").val("").removeClass("ui-autocomplete-loading");
                }
                else {
                    $("#i_cpropertynumber").val(data.property_no).removeClass("ui-autocomplete-loading");
                }
                if (data.address_id != "0" || data.address_id != "" || data.address_id > 0) {
                    $("#CustAddSummary").removeAttr("disabled");
                }
            }
        });
    }
    else if ($("#same").val() == "o" && $("#o_cno").val().length > 0 && $("#o_cstreet").val().length > 0 && $("#o_ctype").val().length > 0 && $("#o_csuburb").val().length > 0) {
        $.ajax({
            url: 'inc/ajax/ajax.getAddressBasic.php',
            type: 'POST',
            dataType: "json",
            data: {
                flatNumber: function () { return $("#o_cfno").val() },
                streetNumber: function () { return $("#o_cno").val() },
                streetName: function () { return $("#o_cstreet").val() },
                streetType: function () { return $("#o_ctype").val() },
                streetSuburb: function () { return $("#o_csuburb").val() }
            },
            success: function (data) {
                $("#o_cpostcode").val(data.postcode);
                $("#cust_address_id").val(data.address_id);
                $("#o_cpropertynumber").val(data.property_no);
                if (data.address_id != "0" || data.address_id != "" || data.address_id > 0) {
                    $("#CustAddSummary").removeAttr("disabled");
                }
            }
        });
    }
}

function Search(sear) {
    if (sear.length > 0) {
        Load();
        $.post("inc/ajax/ajax.search.php", { search_q: sear },
		function (data) {
		    $("#search_query").html(data);
		}, "html");
    }
    else {
        $("#search_query").html("Please enter a search query.");
    }
}

function GetAssociationDetails(type_txt, type_desc, type_cnt, type_key, type_code, form_name, key_name, address_id) {
    Load();
    $.post("inc/ajax/ajax.getAssociationDetails.php", { type_txt: type_txt, type_desc: type_desc, type_cnt: type_cnt, type_key: type_key, type_code: type_code, form_name: form_name, key_name: key_name, address_id: address_id },
	function (data) {
	    $("#association_details").html(data);
	}, "html");

}

function GetAliasDetails(address_id, type_txt, type_desc, type_cnt, type_key, type_code) {
    Load();
    $.post("inc/ajax/ajax.getAliasDetails.php", { address_id: address_id, type_txt: type_txt, type_desc: type_desc, type_cnt: type_cnt, type_key: type_key, type_code: type_code },
	function (data) {
	    $("#alias_details").html(data);
	}, "html");

}

function GetAttributeDetails(address_id, type_txt, type_desc, type_cnt, type_key, type_code, status_ind) {
    Load();
    $.post("inc/ajax/ajax.getAttributeDetails.php", { type_txt: type_txt, type_desc: type_desc, type_cnt: type_cnt, type_key: type_key, type_code: type_code, address_id: address_id, status_ind: status_ind },
	function (data) {
	    $("#attribute_details").html(data);
	}, "html");

}

function GetAliasDetails_iphone(id, address_id, type_txt, type_desc, type_cnt, type_key, type_code) {
    Load();
    $.post("inc/ajax/ajax.getAliasDetails.php", { address_id: address_id, type_txt: type_txt, type_desc: type_desc, type_cnt: type_cnt, type_key: type_key, type_code: type_code },
	function (data) {
	    $('#popup').html(data);
	    $("#popup").popup("open");
	    $("#view-address").page('destroy').page();
	}, "html");

}
function GetAssociationDetails_iphone(id, type_txt, type_desc, type_cnt, type_key, type_code, form_name, key_name, address_id) {
    Load();
    $.post("inc/ajax/ajax.getAssociationDetails.php", { type_txt: type_txt, type_desc: type_desc, type_cnt: type_cnt, type_key: type_key, type_code: type_code, form_name: form_name, key_name: key_name, address_id: address_id },
	function (data) {
	    $('#popup').html(data);
	    $("#popup").popup("open");
	    $("#view-address").page('destroy').page();
	}, "html");

}
function GetAttributeDetails_iphone(id, address_id, type_txt, type_desc, type_cnt, type_key, type_code, status_ind) {
    Load();
    $.post("inc/ajax/ajax.getAttributeDetails.php", { type_txt: type_txt, type_desc: type_desc, type_cnt: type_cnt, type_key: type_key, type_code: type_code, address_id: address_id, status_ind: status_ind },
	function (data) {
	    $('#popup').html(data);
	    $("#popup").popup("open");
	    $("#view-address").page('destroy').page();
	}, "html");
}

function CheckCountOnlyAjax(ser, req, func) {
    $.ajax({
        url: "inc/ajax/ajax.chkCountOnly.php",
        dataType: "json",
        data: {
            request_code: req, service_code: ser, function_code: func
        },
        success: function (data) {
            if (data.flag_value == "Y") {
                        $("#countOnlyInd").val("Y");
                        $("#submit").prop('disabled', true).buttonState("disable");
                        $("#saveMore").prop('disabled', true).buttonState("disable");
                        $("#saveCountOnly").prop('disabled', false).buttonState("enable");
                        $("#workflowSRF").prop('disabled', true).buttonState("disable");
                    
            }
            else if (data.flag_value == "N") {
                $("#countOnlyInd").val("N");
                $("#submit").prop('disabled', false).buttonState("enable");
                $("#saveMore").prop('disabled', false).buttonState("enable");
                $("#saveCountOnly").prop('disabled', false).buttonState("enable");
                $("#workflowSRF").prop('disabled', false).buttonState("enable");
            }
            else if (data.flag_value == "S") {
                $("#countOnlyInd").val("N");
                $("#submit").prop('disabled', false).buttonState("enable");
                $("#saveMore").prop('disabled', false).buttonState("enable");
                $("#saveCountOnly").prop('disabled', true).buttonState("disable");
                $("#workflowSRF").prop('disabled', false).buttonState("enable");
            }
        }
    });
}

function CheckCountOnly(count_only) {
    if (count_only == "Y") {
        $("#countOnlyInd").val("Y");
        $("#submit").prop('disabled', true).buttonState("disable");
        $("#saveMore").prop('disabled', true).buttonState("disable");
        $("#saveCountOnly").prop('disabled', false).buttonState("enable");
        $("#workflowSRF").prop('disabled', true).buttonState("disable");
    }
    else if (count_only == "N") {
        $("#countOnlyInd").val("N");
        $("#submit").prop('disabled', false).buttonState("enable");
        $("#saveMore").prop('disabled', false).buttonState("enable");
        $("#saveCountOnly").prop('disabled', false).buttonState("enable");
        $("#workflowSRF").prop('disabled', false).buttonState("enable");
    }
    else if (count_only == "S") {
        $("#countOnlyInd").val("N");
        $("#submit").prop('disabled', false).buttonState("enable");
        $("#saveMore").prop('disabled', false).buttonState("enable");
        $("#saveCountOnly").prop('disabled', true).buttonState("disable");
        $("#workflowSRF").prop('disabled', false).buttonState("enable");
    }
}

function GetHelpNotes(func, req, ser) {

    $.ajax({
        url: "inc/ajax/ajax.getHelpNotes.php",
        dataType: "json",
        data: {
            request_code: req, service_code: ser, function_code: func
        },
        success: function (data) {
            if (data.helpText.length > 0 || data.helpURL.length > 0) {
                if (ser.length > 0 && req.length == 0 && func.length == 0) {
                    $("#service_help").fadeIn("fast");
                    $("#service_helpText").val(data.helpText);
                    $("#service_helpURL").val(data.helpURL);
                }

                if (ser.length > 0 && req.length > 0 && func.length == 0) {
                    $("#request_help").fadeIn("fast");
                    $("#request_helpText").val(data.helpText);
                    $("#request_helpURL").val(data.helpURL);
                }

                if (ser.length > 0 && req.length > 0 && func.length > 0) {
                    $("#function_help").fadeIn("fast");
                    $("#function_helpText").val(data.helpText);
                    $("#function_helpURL").val(data.helpURL);
                }

            }
            else {
                $("#infoHover").fadeOut("fast");
            }
        }
    });
}

function QueryUDFs(func, req, ser) {
    $.ajax({
        url: "inc/ajax/ajax.getSrfUDFs.php",
        type: 'post',
        data: { function_code: func, service_code: ser, request_code: req },
        success: function (data) {
            $("#global-udfs").html(data);
            $("#default").trigger("create");
        }
    });
}

function QuerySearchUDFs(func, req, ser) {
    $.ajax({
        url: "inc/ajax/ajax.getSearchUDFs.php",
        type: 'post',
        data: { function_code: func, service_code: ser, request_code: req },
        success: function (data) {
            $("#global-udfs").html(data);
            $("#default").trigger("create");
        }
    });
}

function CheckHistory(type) {
    if (type == "B") {
        CheckLocationHistoryCount(type);
        CheckCustomerHistoryCount(type);
    }
    else if (type == "C") {
        CheckCustomerHistoryCount(type);
    }
    else if (type == "L") {
        CheckLocationHistoryCount(type);
    }
}

function CheckHistoryDirect(type) {

    if (type == "B") {
        CheckLocationHistory();
        CheckCustomerHistory();
    }
    else if (type == "C") {
        CheckCustomerHistory();
    }
    else if (type == "L") {
        CheckLocationHistory();
    }

}

function CheckLocationHistory() {
    $.ajax({
        url: "inc/ajax/ajax.getRequestHistory.php",
        type: 'post',
        data: {
            flatNumber: function () { return $("#lfno").val() },
            streetNumber: function () { return $("#lno").val() },
            streetName: function () { return $("#lstreet").val() },
            streetType: function () { return $("#ltype").val() },
            streetSuburb: function () { return $("#lsuburb").val() }
        },
        success: function (data) {
            $("#popup").html(data);
        }
    });
}

function CheckCustomerHistory() {
    if ($("#same").val() == "i" || $("#same").val() == "s") {
        var fno = function () { return $("#i_cfno").val() };
        var no = function () { return $("#i_cno").val() };
        var street = function () { return $("#i_cstreet").val() };
        var type = function () { return $("#i_ctype").val() };
        var suburb = function () { return $("#i_csuburb").val() };
    }
    else {
        var fno = function () { return $("#o_cfno").val() };
        var no = function () { return $("#o_cno").val() };
        var street = function () { return $("#o_cstreet").val() };
        var type = function () { return $("#o_ctype").val() };
        var suburb = function () { return $("#o_csuburb").val() };
    }

    $.ajax({
        url: "inc/ajax/ajax.getRequestHistory.php",
        type: 'post',
        data: {
            flatNumber: fno,
            streetNumber: no,
            streetName: street,
            streetType: type,
            streetSuburb: suburb
        },
        success: function (data) {
            $("#popup").html(data);
        }
    });
}

function CheckLocationHistoryCount(type) {
    $.ajax({
        url: "inc/ajax/ajax.getRequestHistoryCount.php",
        type: 'post',
        dataType: 'json',
        data: {
            function_code: function () { return $("#function").val() },
            service_code: function () { return $("#service").val() },
            request_code: function () { return $("#request").val() },
            flatNumber: function () { return $("#lfno").val() },
            streetNumber: function () { return $("#lno").val() },
            streetName: function () { return $("#lstreet").val() },
            streetType: function () { return $("#ltype").val() },
            streetSuburb: function () { return $("#lsuburb").val() }
        },
        success: function (data) {
            if (data.auto_show_count > 0) {
                $("#checkHistory").prop('disabled', false).buttonState('enable');
                if ($("#historysearchautoopenoff").val() == "N") CheckHistoryDirect(type);
            }
            if (data.total_count > 0) {
                $("#checkHistory").prop('disabled', false).buttonState('enable');
            }
        }
    });
}

function CheckCustomerHistoryCount(Atype) {
    if ($("#same").val() == "i" || $("#same").val() == "s") {
        var fno = function () { return $("#i_cfno").val() };
        var no = function () { return $("#i_cno").val() };
        var street = function () { return $("#i_cstreet").val() };
        var type = function () { return $("#i_ctype").val() };
        var suburb = function () { return $("#i_csuburb").val() };
    }
    else {
        var fno = function () { return $("#o_cfno").val() };
        var no = function () { return $("#o_cno").val() };
        var street = function () { return $("#o_cstreet").val() };
        var type = function () { return $("#o_ctype").val() };
        var suburb = function () { return $("#o_csuburb").val() };
    }

    $.ajax({
        url: "inc/ajax/ajax.getRequestHistoryCount.php",
        type: 'post',
        dataType: 'json',
        data: {
            function_code: function () { return $("#function").val() },
            service_code: function () { return $("#service").val() },
            request_code: function () { return $("#request").val() },
            flatNumber: fno,
            streetNumber: no,
            streetName: street,
            streetType: type,
            streetSuburb: suburb
        },
        success: function (data) {
            if (data.auto_show_count > 0) {
                $("#checkHistoryC").prop('disabled', false).buttonState('enable');
                if ($("#historysearchautoopenoff").val() == "N") CheckHistoryDirect(Atype);
            }
            if (data.total_count > 0) {
                $("#checkHistoryC").prop('disabled', false).buttonState('enable');
            }
        }
    });
}

function CheckMandatoryFields(ser, req, func) {
    $(".mandLabel").hide();
    $("[data-mand]").removeClass("required");
    $.ajax({
        url: 'inc/ajax/ajax.checkMandatoryFields.php',
        data: { service_code: ser, request_code: req, function_code: func },
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            $("input, textarea, select").each(function (key, value) {
                if ($(this).data("mand") !== undefined) {
                    var mand = data[$(this).data("mand")];
                    if ($(this).data("reliance") !== undefined) {
                        var reliance = data[$(this).data("reliance")];
                        if (mand == "Y" && reliance == "Y") {
                            $(this).addClass("required");
                            $("." + $(this).data("mand") + "_label").show();
                        }
                        else {
                            $(this).removeClass("required");
                            $("." + $(this).data("mand") + "_label").hide();
                        }
                    }
                    else if (mand == "Y") {
                        $(this).addClass("required");
                        $("." + $(this).data("mand") + "_label").show();
                    }
                    else {
                        $(this).removeClass("required");
                        $("." + $(this).data("mand") + "_label").hide();
                    }
                }
            });
        }
    });
}

function searchDocument() {
    var search_param = $("#searchterm").val();
    var search_type = $('input:radio[name=Search_type]:checked').val();
    Load()
    $.ajax({
        url: "inc/ajax/ajax.getDocumentSearch.php",
        type: 'post',
        data: {
            search_param: search_param,
            search_type: search_type,
        },
        success: function (data) {
            Unload();
            $("#searchResults").html(data);
        }
    });
}

function searchCustomerDocument(search_param, resultsDisplay) {
    //var search_param = $("#searchterm").val();
    var search_type = $('input:radio[name=Search_type]:checked').val();
    Load()
    $.ajax({
        url: "inc/ajax/ajax.getDocumentSearch.php",
        type: 'post',
        data: {
            search_param: search_param,
            search_type: search_type,
        },
        success: function (data) {
            Unload();

            $("#cust_searchResults").html(data);
            if ($("#cust_searchResults").html().length > 18) {
                $("#customerInfoXpert").removeAttr("disabled");
            } else {
                $("#cust_searchResults").attr("disabled","disabled");
            }
        }
    });
}

function unlinkDocument(doc_id) {
    Load()
    $.ajax({
        url: "inc/ajax/ajax.unlinkDocument.php",
        dataType: "json",
        type: 'post',
        data: {
            doc_id: doc_id,
        },
        success: function (data) {
            //Unload();
            location.reload();
            
        }
    });
}

function notifyInsuranceOfficer() {
    Load()
    $.ajax({
        url: "inc/ajax/ajax.notifyInsuranceOfficer.php",
        dataType: "json",
        type: 'post',
        success: function (data) {
            Unload();
            if (data.status = true)
                alert("Notification sent");
            else
                alert("Error Sending Notification");
        }
    });
}

function getSRFRedText() {
    Load()
    $.ajax({
        url: "inc/ajax/ajax.getSRFRedText.php",
        dataType: "json",
        type: 'post',
        data: {
            serviceid: $("#service").val(),
            requestid: $("#request").val(),
            functionid: $("#function").val()
        },
        success: function (data) {
            Unload();
            $("#rednote").html(data.note);

        }
    });
} 


var eventName;
if ('ontouchstart' in document) {
    eventName = 'touchstart';
} else {
    eventName = 'click';
}

$(document).ready(function () {
    $.datepicker.setDefaults({
        dateFormat: 'yy-mm-dd',
        constrainInput: true
    });
    
    //this thing controls wildcard searching
    /*
    $.ui.autocomplete.filter = function (array, term) {
        var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(term), "i");
        return $.grep(array, function (value) {
            return matcher.test(value.label || value.value || value);
        });
    };
    */

    generateDateTime();

    $("input[type=text]").prop("autocomplete", "off");

    var officerResponse = function (event, ui) {
        var label = "";
        var index = "";
        if (typeof ui.content != "undefined" && ui.content.length === 1) {
            label = ui.content[0].label;
            index = ui.content[0].index;
        }
        else if (typeof ui.item != "undefined" && ui.item.label.length > 0) {
            label = ui.item.label;
            index = ui.item.index;
        }
        if (label.length > 0 || index.length > 0) {
            $("#" + $(this).attr("id") + "Code").val(index);
            $("#" + $(this).attr("id")).val(label);
            $("#" + $(this).attr("id")).attr("readonly", true);
            $("#" + $(this).attr("id")).blur();
        }
    }
    
    
    $("input[data-adhocofficer]").autoCompleteInit("inc/ajax/ajax.adhocOfficerList.php", { term: "" }, officerResponse);
    $("input[data-officer]").autoCompleteInit("inc/ajax/ajax.officerList.php", { term: "" }, officerResponse);

    $("body").on("click", "input[data-officer]", function () {
        if ($(this).hasClass("ui-autocomplete-input")) {
            $("#" + $(this).attr("id") + "Code").val("");
            $(this).val("");
            $(this).attr("readonly", false);

            $("input[data-officer]").autoCompleteInit("inc/ajax/ajax.officerList.php", { term: "" }, officerResponse);
            $(this).autocomplete("search", "");
            
        }
        else{
            $("input[data-officer]").autoCompleteInit("inc/ajax/ajax.officerList.php", { term: "" }, officerResponse);
        }
    });

    $("body").on("click", "input[data-adhocofficer]", function () {
        if ($(this).hasClass("ui-autocomplete-input")) {
            $("#" + $(this).attr("id") + "Code").val("");
            $(this).val("");
            $(this).attr("readonly", false);

            $("input[data-adhocofficer]").autoCompleteInit("inc/ajax/ajax.adhocOfficerList.php", { term: "" }, officerResponse);
            $(this).autocomplete("search", "");

        }
        else {
            $("input[data-adhocofficer]").autoCompleteInit("inc/ajax/ajax.adhocOfficerList.php", { term: "" }, officerResponse);
        }
    });

    var windowOpen = "";

    $("body").on("click", "tr[data-link]", function () {
        window.location = $(this).attr("data-link");
    });

    $("body").on("click", "tr[data-new-window]", function () {
        if (windowOpen != "" && !windowOpen.closed) { windowOpen.location.href = $(this).attr("data-new-window"); windowOpen.focus(); }
        else windowOpen = window.open($(this).attr("data-new-window"));
    });

    // Edit Text
    $(".edit").on(eventName, function () {
        var self = this;
        var id = $(this).attr("id");

        $("#" + id + "Label").slideUp("fast");
        $("#" + id + "Edit").slideDown("fast");

        $("#" + id + "Close").on(eventName, function () {
            $("input:focus").blur().delay(350);
            $("#" + id + "Edit").slideUp();
            $("#" + id + "Label").slideDown("fast");
            $("#" + id + "TextVal").val($("#" + id + "Label").html());
        });
        $("#" + id + "Submit").on(eventName, function () {
            var action = $(this).attr("data-action");
            var dataExtra = $("#" + id + "TextVal").data();
            delete dataExtra.mobileTextinput;
            $("input:focus").blur().delay(350);
            $("#" + id + "Edit").slideUp("fast");
            var OldText = $("#" + id + "Label").html();
            $("#" + id + "Label").html($("#" + id + "TextVal").val());
            $("#" + id + "Label").slideDown("fast");

            $.ajax({
                url: 'inc/ajax/ajax.modify' + action + '.php',
                type: 'post',
                dataType: "json",
                data: { id: id, commentText: $("#" + id + "TextVal").val(), extra: dataExtra },
                success: function (data) {
                    if (data.status == false) {
                        alert("Error modifying. Please contact Merit or try again later.");
                        $("#" + id + "Label").html(OldText);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("Error modifying. Please contact Merit or try again later.");
                    $("#" + id + "Label").html(OldText);
                }
            });
            
        });
    });

    // Delete Text
    $(".delete").on(eventName, function () {
        var self = this;
        var id = $(this).attr("id");
        if (confirm("Are you sure you want to delete this item?")) {
            $("#" + id + "Object").slideUp("fast");
            var Editbox = id.replace("Parent", "");
            $("#" + Editbox + "Edit").slideUp("fast");
            var action = $(this).attr("data-action");
            var dataExtra = $(this).data();
            delete dataExtra.buttonElements;
            delete dataExtra.role;
            $.ajax({
                url: 'inc/ajax/ajax.modify' + action + '.php',
                type: 'post',
                dataType: "json",
                data: { id: id, commentText: '', extra: dataExtra },
                success: function (data) {
                    if (data.status == false) {
                        alert("Error deleting. Please contact Merit or try again later.");
                        $("#" + id + "Object").slideDown("fast");
                    } else {
                        //location.reload();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("Http Error deleting. Please contact Merit or try again later." + jqXHR.responseText);
            
                    $("#" + id + "Object").slideDown("fast");
                }
            });
        }
    });
    
    $(".deleteAttachment").on(eventName, function () {

        var self = this;
        var id = $(this).attr("id");
        if (confirm("Are you sure you want to delete this attachment?")) {
            $("#" + id + "Object").slideUp("fast");
            var path = $(this).attr("data-path");
            var urlID = $(this).attr("data-urlid");
            var reqID = $(this).attr("data-reqid");
            var path = $(this).attr("data-path");
            var date = $(this).attr("data-date");
            var subtype = $(this).attr("data-subtype");
            var dataExtra = $(this).data();
            delete dataExtra.buttonElements;
            delete dataExtra.role;
            $.ajax({
                url: 'inc/ajax/ajax.deleteAttachment.php',
                type: 'post',
                dataType: "json",
                data: { subtype: subtype, date:date,path:path,urlID: urlID, reqID: reqID, id: id, commentText: '', extra: dataExtra, path: path },
                success: function (data) {
                    if (data.status != true) {
                        alert(data.status);
                        $("#" + id + "Object").slideDown("fast");
                      
                    } else {
                        location.reload();
                        //$(self).parent().parent().hide();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("Error processing delete function. Please contact Merit or try again later.");
                    $("#" + id + "Object").slideDown("fast");
                   
                }
            });
        }
       
    });


});




function popup() {
    $(".dateField").each(function (index, element) {
        if ($(this).val() == "") {
            $(this).val("dd/mm/yyyy");
        }
    });
    $(".timeField").each(function (index, element) {
        if ($(this).val() == "") {
            $(this).val("--:-- --");
        }
    });
}

function ClearHelpNotes() {
    $(".hoverDiv").fadeOut("fast");
    $("#service_help").fadeOut("fast");
    $("#service_helpText").val("");
    $("#service_helpURL").val("");
    $("#request_help").fadeOut("fast");
    $("#request_helpText").val("");
    $("#request_helpURL").val("");
    $("#function_help").fadeOut("fast");
    $("#function_helpText").val("");
    $("#function_helpURL").val("");
}

function generateDateTime() {

    $(document).ajaxComplete(function (event, request, settings) {
        popup();
    });

    jQuery.validator.addClassRules({
        dateField: { dateField: true },
        timeField: { timeField: true }
    });

    $("body").on("focus", '.dateField', function () {
        if (!$(this).hasClass("hasDatepicker")) {
            $(this).datepicker({ defaultDate: $(this).val() });
            $(this).datepicker("option", "dateFormat", "dd/mm/yy");

        }
        $(this).datepicker("show");
    });
    $("body").on("focus", '.timeField', function () {
        if (!$(this).hasClass("hasDatepicker")) {
            $(this).timepicker({ timeFormat: 'hh:mm TT', controlType: 'select' });

        }
        $(this).timepicker("show");
    });

    $("body").on("submit", "form", function () {
        $(".dateField").each(function (index, element) {
            if ($(element).val() == "dd/mm/yyyy") {
                $(element).val("");
            }
        });
        $(".timeField").each(function (index, element) {
            if ($(element).val() == "--:-- --") {
                $(element).val("");
            }
        });
    });

    $("body").on("click", "input[data-ajax='true']", function () {
        $(".dateField").each(function (index, element) {
            if ($(element).val() == "dd/mm/yyyy") {
                $(element).val("");
            }
        });
        $(".timeField").each(function (index, element) {
            if ($(element).val() == "--:-- --") {
                $(element).val("");
            }
        });
    });
}

var supports = (function () {
    var div = document.createElement('div'),
       vendors = 'Khtml Ms O Moz Webkit'.split(' '),
       len = vendors.length;

    return function (prop) {
        if (prop in div.style) return true;

        prop = prop.replace(/^[a-z]/, function (val) {
            return val.toUpperCase();
        });

        while (len--) {
            if (vendors[len] + prop in div.style) {
                // browser supports box-shadow. Do what you need.  
                // Or use a bang (!) to test if the browser doesn't.  
                return true;
            }
        }
        return false;
    };
})();

// GLOBAL Javascript
// To do with pop ups, loading bars and preloading
function VarOperator(op) { //you object containing your operator
    this.operation = op;

    this.evaluate = function evaluate(param1, param2) {
        switch (this.operation) {
            case "=":
                return param1 == param2 ? true : false;
            case "<>":
                return param1 != param2 ? true : false;
            case "<":
                return param1 < param2 ? true : false;
            case ">":
                return param1 > param2 ? true : false;
            case "<=":
                return param1 <= param2 ? true : false;
            case ">=":
                return param1 >= param2 ? true : false;
        }
    }
}

var vo = Array();

$(document).on("click", ".closePopup", function () {
    $('#popup').html("");
    $('#popup').fadeOut("fast");
});

/* Plugins */

(function ($) {
    $.fn.textInputState = function (val) {
        if (typeof $(this).textinput == 'function') {
            $(this).textinput(val);
        }
    };

    $.fn.selectmenuState = function (val) {
        if (typeof $(this).selectmenu == 'function') {
            $(this).selectmenu(val);
        }
    };

    $.fn.triggerState = function (val) {
        if (typeof $(this).trigger == 'function') {
            $(this).trigger(val);
        }
    };

    $.fn.popupState = function (val) {
        if (typeof $(this).popup == 'function') {
            $(this).popup(val);
        }
    };

    $.fn.pageState = function (val) {
        if (typeof $(this).page == 'function') {
            $(this).page(val);
        }
    };

    $.fn.buttonState = function (val) {
        if (typeof $(this).button == 'function' && $(this).hasClass("ui-button")) {
            $(this).button(val);
        }
    };

    $.fn.autoCompleteInit = function (ajax, dataPass, response) {
        var self = this;
        $(this).addClass("ui-autocomplete-loading");
        $(this).blur(function () {
            $(this).autocomplete("close");
        });
        $.ajax({
            url: ajax,
            dataType: "json",
            data: dataPass,
            success: function (data) {
                $(self).removeClass("ui-autocomplete-loading");
                $(self).autocomplete({
                    source: data,
                    autoFocus: true,
                    delay: 0,
                    minLength: 0,
                    select: response,
                    response: response,
                    //added by harry
                    create: function (event, ui) {

                        //if this is the serviceInput
                        //autopopulate if there is one service
                        if ($(self).attr('id') == "serviceInput") {
                            $.ajax({
                                url: ajax,
                                dataType: "json",
                                data: dataPass,
                                success: function (data) {
                                    if (data.length == 1)
                                        //$("#serviceInput").click();
                                        $("#serviceInput").val("").attr("readonly", false).autocomplete("search", "");
                                }
                            });
                        }
                    }
                    //end addition by harry
                });
            }
        });
    };



    window.clicked = new Array();
    window.current = new Array();

    $.fn.autoCompleteInitSeq = function (init, ajax, dataPass, response, success, autoOpen) {
        var self = this;
        success = (typeof success === "undefined") ? function (test) { return true; } : success;
        autoOpen = (typeof autoOpen === "undefined") ? true : autoOpen;
        clicked[$(self).attr("id")] = false;
        current[$(self).attr("id")] = null;

        $(self).blur(function () {
            $(self).autocomplete("close");
        });

        $(self).click(function () {
            var prevVal = init();
            if ((current[$(self).attr("id")] == prevVal && $(self).attr('id') != "lsuburb" && $(self).attr('id') != "i_csuburb")) {
                $(self).autocomplete("search", $(self).val());
            }
            else {
                current[$(self).attr("id")] = prevVal;
                if (!clicked[$(self).attr("id")]) {
                    $(self).addClass("ui-autocomplete-loading");
                    if ($(self).hasClass("ui-autocomplete")) { $(self).autocomplete("destroy"); }
                    $.ajax({
                        url: ajax,
                        dataType: "json",
                        data: dataPass,
                        success: function (data) {
                            clicked[$(self).attr("id")] = true;
                            $(self).removeClass("ui-autocomplete-loading");
                            if (success(data)) {
                                $(self).autocomplete({
                                    source: data,
                                    autoFocus: true,
                                    delay: 0,
                                    minLength: 0,
                                    select: response,
                                    response: response
                                });
                                if (autoOpen == true) $(self).autocomplete("search", $(self).val());
                                $(self).trigger("focus");

                                if ($(self).attr('id') == "functionInput") {
                                    if (data.length == 1) {
                                        if ($("#textareaissue").length) {
                                            $("#textareaissue").focus();
                                        } else {
                                            $("#add-request-textarea").focus();
                                        }
                                    } else {
                                        $(self).focus();
                                    }
                                }
                            }
                        }
                    });
                }
            }
        });
    };

    $.fn.autoCompleteAjax = function (ajax, dataPass, response) {
        var self = this;
        $(self).focus(function () {

            $(self).addClass("ui-autocomplete-loading");
            $.ajax({
                url: ajax,
                dataType: "json",
                data: dataPass,
                success: function (data) {
                    $(self).removeClass("ui-autocomplete-loading");

                    $(self).autocomplete({
                        source: data,
                        autoFocus: true,
                        delay: 0,
                        minLength: 0,
                        select: response,
                        response: response
                    });

                    $(self).autocomplete("search", $(self).val());
                }
            });

        });

        $(self).blur(function () {
            $(self).autocomplete("close");
        });
    };

    $.fn.facClick = function () {
        if ($("#facilityInput").val().length > 0) {
            if (clearFacility()) {
                $(this).click();
            }
            else {
                $(this).blur();
                return;
            }
        }
    };

})(jQuery); 
/* Mobile Javascript */
var iWebkit; if (!iWebkit) { iWebkit = window.onload = function () { function fullscreen() { var a = document.getElementsByTagName("a"); for (var i = 0; i < a.length; i++) { if (a[i].className.match("noeffect")) { } else { a[i].onclick = function () { window.location = this.getAttribute("href"); return false } } } } function hideURLbar() { window.scrollTo(0, 0.9) } iWebkit.init = function () { fullscreen(); hideURLbar() }; iWebkit.init() } }

// Bindings

$(document).on("click", "input[type=text], textarea", function () {
    $(".ui-header-fixed").fadeOut("fast");
});

$(document).on("blur", "input[type=text], textarea", function () {
    $(".ui-header-fixed").fadeIn("fast");
});


$(document).ready(function () {
    // Write on keyup event of keyword input element
    $(document).on("input paste", "#searchText", function () {

        // When value of the input is not blank
        var leng = $(".searchObject").length;
        if ($("#searchText").val() != "" && $("#searchText").val().length > 1) {
            // Show only matching TR, hide rest of them
            var i = leng; while (i--) {
                if ($("#searchObject" + i).html().toLowerCase().indexOf($("#searchText").val().toLowerCase()) > 0) {
                    $("#searchObject" + i).show();
                }
                else {
                    $("#searchObject" + i).hide();
                }
            }
        }
        else {
            var i = leng; while (i--) {
                $("#searchObject" + i).show();
            }
        }
    });


    $("#filterChange").on("change", function () {

        // When value of the input is not blank
        var leng = $(".searchObject").length;

        // Show only matching TR, hide rest of them
        if ($(this).val() != "") {
            var i = leng; while (i--) {
                if ($("#searchObject" + i).html().toLowerCase().indexOf($(this).val().toLowerCase()) > 0) {
                    $("#searchObject" + i).show();
                }
                else {
                    $("#searchObject" + i).hide();
                }
            }
        }
        else {
            var i = leng; while (i--) {
                $("#searchObject" + i).show();
            }
        }
    });

    $(document).on("click", ".infoHover", function () {
        if ($("#" + $(this).attr("id") + "Text").val().length > 0 || $("#" + $(this).attr("id") + "URL").val().length > 0) {
            $("#helpText_mobile").html($("#" + $(this).attr("id") + "Text").val());
            $("#helpURL_mobile").html($("#" + $(this).attr("id") + "URL").val());
            $("#popup").html($("#hoverDiv").html()).popup("open");
            $("#default").page("destroy");
            $("#default").page();
            $("#popup").css("top", "100px");

        }
    });

    $(document).on("click", "#infoHoverClose", function () {
        $("#popup").html($("#hoverDiv").html()).popup("close");
        $("#helpText_mobile").html("");
        $("#helpURL_mobile").html("");
    });

});

$(document).on("click", ".ViewFile", function(){
    Load();
    var path = $(this).attr("id");
    var request_id = $("#request_id").val();
    var action_id = $("#action_id").val();
    $.ajax({
        url:'inc/ajax/ajax.getAttachmentMobile.php',
        type: 'post',
        data: { path: path, req_id: request_id, act_id: action_id },
        success: function(data) {
            Unload();
            $("#popupContent").html(data);
            $("#popup").popup("open");
            $("#default").page('destroy');
            $("#default").page();
        }
    });
    return false;
});



$(document).on("pageinit", function () {
    $("#popup iframe")
		.attr("width", 0)
		.attr("height", 0);

    $("#popup").on({
        popupbeforeposition: function () {
            var size = scale(497, 298, 15, 1),
				w = size.width,
				h = size.height;

            $("#popup iframe")
				.attr("width", w)
				.attr("height", h);
            
        },
        popupafterclose: function () {
            $("#popup iframe")
				.attr("width", 0)
				.attr("height", 0);

        }
    });
});

// Functions

function Load() {
    $.mobile.loading("show");
}

function Unload() {
    $.mobile.loading("hide");
}

function display_fld(fld){
    document.getElementById("attrib_flds"+fld).style.display = "block";
    document.getElementById("button"+fld).style.display = "none";
}

function scale(width, height, padding, border) {
    var scrWidth = $(window).width() - 30,
		scrHeight = $(window).height() - 30,
		ifrPadding = 2 * padding,
		ifrBorder = 2 * border,
		ifrWidth = width + ifrPadding + ifrBorder,
		ifrHeight = height + ifrPadding + ifrBorder,
		h, w;

    if (ifrWidth < scrWidth && ifrHeight < scrHeight) {
        w = ifrWidth;
        h = ifrHeight;
    } else if ((ifrWidth / scrWidth) > (ifrHeight / scrHeight)) {
        w = scrWidth;
        h = (scrWidth / ifrWidth) * ifrHeight;
    } else {
        h = scrHeight;
        w = (scrHeight / ifrHeight) * ifrWidth;
    }

    return {
        'width': w - (ifrPadding + ifrBorder),
        'height': h - (ifrPadding + ifrBorder)
    };
}; 
