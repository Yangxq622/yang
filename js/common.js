function contentLeft(table){
    $.ajax({
            type:"get",
            url:"../php/searchbytype.php",
            data:{
                table:table
            },
            dataType:"json",
            success:function(result){
                getData(result);
            }
        })
}
function getTotalNum(key){
    $.ajax({
        type:"get",
        url:"../php/searchnum.php",
        data:{
            key:key
        },
        dataType:"json",
        success:function(result){
            let sum = result["count"];
            $(".sort").children("span").html("产品总数：" + sum);
        }
    })
}
function getNum(table){
    $.ajax({
        type:"get",
        url:"../php/tablenum.php",
        data:{
            table:table
        },
        dataType:"json",
        success:function(result){
            let sum = result["count"];
            $(".sort").children("span").html("产品总数：" + sum);
        }
    })
}
function getTypeNum(table){
    $.ajax({
        type:"get",
        url:"../php/gettypenum.php",
        data:{
            table:table
        },
        dataType:"json",
        success:function(result){
            let sum = result["count"];
            $(".sort").children("span").html("产品总数：" + sum);
        }
    })
}