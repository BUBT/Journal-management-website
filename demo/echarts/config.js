/**
 * echarts.js 配置
 * 
 */


window.onload = function() {
    // echart();

    // createEchart('echarts', barChart());
    // createEchart('echarts', pieChart());
    

    createXHR('./_data_info.php', '', dataset);

    // createEchart('echarts', multiBarChart());
}

// echart();

let createEchart = function( echartsInName, option ) {
    let chart = echarts.init(document.getElementById(echartsInName));
    chart.setOption(option);
    return chart;
}


let multiBarChart = function (dataset) {
    let option = {
        title: {
            text: '各栏目点击、订阅及其文章数一览',
            left: 'center'
        },
        legend: {
            top: 25,
            // bottom: 10,
            left: 'center',
            data: Object.keys(dataset)
        },
        // label: {
        //     show: true,
        //     // position: 'insideTop'
        //     position: 'top',
        //     distance: 0
        // },
        tooltip: {
            // type: 'axis',
            // axisPointer : {            // 坐标轴指示器，坐标轴触发有效
            //     type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
            // }
        },
        dataset: [{
            /**
             * 第二个数据集
             * 按列的 key: value 形式
             * 不支持 seriesLayoutBy 参数
             */
            // source: {
            //     'tags': ['点击量', '订阅量', '文章数'],
            //     '2艺术学': [100, 78, 32],
            //     '文学': [100, 80, 18],
            //     '教育学':[32, 21, 41],
            //     '历史': [76, 32, 56],
            //     '民族学': [88, 12, 21], 
            //     '南海研究': [256, 44, 45], 
            //     '当代海南论坛': [144, 34, 11], 
            //     '20世纪中国学术家研究': [312, 99, 18]
            // },
            source: dataset,

            
            /**
             * 第三个数据集
             * 按行的 key:value 形式（对象数组），较常见
             * 不支持 seriesLayoutBy 参数
             */
            // source: [
            //     { product: '3艺术学',              '点击量': 200, '订阅量': 85.8, '文章数': 93.7 },
            //     { product: '文学',                '点击量': 83.1, '订阅量': 73.4, '文章数': 55.1 },
            //     { product: '教育学',              '点击量': 83.1, '订阅量': 73.4, '文章数': 55.1 },
            //     { product: '历史',                '点击量': 86.4, '订阅量': 65.2, '文章数': 82.5 },
            //     { product: '民族学',              '点击量': 72.4, '订阅量': 53.9, '文章数': 39.1 },
            //     { product: '南海研究',            '点击量': 72.4, '订阅量': 53.9, '文章数': 39.1 },
            //     { product: '当代海南论坛',        '点击量': 72.4, '订阅量': 53.9, '文章数': 39.1 },
            //     { product: '20世纪中国学术家研究', '点击量': 72.4, '订阅量': 53.9, '文章数': 39.1 }
            // ],
            

            /**
             * 第四个数据集
             * 
             * 支持 seriesLayoutBy 参数
             */
            // source: [
            //     ['tag',                 '点击量',    '订阅量',   '文章数' ],
            //     ['4艺术学',                  300,          78,       32  ],
            //     ['文学',                     100,          90,       18  ],
            //     ['教育学',                    32,          21,       41  ],
            //     ['历史',                      76,          32,       56  ],
            //     ['民族学',                    88,          12,       21  ],
            //     ['南海研究',                 256,          44,       45  ],
            //     ['当代海南论坛',             144,          34,       11   ],
            //     ['20世纪中国学术家研究',      312,          99,        18  ]
            // ]            
        }],

        xAxis: [
            { type: 'category', gridIndex: 0, axisLabel: {interval: 0} },
            // { type: 'category', gridIndex: 1 }
        ],
        yAxis: [
            { gridIndex: 0 },
            // { gridIndex: 1 }
        ],

        // 栅格位置
        grid: {
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                    type: 'shadow',
                    label: {
                        show: true,
                        formatter: function (params) {
                            return params.value.replace('\n', '');
                        }
                    }
                }
            }
        },
        series: [
            { type: 'bar', barGap: 0, seriesLayoutBy: 'row', datasetIndex: 0 },
            { type: 'bar', barGap: 0, seriesLayoutBy: 'row', datasetIndex: 0 },
            { type: 'bar', barGap: 0, seriesLayoutBy: 'row', datasetIndex: 0 },
            { type: 'bar', barGap: 0, seriesLayoutBy: 'row', datasetIndex: 0 },
            { type: 'bar', barGap: 0, seriesLayoutBy: 'row', datasetIndex: 0 },
            { type: 'bar', barGap: 0, seriesLayoutBy: 'row', datasetIndex: 0 },
            { type: 'bar', barGap: 0, seriesLayoutBy: 'row', datasetIndex: 0 },
            // { type: 'bar', barGap: 0, seriesLayoutBy: 'row', datasetIndex: 0 },
        ]
    }

    return option;
}


let dataset = function (data) {
    let obj = {};
    obj.tags = ['浏览量', '订阅量', '文章数'];
    data.forEach((element, index) => {
        const key = element.tag;
        obj[key] = [
            element.views,
            element.subs,
            element.articles
        ];
    });
    console.log(obj);
    // return obj;
    createEchart('echarts', multiBarChart(obj));
}


// 创建 XMLHttpRequest 对象：createXHR()
function createXHR( server_url, send_param, callback ) {
    let xhr;
    if(window.XMLHttpRequest){
      xhr = new XMLHttpRequest();
    }else if(window.ActiveXObject){
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.open('POST', server_url, true);
    xhr.onreadystatechange = function(){
      if(xhr.readyState === 4 && xhr.status === 200){
        let data = JSON.parse(xhr.responseText);
        // console.log(data);
        callback( data );
      }
    };
  
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(send_param);
  }
  