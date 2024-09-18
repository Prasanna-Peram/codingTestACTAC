import Vue from 'vue';
import Router from 'vue-router';
import BookList from './components/BookList.vue';
import CreateBook from './components/CreateBook.vue';
import EditBook from './components/EditBook.vue';

Vue.use(Router);

export default new Router({
    mode: 'history',
    routes: [
        { path: '/', component: BookList },
        { path: '/create',  name: 'create',component: CreateBook },
        { path: '/edit/:id',  name: 'edit', component: EditBook },
    ],
});
