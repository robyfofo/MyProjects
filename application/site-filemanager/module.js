/* admin/site-filemanager/module.js v.3.0.0. 04/11/2016 */

jQuery(document).ready(function() {
	iFrameHeight();		
	})
function iFrameHeight() {
	var w = $("#wrapper");
	var d = $("#iframecontent");
	var ht = w.height();
	var pth = (ht * 100) / 5;
	ht = ht - pth;
	if (ht <=500) ht = 500;
	d.height(ht);
	d.height(ht-20);   
}