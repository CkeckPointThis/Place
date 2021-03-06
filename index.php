<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Интересные места</title>
	<link rel="stylesheet" href="style.css">
		<script src="https://fb.me/react-0.14.7.js"></script> 
		<script src="https://fb.me/react-dom-0.14.7.js"></script> 
		<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.25/browser.min.js"></script>
		<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

</head>
<body>
	<div id="content"></div>
	<button onclick='get()'>Текст</button>
	<script>
		$.get('place.json', function(data) {
		});

	</script>

	<script type="text/babel">



var CITY=[]
/*{      
		id : 1,
      title : 'Храм-на-Крови',
      description: 'Самый большой храм Екатеринбурга стоит там, где была расстреляна царская семья...',
      image: 'https://www.smileplanet.ru/upload/hl-photo/92e/63b/hram_na_krovi_9.jpg'
   },
   {
      id : 2,
      title: 'Небоскреб «Высоцкий»',
      description : 'Самое высокое здание в России за пределами Москвы. Состоит из 54 этажей...',
      image : 'http://forum.awd.ru/gallery/images/upload/09c/2b3/09c2b36985a3f716c6b7fcba6bc0c65c.jpg'
   },
   {
      title: 'Улица Вайнера',
      id: 3,
      description: 'Екатеринбургский Арбат - полностью пешеходная улица с чугунными скульптурами...',
      image: 'https://my-ural.com/wp-content/uploads/2015/12/екат.jpg'
   },
   {
      title: 'Плотинка',
      id: 4,
      description: 'На плотине городского пруда происходит все самое интересное в жизни горожан...',
      image: 'http://lk-magellan.ru/wp-content/uploads/2015/04/plot1.jpg'
   },
];
*/		var List=React.createClass({
			render: function(){
				return <li className="list">
							<img className="list-image" src="http://addvural.pe.hu/myfolder/images/+"{this.props.image} width="200px" height="200px"/>
							<div className="list-info">
							<div className="list-title">{this.props.title}</div>
							<div className="list-description">{this.props.description}</div>
							</div>
						</li>;
			}
		});

		var PlaceList=React.createClass({
			getInitialState: function(){
				return {
					displayedPlace:CITY
				};
			},

			handleSearch: function(event){
				var searchQuery=event.target.value.toLowerCase();
				var displayedPlace=CITY.filter(function(el){
					var searchValue=el.title.toLowerCase();
					return searchValue.indexOf(searchQuery) !==-1;
				});

				this.setState({
					displayedPlace:displayedPlace
				})
				
			},

			render:function(){
				return(
						<div className="place">
							<input className="search-field" type="text" onChange={this.handleSearch}/>
							<ul className="place-list">
								{
									this.state.displayedPlace.map(function(el){
										return <List 
										key={el.id} 
										title={el.title}
										description={el.description}
										image={el.image}/>;
								})
								}
							</ul>
						</div>	
					);
			}
		});

		ReactDOM.render(
			<PlaceList />,
				document.getElementById("content")
			);

	</script>

</body>
</html>