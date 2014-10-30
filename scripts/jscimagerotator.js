/*
Javascript jscImageRotator control
version 1.0
AdvanceByDesign.com

Copyright (C) 2011 Robert Rook
Released under the terms of the
ABD Free Source Code Licence
*/
a_jscImageRotators = new Array();

function jscImageRotator(containerid,w,h) {
	this.container = containerid;
	this.index = a_jscImageRotators.length;
	a_jscImageRotators.push(this);
	this.is_drawn = false;
	this.w = (w?w:300);
	this.h = (h?h:200);
	
	this.imagecount = 0;	
	this.images = new Array();
	this.current = 0;
	this.current_img_obj = 1;
	this.img_1_alpha = 100;
	this.img_2_alpha = 0;
	
	this.show_button_first = true;
	this.show_button_back = true;
	this.show_button_next = false;
	this.show_button_last = false;
	this.show_button_pause = true;
	this.max_links = 5;

	this.text_pos_x = 0;
	this.text_pos_y = 10;
	this.text_pos_w = this.w;
	this.links_pos_x = 10;
	this.links_pos_y = (this.h-30);
	
	this.timer = 0;
	this.timer_trans = 0;
	this.paused = 1;
	this.delay = 7000;		// 7 seconds on each image
	this.fade_speed = 500;	// 0.5 secs to transition

	return this;
}
function JSCIRImage(url,desc,index) {
	this.url = url;
	this.desc = desc;
	this.index = index;
	this.loaded = false;
	return this;
}
jscImageRotator.prototype.ImageLoaded = function(idx) {
	this.images[idx].loaded = true;
	if(idx==0) { this.JumpTo(0); }
	
	all_loaded = true;
	for(i=0;i<this.images.length;i++) {
		if(this.images[i].loaded==false) { all_loaded = false; }
	}

	if(all_loaded && this.paused) { this.Play(); }
};
jscImageRotator.prototype.Draw = function() {
	if(!this.is_drawn) {
		outHTML = "<div class=\"jscir\" id=\"id_jscir_"+this.index+"\" style=\"width:"+this.w+"px;height:"+this.h+"px;display:block;\"></div>";
		outHTML+= "<div class=\"jscir_textbg\" style=\"width:"+this.text_pos_w+"px;\" id=\"id_jscir"+this.index+"_text\"></div>";
		outHTML+= "<div class=\"jscir_nav\" id=\"id_jscir"+this.index+"_nav\"></div>";
		outHTML+= "<img class=\"jscir_img\" width=\""+this.w+"px\" height=\""+this.h+"px\" id=\"id_jscir"+this.index+"_img1\" />";
		outHTML+= "<img class=\"jscir_img\" width=\""+this.w+"px\" height=\""+this.h+"px\" id=\"id_jscir"+this.index+"_img2\" style=\"opacity:0;filter:alpha(opacity=0);\" onclick='Javascript:if(a_jscImageRotators["+this.index+"].paused) { a_jscImageRotators["+this.index+"].Play(); } else { a_jscImageRotators["+this.index+"].Pause(); } return false;' />";

		tmp_obj = GetOBJ(this.container);
		if(!tmp_obj) { return; }
		tmp_obj.innerHTML = outHTML;
		this.is_drawn = true;
		window.setTimeout('a_jscImageRotators['+this.index+'].Draw();',100);
	} else {
		obj_container = GetOBJ("id_jscir_"+this.index);
		obj_tmp = GetPOS(obj_container);
		tmp_x = obj_tmp['x'];
		tmp_y = obj_tmp['y'];
		tmp_w = obj_tmp['w'];
		tmp_h = obj_tmp['h'];

		obj_tmp = GetOBJ("id_jscir"+this.index+"_img1");		
		obj_tmp.style.left = tmp_x+"px";
		obj_tmp.style.top = tmp_y+"px";
		obj_tmp.style.width = tmp_w+"px";
		obj_tmp.style.height = tmp_h+"px";

		obj_tmp = GetOBJ("id_jscir"+this.index+"_img2");		
		obj_tmp.style.left = tmp_x+"px";
		obj_tmp.style.top = tmp_y+"px";
		obj_tmp.style.width = tmp_w+"px";
		obj_tmp.style.height = tmp_h+"px";

		GetOBJ("id_jscir"+this.index+"_text").style.left = (tmp_x+this.text_pos_x)+"px";
		GetOBJ("id_jscir"+this.index+"_text").style.top = (tmp_y+this.text_pos_y)+"px";

		GetOBJ("id_jscir"+this.index+"_nav").style.left = (tmp_x+this.links_pos_x)+"px";
		GetOBJ("id_jscir"+this.index+"_nav").style.top = (tmp_y+this.links_pos_y)+"px";

		for(i=0;i<this.images.length;i++) {
			tmp = new Image();
			tmp.idx_parent = this.index;
			tmp.idx_self = i;
			tmp.src = this.images[i].url;
			tmp.onload = function() { eval('a_jscImageRotators['+this.idx_parent+'].ImageLoaded('+this.idx_self+');'); }
		}
	}
};
jscImageRotator.prototype.LoadLinks = function() {
	link_obj = GetOBJ("id_jscir"+this.index+"_nav");
	outHTML = "";

	a_html = "<a href=\"#\" onclick='a_jscImageRotators["+this.index+"]";
	
	if(this.show_button_first) {
		outHTML+= a_html+".JumpTo(0);return false;'>&lt;&lt;</a> ";
	}
	if(this.show_button_back) {
		outHTML+= a_html+".ShowPrev();return false;'>&lt;</a> ";
	}
	tmp_first = ((this.current-Math.floor(this.max_links/2))<0?0:(this.current-Math.floor(this.max_links/2)));
	if((tmp_first+this.max_links)>(this.images.length-1)) {
		tmp_first = (this.images.length-this.max_links);
	}
	
	for(i=tmp_first;i<((tmp_first+this.max_links)>this.images.length?this.images.length:(tmp_first+this.max_links));i++) {
		outHTML+= a_html+".JumpTo("+i+");return false;'";
		outHTML+= (i==this.current?" class=\"current_link\"":"");
		outHTML+= ">"+(i+1)+"</a> ";
	}
	if(this.show_button_next) {
		outHTML+= a_html+".MoveNext();return false;'>&gt;</a> ";
	}
	if(this.show_button_last) {
		outHTML+= a_html+".JumpTo("+(this.images.length-1)+");return false;'>&gt;&gt;</a> ";
	}
	if(this.show_button_pause) {
		outHTML+= "<a href=\"#\" class=\"jscir_play\" id=\"id_jscir"+this.index+"_play\" onclick='Javascript:if(a_jscImageRotators[0].paused) { a_jscImageRotators[0].Play(); } else { a_jscImageRotators[0].Pause(); } return false;'>"+(this.paused?"Play":"Pause")+"</a> ";
	}
	
	link_obj.innerHTML = outHTML;
};
jscImageRotator.prototype.Play = function() {
	if(!this.is_drawn) { return; }
	this.paused = 0;
	this.timer = window.setInterval('a_jscImageRotators['+this.index+'].MoveNext();', this.delay);
	if(this.show_button_pause) {
		GetOBJ("id_jscir"+this.index+"_play").innerHTML = "Pause";
	}
};
jscImageRotator.prototype.Pause = function() {
	this.paused = 1;
	if(this.timer) { window.clearInterval(this.timer); }
	if(this.show_button_pause) {
		GetOBJ("id_jscir"+this.index+"_play").innerHTML = "Play";
	}
};
jscImageRotator.prototype.Add = function(url,desc) {
	this.images.push(new JSCIRImage(url,desc,this.images.length));
	this.imagecount = this.images.length;
	return this.images[(this.images.length-1)];
};
jscImageRotator.prototype.MoveNext = function() {
	if(this.current>=(this.imagecount-1)) {
		this.JumpTo(0);
	} else {
		this.JumpTo(this.current+1);
	}
};
jscImageRotator.prototype.MovePrev = function() {
	if(this.current==0) {
		this.JumpTo(this.imagecount-1);
	} else {
		this.JumpTo(this.current-1);
	}
};
jscImageRotator.prototype.JumpTo = function(idx) {
	if(!this.is_drawn) { return; }
	if(idx>=(this.imagecount-1)) { idx = (this.imagecount-1); } else if(idx<0) { idx = 0; }
	this.current = Math.round(idx);	
	this.current_img_obj = (this.current_img_obj==1?2:1);
	
	GetOBJ("id_jscir"+this.index+"_img"+this.current_img_obj).src = this.images[this.current].url;
	GetOBJ("id_jscir"+this.index+"_text").innerHTML = (this.images[this.current].desc==undefined?"":this.images[this.current].desc);

	if(this.timer_trans) { window.clearTimeout(this.timer_trans); }
	this.TransNext();
	this.LoadLinks();
};

