{
  const handleSubmitForm = e => {
    const $form = e.currentTarget;

    if (!$form.checkValidity()) {
      e.preventDefault();

      const fields = $form.querySelectorAll(`.input`);
      fields.forEach(showValidationInfo);

      $form.querySelector(`.error-summary`).innerHTML = `Gelieve alles na te kijken`;
    }
  };

  const showValidationInfo = $field => {
    let message;
    if ($field.validity.valueMissing) {
      message = `Dit veld is verplicht`;
    }
    if ($field.validity.typeMismatch) {
      message = `Gelieve een geldig e-mail adres in te geven`;
    }
    if ($field.validity.rangeOverflow) {
      const max = $field.getAttribute(`max`);
      message = `Oeps, je kan maar ${max} tickets tegelijkertijd bestellen`;
    }
    if ($field.validity.rangeUnderflow) {
      const min = $field.getAttribute(`min`);
      message = `Het minimum is ${min}.`;
    }
    if ($field.validity.tooShort) {
      const min = $field.getAttribute(`minlength`);
      message = `Je bericht is te kort.`; // ${min}
    }
    if ($field.validity.tooLong) {
      const max = $field.getAttribute(`maxlength`);
      message = `Je bericht is te lang.`; // ${max}
    }
    if (message) {
      $field.parentElement.querySelector(`.error`).textContent = message;
    }
  };

  const handeInputField = e => {
    const $field = e.currentTarget;
    if ($field.checkValidity()) {
      $field.parentElement.querySelector(`.error`).textContent = ``;
      if ($field.form.checkValidity()) {
        $field.form.querySelector(`.error`).innerHTML = ``;
      }
    }
  };

  const handeBlurField = e => {
    const $field = e.currentTarget;
    showValidationInfo($field);
  };

  const addValidationListeners = fields => {
    // 03. Alle inputs overlopen, functie aan toekennen.
    fields.forEach($field => {
      $field.addEventListener(`input`, handeInputField);
      // Focus weg van element.
      $field.addEventListener(`blur`, handeBlurField);
    });
  };

  const init = () => {
    const $forms = document.querySelectorAll(`.form`);
    console.log($forms);

    // 01. Browser validatie afzetten.
    $forms.forEach($form => {
      $form.noValidate = true;
      $form.addEventListener(`submit`, handleSubmitForm);


      // 02. Alle inputs selecteren. 
      const fields = $form.querySelectorAll(`.input`);
      addValidationListeners(fields);
    });

  };

  init();
}
