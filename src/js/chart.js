// 柱状图选项
let barChartOption = function(dataset) {
    let option = {
        title: {
            text: '栏目热门度对比',
            subtext: '浏览量与栏目订阅量',
            left: 'center'
        },
        legend: {
            top: 55,
            left: 'center',
            data: Object.keys(dataset)
        },
        tooltip: {},
        dataset: {
            source: dataset
        },
        xAxis: {
            type: 'category',
            axisLabel: { interval: 0 },
        },
        yAxis: {
        },
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
            },
            top: '20%',
            containLabel: true
        },
        // series: series
        series: [
            { type: 'bar', barGap: 0, seriesLayoutBy: 'row' },
            { type: 'bar', barGap: 0, seriesLayoutBy: 'row' },
            { type: 'bar', barGap: 0, seriesLayoutBy: 'row' },
            { type: 'bar', barGap: 0, seriesLayoutBy: 'row' },
            { type: 'bar', barGap: 0, seriesLayoutBy: 'row' },
            { type: 'bar', barGap: 0, seriesLayoutBy: 'row' },
            { type: 'bar', barGap: 0, seriesLayoutBy: 'row' },
        ]
    };
    return option;
}

// 饼状图
let pieChartOption = function(dataset) {
    let option = {
        title: {
            text: '各栏目文章数目占比',
            x: 'center'
        },
        tooltip: {
            trigger: 'item',
            // formatter: "{b} <br>数量：{c}<br>{a}: {d}%"
            formatter: `{b} <br>数&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;量：{c}<br>{a}: {d}%`
        },
        legend: {
            type: 'scroll',
            orient: 'vertical',
            x: 'right',
            top: 20,
            data: dataset.symbols,
        },
        dataset: {
            // source: dataset
            source: dataset.data
        },
        series: [
            { 
                type: 'pie', 
                name: '文章占比', 
                radius: '50%', 
                center: ['50%', '50%'], 
            },
        ]
    };

    return option;
}

/**
 * 
 * @param {String} echartsDOM    图表所在的DOM文档对象
 * @param {Object} option        Echarts创建图表时的配置项 
 */
let createEchart = function( echartsDOM, option ) {
    let chart = echarts.init(echartsDOM);
    chart.setOption(option);
    return chart;
}

/**
 * Ajax 异步访问服务器
 * @param {String} server_url  服务器地址 
 * @param {String} send_param  POST参数
 * @param {Function} callback  回调函数
 */
let createXHR = function(server_url = '', send_param = '', callback) {
    let xhr;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.open('POST', server_url, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let data = JSON.parse(xhr.responseText);
            callback(data);
        }
    };
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(send_param);
}


const columnComparisionInfo = '/Journal-management-website/dev/_column_conparison_data.php';
// 1.各栏目的总点击、收藏量
const columnComparisionArea = document.getElementById('echarts_1');
// 2.各栏目的文章数目
const articlesNumOfColumn = document.getElementById('echarts_2');

if(columnComparisionArea) {
    createXHR(columnComparisionInfo, '', function(data){
        let obj1 = {
            tags: ['浏览量', '订阅量']
        };
        let obj2 = {
            symbols: [],
            data: []
        };
        let tag = [];
        
        data.forEach(element => {
            const key = element.tag;
            tag.push(key);

            obj1[key] = [
                element.views,
                element.subs,
            ];            

            obj2.symbols.push(key)
            obj2.data.push({
                name: key,
                value: element.articles
            })
            
        });
        // console.log(obj1);
        // console.log(obj2);

        let option1 = barChartOption(obj1);
        createEchart(columnComparisionArea, option1);
        let option2 =  pieChartOption(obj2);
        createEchart(articlesNumOfColumn, option2);        
    })
} else {
    console.log('区域不存在!');
}