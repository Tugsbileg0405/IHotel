<footer>
<div class="ui inverted vertical footer segment">
	<div class="ui center aligned container">
		<div class="ui stackable divided grid">
			<div class="five wide column">
				<h4 class="ui inverted header">{{ __('messages.Menu') }}</h4>
				<div class="ui inverted link list">
					<a href="{{ url('posts') }}" class="item">{{ __('messages.Travel Inspiration') }}</a>
					<a href="{{ url('question') }}" class="item">{{ __('messages.Frequently asked questions') }}</a>
					<a href="{{ url('terms') }}" class="item">{{ __('messages.Terms of service') }}</a>
				</div>
			</div>
			<div class="six wide column footer-menu">
				<h4 class="ui inverted header">{{ __('messages.Team up with us') }}</h4>
				<div class="ui inverted link list">
					<a href="{{ url('hotel/create') }}" class="item">{{ __('messages.Add hotel') }}</a>
					<a href="{{ url('profile/hotels') }}" class="item">{{ __('messages.Room Control System') }}</a>
					<a href="#" class="item">{{ __('messages.Distributor') }}</a>
					<a href="#" class="item">{{ __('messages.Group order') }}</a>
				</div>
			</div>
			<div class="five wide column footer-menu">
				<h4 class="ui inverted header">{{ __('messages.About us')}}</h4>
				<div class="ui inverted link list">
					<a href="{{ url('about') }}" class="item">{{ __('messages.What is the iHotel?') }}</a>
					<a href="{{ url('about#introduction') }}" class="item">{{ __('messages.Our advantages') }}</a>
					<a href="{{ url('about#team') }}" class="item">{{ __('messages.Who are we?') }}</a>
					<a href="{{ url('contact') }}" class="item">{{ __('messages.Contact Us') }}</a>
				</div>
			</div>
		</div>
		<div class="ui divider"></div>
	</div>
	<div class="copyright">
		<div class="ui center aligned stackable container">
			<div class="ui stackable grid">
				<div class="three column row">
					<div class="column"></div>
					<div class="column">
						<h5>© copyright {{ date('Y') }} www.iHotel.mn - Айхотел ххк</h5>
					</div>
					<div class="column">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</footer>