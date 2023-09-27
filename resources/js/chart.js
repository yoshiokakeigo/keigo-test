import Chart from "chart.js/auto";
if (document.getElementById("myChart") != null) {
  const ctx = document.getElementById("myChart").getContext("2d");
  const app = {
    months: [],
    now: [],
    min: [1],
    max: [1],
    curriculum: [null],
    user_name: Laravel.user_information[0].user.name,
    user_information: Laravel.user_information,
    curriculum_index: Laravel.curriculum.length
  };
  Laravel.curriculum.forEach(function (value, index) {
    app.curriculum.push(Laravel.curriculum[index].name)
  })

  Laravel.user_information.forEach(function (value, index) {
    app.months.push(app.user_information[index].month.month_name);
    app.now.push(app.user_information[index].assignments[0].unit_index);
    app.min.push(app.user_information[index].assignments[1].unit_index);
    app.max.push(app.user_information[index].assignments[2].unit_index);
  })
  app.months.push('目標値')
  const myChart = new Chart(ctx, {
    type: "line",
    data: {
      labels: app.months,
      datasets: [
        {
          label: "現状",
          data: app.now,
          borderColor: "rgb(75, 192, 192)",
          backgroundColor: "rgba(75, 192, 192, 0.5)",
        },
        {
          label: "min目標",
          data: app.min,
          borderColor: "rgb(153, 102, 255)",
          backgroundColor: "rgba(153, 102, 255, 0.5)",
        },
        {
          label: "max目標",
          data: app.max,
          borderColor: "rgb(255,0,0)",
          backgroundColor: "rgba(255,0,0,0.5)",
        },
      ]
    },

    //どうやらchartjs v4なのでv4で動作するものを描かなくてはいけないみたい
    options: {
      animation: false,
      plugins: {	//
        title: {
          display: true,
          text: app.user_name + 'のカリキュラムグラフ'
        }	//
      },
      scales: {
        y: {	//yAxes: [{
          suggestedMax: app.curriculum,	//
          suggestedMin: 1,	//
          ticks: {
            //suggestedMax: 11,
            //suggestedMin: -1,
            stepSize: 1,
            callback: function (value, index, values) {
              return app.curriculum[value];
            }
          },
          title: {	//scaleLabel: {
            display: true,
            text: 'カリキュラム'	//labelString: ' gravitational acceleration [g]'
          }
        },
        x: {	//xAxes: [{
          title: {	//scaleLabel: {
            display: true,
            text: '月間'	//labelString: 'time'
          }
        }
      },
    }
  });
}
