function Page(ele,obj){
    this.target = document.querySelector(ele);
    this.pageIndex = 1;
    this.option = {
        totalNum:100,  //总数
        showNum:10,   //每页显示数量
        pageNum:5,    //一行显示几个页码
        callback:function(index){

        }
    };
    this.extend(obj);
    this.create();  //结构
    this.bindData();
//        this.bindEvent();
}
Page.prototype.extend = function (obj) {
    for (var i in obj){
        this.option[i] = obj[i];
    }
}
Page.prototype.create = function () {
    var that = this;
    this.target.className = "page";

    this.pagePrev = document.createElement("div");
    this.pagePrev.className = "page-prev";
    this.pagePrev.innerHTML = "上一页";
    this.target.appendChild(this.pagePrev);

    this.pageContent = document.createElement("ul");
    this.pageContent.className = "page-content";
    this.target.appendChild(this.pageContent);

   this.pageNext = document.createElement("div");
    this.pageNext.className = "page-next";
    this.pageNext.innerHTML = "下一页";
    this.target.appendChild(this.pageNext);
}
Page.prototype.bindData = function () {
    this.pageContent.innerHTML = "";
    var that = this;

    var totalPage = Math.ceil(this.option.totalNum / this.option.showNum);
    var start = 1;
    var end = this.option.pageNum;
    var middle = Math.floor(this.option.pageNum / 2);

    end = end > totalPage ? totalPage : end;
    start = this.pageIndex > middle ? this.pageIndex - middle : start;
    end = this.pageIndex > middle ? this.pageIndex * 1 + middle : end;

    start = this.pageIndex > (totalPage - middle) ? (totalPage - middle * 2) : start;
    end = this.pageIndex > (totalPage - middle) ? totalPage : end;
    start = this.pageIndex < 1 ? 1 : start;

    for (var i = start; i <= end; i++) {
        var li = document.createElement("li");
        li.innerHTML = i;
        this.pageContent.appendChild(li);

        if (i == this.pageIndex) {
            li.style.backgroundColor = "#E49497";
        }

        li.onclick = function () {
            that.pageIndex = this.innerHTML;
            that.bindData();
        }
    }
    this.bindEvent();
    if (this.pageIndex == 1){
        this.pagePrev.onclick = null;
        this.pagePrev.className = "page-prev disabled";
    }else {
        this.pagePrev.className = "page-prev";
    }
    if (this.pageIndex == totalPage){
        this.pageNext.onclick = null;
        this.pageNext.className = "page-next disabled";
    }else {
        this.pageNext.className = "page-next";
    }
    this.option.callback(this.pageIndex--)
}
Page.prototype.bindEvent = function () {
    var that = this;
    this.pagePrev.onclick = function () {
        that.pageIndex -- ;
        that.bindData();
    }
    this.pageNext.onclick = function () {
        that.pageIndex ++ ;
        that.bindData();
    }
}