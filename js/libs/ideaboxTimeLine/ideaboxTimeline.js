//Javascript codes

(function(jQuery){

	jQuery.fn.ideaboxTimeline = function(params){
			var defaults={
					theme			:'default',
					feeds			:false,
					feedcount		:10,
					feedlinklabel	:'Continue to read',
					feedshowdesc	:true
				};
			var params=jQuery.extend(defaults,params);
			
			return this.each(function(){
				modul=jQuery(this);
				var gallery=new Array();				
				modul.addClass("it-"+params.theme);				
				if (params.feeds!=false)
				{
					getRSS();
					return false;
				}
				var boxcount=modul.find(".it-box").length;			
				modul.find(".it-box").each(function(index, element) {
					if ((index+1) % 2==0)
						jQuery(this).addClass("it-right it-animate");
					else
						jQuery(this).addClass("it-left it-animate");
					if (index==boxcount-1)
					{
						resizeEvent();
					}
				});
				
				modul.find(".it-content .it-image").on("click",function(event){
					if(event.preventDefault)
						event.preventDefault();
					else
						event.returnValue = false;
					if (jQuery(this).parent().attr("class")=="it-gallery")
					{
						gallery=[];
						jQuery(this).parent().find("a").each(function(index, element) {
							gallery.push(jQuery(this).attr("href"));
						});
					}
					else
					{
						gallery=[];
					}
					showPopupImage(jQuery(this).attr("href"),jQuery(this).index(),gallery.length);
				});
				
				modul.find("iframe").each(function(index, element){
					jQuery(this).attr("src",jQuery(this).attr("src")+"&wmode=transparent");
				});
				
				modul.find(".it-gallery").each(function(index, element) {
					var gobject=jQuery(this);
					var gcount=gobject.find("a").length;
					var gstr='<div>';
					for (k=0; k<gcount; k++)
					{
						if (k==0)
							gstr=gstr+'<span class="it-gactive"></span>';
						else
							gstr=gstr+'<span></span>';
					}
					gstr=gstr+'</div>';
					gobject.append(gstr);
					
					gobject.find("div span").on("click",function(){
						gobject.find("div span").removeClass();
						jQuery(this).addClass("it-gactive");
						gobject.find("a").fadeOut();
						gobject.find("a").eq(jQuery(this).index()).fadeIn();
					});
				});
				
				jQuery(window).on("resize",function (){
					resizeEvent();
				});		
				
				//functions------------------------------------
				function showPopupImage(img,iactive,icount)
				{
					var popup='<div class="it-popup-overlay">';
					popup=popup+'<img src="'+img+'" style="max-width:80%; -ms-transform: scale(0); -webkit-transform: scale(0); transform: scale(0);">';
					if (icount>1)					
						popup=popup+'<div class="it-popup-navi"><span></span><span></span></div></div>';
					else
						popup=popup+'</div>';
					
					jQuery("body").append(popup);
					jQuery(".it-popup-overlay").fadeIn("fast",function(){
						resizeEvent();
						jQuery(".it-popup-overlay>div").fadeIn();
						jQuery(this).find("img").css({
							"-ms-transform":"scale(1)",
							"-webkit-transform":"scale(1)",
							"transform":"scale(1)"
						});
						jQuery(".it-popup-overlay").on("click",function(event){
							jQuery(this).find("img").animate({top:jQuery(window).height()},"fast");
							jQuery(this).find("img").fadeOut("fast",function(){
								jQuery(".it-popup-overlay").remove();
							});
						});
						jQuery(".it-popup-overlay img").on("click",function(event){
							event.stopPropagation();
						});
						jQuery(".it-popup-overlay span").on("click",function(event){
							event.stopPropagation();
							if (jQuery(this).index()==0)
							{
								iactive--;
								if (iactive<0)
									iactive=icount-1;
								changeGalleryImage(iactive);
							}
							else
							{
								iactive++;
								if (iactive>icount-1)
									iactive=0;
								changeGalleryImage(iactive);
							}
						});
					});
					
				}
				
				function changeGalleryImage(activex)
				{
					jQuery(".it-popup-overlay img").animate({opacity:0},"fast",function(){
						jQuery(this).attr("src",gallery[activex]);
						jQuery(window).resize();
						jQuery(this).animate({opacity:1},"fast");
					});
				}
				
				function resizeEvent()
				{
					oW=window.outerWidth;
					mW=modul.outerWidth();
					iH=jQuery(".it-popup-overlay img").height();
					wH=jQuery(window).height();
					if (jQuery(".it-popup-overlay").length)
					{
						if (iH+100>wH)
						{
							jQuery(".it-popup-overlay img").css({
								"height":(wH-100)
							});
						}
						
						jQuery(".it-popup-overlay img").css({
							"top":(wH-iH)/2
						});
						jQuery(".it-popup-overlay>div").css({
							"top":(wH-iH)/2 + iH
						});
					}
					
					if (modul.find(".it-gallery").length)
					{
						if (oW>768)
							modul.find(".it-gallery").css({"height":(mW/2-70)*9/16});
						else
							modul.find(".it-gallery").css({"height":(mW-80)*9/16});		
					}
					
					if (modul.find("iframe").length)
					{
						if (oW>768)
							modul.find("iframe").css({"height":(mW/2-70)*9/16});
						else
							modul.find("iframe").css({"height":(mW-80)*9/16});
					}
				}
				
				/*RSS----------------------------*/
				function getRSSx(a,b,c)
				{
					c=new XMLHttpRequest;
					c.open('GET',a);
					c.onload=b;
					c.send()
				}
				
				function yql(a,b)
				{
					return 'http://query.yahooapis.com/v1/public/yql?q='+encodeURIComponent('select * from '+b+' where url=\"'+a+'\" limit '+params.feedcount)+'&format=json';
				};
				
				function getRSS()
				{
					feeds=params.feeds.split(",");
					modul.find(".it-box").remove();
					modul.find(".it-minibox").remove();
					rssdata=[];
					xx=0;
					for (k=0; k<feeds.length; k++)
					{
						getRSSx(yql(feeds[k].trim(),'rss'),function()
						{ 
							var resultx=JSON.parse(this.response); 
							resultx=resultx.query.results.item;		
							
							jQuery(resultx).each(function(index, element) {
								dateText= resultx[index].publishedDate;
								dataLink= jQuery('<a>').prop('href', resultx[index].link).prop('hostname');	
								var item={
								   title	: resultx[index].title,
								   desc		: resultx[index].description,										   
								   date 	: new Date( dateText),
								   label	: dataLink,
								   labeltext: params.feedlinklabel,
								   links	: resultx[index].link
								}  
								rssdata.push(item);
							});
							//-----
							if (xx==feeds.length-1)
							{
								rssdata.sort(function(a,b){
									return a.date < b.date;
								});
								
								var rsscontent=[];
								for (x=0; x<rssdata.length; x++)
								{
									if (params.feedshowdesc)
										xdata='<h4>'+rssdata[x].title+'</h4><p>'+rssdata[x].desc+'</p>';
									else
										xdata='<p>'+rssdata[x].title+'</p>';
									if (x % 2 ==0)
										xclass="it-box it-left it-animate";
									else
										xclass="it-box it-right it-animate";
									rsscontent[x]='<div class="'+xclass+'">'+
											'<div class="it-content">'+xdata+'<div class="it-infobar">'+
													'<em>'+rssdata[x].label+'</em>'+
													'<a target="_blank" href="'+rssdata[x].links+'" class="it-readmore">'+rssdata[x].labeltext+'</a>'+
												'</div>'+
											'</div>'+
											'<div class="it-iconbox">'+
												'<span></span>'+
											'</div>'+
										'</div>';
									
								}
								modul.append(rsscontent.join(''));
							}
							xx++;
							//-----
							
						})
					}
					
				}
				//end rss
			});	
			
		};
		

        $("#i-timeline").ideaboxTimeline();
})(jQuery);