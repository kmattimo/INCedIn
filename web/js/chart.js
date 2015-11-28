
  // Load the Visualization API and the piechart package.
function countSubreddits(array) {
  var subreddits = Object();
  for (var i = 0,l=array.length; i < l; i++) { 
    
    subreddits[array[i][0]] = (subreddits[array[i]] || 0) + 1;
    return subreddits;
}
}

  google.load('visualization', '1.0', {'packages':['corechart']});

  // Set a callback to run when the Google Visualization API is loaded.
  google.setOnLoadCallback(drawChart2);

  // Callback that creates and populates a data table,
  // instantiates the pie chart, passes in the data and
  // draws it.
  
  //do it in sql next time
  function drawChart2() {
    window.subredditfrequencies = countSubreddits(data2);
    // subredditfrequencies.unshift(  ['tast', 'asdf']);
    // Create the data table.
    var data = google.visualization.arrayToDataTable(subredditfrequencies);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));

        chart.draw(data, options);
    
  }
    
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable(data1);

      var options = {
        title: 'Sentiment',
        hAxis: {title: 'Comments', minValue: 0, maxValue:data1.length},
        vAxis: {title: 'Sentiment', minValue: -10, maxValue: 15},
        legend: 'none'
      };

      var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
  // }