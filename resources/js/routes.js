import Welcome from './components/Welcome'
import Leads from './components/Main/Leads'
import Source from './components/Main/Source'
import Media from './components/Main/Media'
import Status from './components/Main/Status'
export default {
    mode: 'history',
    base: process.env.BASE_URL,
    linkActiveClass: 'white--text',
    routes: [
        {
            path: '/',
            component: Welcome,
            name: 'welcome'
        },
        {
            path: '/leads',
            component: Leads,
            name: 'leads'
        },
        {
            path: '/source',
            component: Source,
            name: 'source'
        },
        {
            path: '/media',
            component: Media,
            name: 'media'
        },
        {
            path: '/status',
            component: Status,
            name: 'status'
        },
    ]
}