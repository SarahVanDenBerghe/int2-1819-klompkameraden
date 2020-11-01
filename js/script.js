{
  const handleChangeFilter = e => {
    e.preventDefault();
    submitWithJS();
  };

  const submitWithJS = async () => {    
const $form = document.querySelector('.filter-form');
    const data = new FormData($form);
    console.log(data);
    const entries = [...data.entries()];
    console.log('entries:', entries);
    const qs = new URLSearchParams(entries).toString();
    console.log('querystring', qs);
    const url = `${$form.getAttribute('action')}?${qs}`;
    console.log('url', url);
    
    const response = await fetch(url.replace("?page=events", ""), {
      headers: new Headers({
        Accept: 'application/json'
      })
    });
    const events = await response.json();
    console.log(events);

    updateList(events);

    window.history.pushState(
      {},
      '',
      `${window.location.href.split('?')[0]}?${qs}`
    );
  };

  const updateList = events => {
    const $events = document.querySelector('.content--events');
    $events.innerHTML = '';

    events.forEach(event => {
      const $section = document.createElement(`section`);
      $section.className += 'event';

      let getEventPrice;
      if (event.price == 0) {
        getEventPrice = 'gratis';
      } else {
        getEventPrice = `&euro; ${event.price} per persoon`;
      }

      $section.innerHTML = `  
        <div class="event__info">
            <span class="event__date">${event.date}</span>
            <div class="event__social">
                <a href="www.facebook.com" target="_blank" class="socialmedia__icon icon__fb"><span class="hidden">Facebook</span></a>
                <a href="www.twitter.com" target="_blank" class="socialmedia__icon icon__twitter"><span class="hidden">Twitter</span></a>
            </div>
        </div>
        <div class="event__image__wrapper">
            <img src="assets/img/events/${event.image}.png" alt="" width="80">
        </div>
        <div class="event__text">
            <h3>${event.name}</h3>
            <p>${event.slug}</p>
        </div>
        <div class="event__ticket">
            <p>
              ${getEventPrice}
            </p>
            <a class="button button--ticket" href="index.php?page=detail&amp;id=${event.id}">Tickets & Info</a>
        </div>
     `;
      $events.appendChild($section);
    });
  };

  const init = () => {
    // KNOP VERWIJDEREN
    document.documentElement.classList.add('has-js');

    // MARGIN VAN VERDWENEN KNOP OPVANGEN
    const $filter = document.querySelector(`.filter-form`);
    if ($filter) {
      $filter.style.marginBottom = '6rem'
    }

    // INPUTS
    const $events = document.querySelectorAll(`.filter__input`);
    $events.forEach(event => {
      event.addEventListener(`change`, handleChangeFilter);
    });

  };

  init();
}
