/*
 * 2014-5-9
 * tjc in xizi.com
 * */
(function () {
    if (window["ImageUtil"])return;
    var IOSHack=true;//todo:_iosHack where a problem with the ISO version
    var isIOS=navigator.userAgent.match(/AppleWebKit.+Version\/(\d+)/);
    window.ImageUtil = {
        pressImage: function (base64, option,callback,file) {
            if (!option)return base64;
            var image = document.createElement("img"), canvas = document.createElement("canvas");
            image.src = base64;
            var mine_type=base64.match(/^data:(image\/\w+);/)[1];
            image.onload=function(){
                canvas.width=image.width,canvas.height=image.height;
                if (option.width && image.width > option.width) {
                    canvas.width = option.width;
                    canvas.height = image.height * canvas.width / image.width;
                }
                if (option.height && canvas.height > option.height) {
                    canvas.height = option.height;
                    canvas.width = image.width * canvas.height / image.height;
                }
                if(isIOS&&IOSHack){
                    var mpImg = new MegaPixImage(file);
                    mpImg.render(canvas, { maxWidth: canvas.width, maxHeight: canvas.height, orientation: option.quality || 1 });
                    mpImg.onrender=function(){
                        callback(canvas.toDataURL(mine_type, option.quality || 1));
                    };
                }else{
                    var _context = canvas.getContext('2d')
                    _context.drawImage(image, 0, 0, canvas.width, canvas.height);
                    callback(canvas.toDataURL(mine_type, option.quality || 1));
                }
            }
        },
        viewFile: function (file,option,callback) {
            var reader = new FileReader();
            reader.onload = function (evt) {
                ImageUtil.pressImage(evt.target.result,option,function(base64){
                    callback(base64);
                },file);
            }
            reader.readAsDataURL(file);
        }
    };
})()