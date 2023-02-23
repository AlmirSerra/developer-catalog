import DeveloperIndex from './views/developer/Index.vue'
import DeveloperCreate from './views/developer/Create.vue'
import DeveloperEdit from './views/developer/Edit.vue'
import DeveloperDelete from './views/developer/Delete.vue'
import LevelIndex from './views/level/Index.vue'
import LevelCreate from './views/level/Create.vue'
import LevelEdit from './views/level/Edit.vue'
import LevelDelete from './views/level/Delete.vue'

const routes = [
  { path: '/', component: DeveloperIndex },
  { path: '/developers', component: DeveloperIndex },
  { path: '/developers/create', component: DeveloperCreate },
  { path: '/developers/:id/edit', component: DeveloperEdit },
  { path: '/developers/:id/delete', component: DeveloperDelete },
  { path: '/levels', component: LevelIndex },
  { path: '/levels/create', component: LevelCreate },
  { path: '/levels/:id/edit', component: LevelEdit },
  { path: '/levels/:id/delete', component: LevelDelete },
]

export default routes
