import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-radio-slider', IndexField)
  app.component('detail-radio-slider', DetailField)
  app.component('form-radio-slider', FormField)
})
