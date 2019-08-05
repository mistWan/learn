$.get("http://mist.cc/index/work/today", function (response) {
  $('h2.member').text(response.member)
  $('h2.increment').text(response.increment)
  $('h2.balance').text(response.balance)
  $('h2.transaction').text(response.transaction)
  $('h2.order').text(response.order)
});

$.get('http://mist.cc/index/work/limit', {'day': 7}, function (response) {
  console.log(response)
  getEcharts(response, $('#container1')[0])
})

$(function(){
  tabs($(".button button"), $(".graph div"));
});

var tabs = function(tab, content){
  tab.click(function(){
    tab.addClass('layui-btn-primary');
    $(this).removeClass('layui-btn-primary');

    var index = tab.index(this);
    content.hide();
    fetch(index);
    content.eq(index).show();
    console.log(content)
  })
};

function fetch(index) {
  switch (index) {
    case 0:
      $.get('http://mist.cc/index/work/limit', {'day': 7}, function(data){
        getEcharts(data, $('#container1')[0])
      });
      break;
    case 1:
      $.get('http://mist.cc/index/work/limit', {'day': 30}, function(data){
        getEcharts(data, $('#container2')[0])
      });
      break;
    case 2:
      $.get('http://mist.cc/index/work/limit', {'day': 90}, function(data){
        getEcharts(data, $('#container3')[0])
      });
      break;
    case 3:
      $.get('http://mist.cc/index/work/limit', {'day': 365}, function(data){
        getEcharts(data, $('#container4')[0])
      });
      break;
  }
}


var myChart;
function getEcharts(data, dom) {
  if (myChart != null && myChart != "" && myChart != undefined) {
    myChart.dispose();
  }
  myChart = echarts.init(dom);
  var option = {};
   option = {
     tooltip : {
       trigger: 'axis',
       axisPointer: {
         type: 'cross',
         label: {
           backgroundColor: '#6a7985'
         }
       }
     },
    legend: {
      right: 30,
      data:['交易额','订单数']
    },
    grid: {
      left: '3%',
      right: '4%',
      bottom: '3%',
      containLabel: true
    },
    xAxis: {
      type: 'category',
      boundaryGap: false,
      data: data[2]
    },
    yAxis: {
      type: 'value'
    },
    series: [
      {
        name:'交易额',
        type:'line',
        data: data[0]
      },
      {
        name:'订单数',
        type:'line',
        data: data[1]
      }
    ]
  };
  if (option && typeof option === "object") {
    myChart.setOption(option, true);
  }
};
