Actor = {
	init: function (conf) {
		this.conf = conf;
	
		$.ajaxSetup({
			url: 'index.php',
			type: 'POST',
			dataType: 'json'
		});

		this.setTemplate();
		this.bindEvents();
	},

	bindEvents: function (event) {
		this.conf.choice.on('change', this.displayActorList);
		this.conf.listContainer.on('click', 'li', this.displayActorInfo);
		this.conf.infoContainer.on('click', 'span.close', this.infoClose);
	},

	setTemplate: function () {
		this.tempList = Handlebars.compile(this.conf.listTemplate);
		this.tempInfo = Handlebars.compile(this.conf.infoTemplate);
		// console.log(tempList);

		Handlebars.registerHelper('fullName', function (actor) {
			return actor.first_name + ' ' + actor.last_name;
		});
	},

	fetchData: function (arg) {
		var sentData = arg;

		return $.ajax({
					data: arg
				}).promise();

	},

	displayActorList: function () {
			// data: self.conf.form.serialize()
		var self = Actor;
		// alert('working');
		self.fetchData(self.conf.form.serialize()).then(function (data) {
			// console.log(data);
			var tempData = self.tempList(data);
			// console.log(tempData);
			self.conf.listContainer.empty();
			if(data[0]){
				self.conf.listContainer.append(tempData).hide().fadeIn("slow");

			}else {
				self.conf.listContainer.append('<li class="alert alert-warning">No Actor Found, Please Try Another Letter ...</li>');
			}

		});
		
	},

	displayActorInfo: function (event) {
		event.preventDefault();

		var self = Actor;
		var actor_id = $(this).data('actor_id');
		// console.log($(this).data('actor_id'));
		self.fetchData({'actor_id': actor_id}).then(function (data) {
			console.log(data);
			var tempData = self.tempInfo(data);
			// console.log(tempData);
			self.conf.infoContainer.empty();
			self.conf.infoContainer.slideUp('slow');
			if(data[0]){
				self.conf.infoContainer.append(tempData).slideDown("slow");

			}else {
				self.conf.infoContainer.append('<li class="alert alert-warning">No Info Found, Please Try Another Actor ...</li>');
			}


		});

	},

	infoClose: function () {
		var self = Actor;
		self.conf.infoContainer.hide(1000);

	}
}
























