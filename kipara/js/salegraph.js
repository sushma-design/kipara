$(document).ready(function(){
    
    $.ajax({
        url: "totalsale.php",
        type: "POST",
        dataType: 'json',
        
        success: function(result13){

            console.log(result13);
            console.log(result13);
            var jan = result13.jan;
            var feb = result13.feb;
            var mar = result13.mar;
            var apr = result13.apr;
            var may =  result13.may;
            var jun = result13.jun;
            var jul = result13.jul;
            var aug = result13.aug;
            var sep = result13.sep;
            var oct = result13.oct;
            var nov = result13.nov;
            var dec = result13.dec;

            var chartdata ={
                labels:["Apr", "May", "Jun", "Jul", "Aug","Sep","Oct","Nov","Dec","Jan", "Feb", "Mar"],
                datasets: [
                    {
                        label: " ",
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1,
                        data:[apr,may,jun,jul,aug,sep,oct,nov,dec,jan,feb,mar]
                    }
                ]

            };
            var ctx= $("#salechart");
            var LineGraph = new Chart(ctx,{
                type: 'bar',
                data: chartdata,
				options: {
                    legend:
                    {
                        display: false
                    }
                }

            });
        },
        error :function(result1)
        {

        }
    });
});