jscImageRotator.prototype.TransNext = function() {
	if(this.current_img_obj==1 && this.img_1_alpha==100) { return; }
	if(this.current_img_obj==2 && this.img_2_alpha==100) { return; }
	if(this.current_img_obj==1) {
		this.img_1_alpha+= 10;
		this.img_2_alpha-= 10;
	} else {
		this.img_1_alpha-= 10;
		this.img_2_alpha+= 10;
	}
	GetOBJ("id_jscir"+this.index+"_img1").style.opacity = (this.img_1_alpha/100);
	GetOBJ("id_jscir"+this.index+"_img2").style.opacity = (this.img_2_alpha/100);
	if(GetOBJ("id_jscir"+this.index+"_img1").filters) {
		GetOBJ("id_jscir"+this.index+"_img1").filters.alpha.opacity = this.img_1_alpha;
		GetOBJ("id_jscir"+this.index+"_img2").filters.alpha.opacity = this.img_2_alpha;
	}
	this.timer_trans = window.setTimeout('a_jscImageRotators['+this.index+'].TransNext();', Math.round(this.fade_speed/10));
};

if(typeof GetOBJ!='function') {
	function GetOBJ(objID) {
		if(document.getElementById) {
			return document.getElementById(objID);
		} else if(document.all) {
			return document.all[objID];
		}
		return null;
	}
}
if(typeof GetPOS!='function') {
	function GetPOS(obj) {
		pos = new Array();
		pos['x'] = 0;
		pos['y'] = 0;
		pos['w'] = obj.offsetWidth;
		pos['h'] = obj.offsetHeight;

		tmpOBJ = obj;

		do {
			pos['x']+= tmpOBJ.offsetLeft;
			pos['y']+= tmpOBJ.offsetTop;
		} while (tmpOBJ = tmpOBJ.offsetParent);

		return pos;
	}
}