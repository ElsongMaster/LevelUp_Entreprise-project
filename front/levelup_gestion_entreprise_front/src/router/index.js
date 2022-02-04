import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import store from "@/store";

// import MultiSteps from '../component/MultiSteps.vue'

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },

  {
    path: "/multisteps",
    name: "Multisteps",
    meta: {
      requiresAuth: true,
    },

    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/MultiSteps.vue"),
    // component: MultiSteps
  },
  {
    path: "/register",
    name: "Register",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/Register.vue"),
    // component: MultiSteps
  },
  // {
  //   path: "/dashboard",
  //   redirect: (to) => ({
  //     name: "Dashboard",
  //     query: { slug: to.params.slug },
  //   }),
  // },
  {
    path: "/dashboard",
    redirect: { name: "Profile" },
    meta: {
      requiresAuth: true,
    },
    children: [
      {
        path: "dashboard/profile",
        name: "Profile",
        props: true,
        component: () =>
          import(/* webpackChunkName: "about" */ "../views/Profile.vue"),
      },
      {
        path: "dashboard/listtask",
        name: "ListTask",
        props: true,
        component: () =>
          import(/* webpackChunkName: "about" */ "../views/ListTask.vue"),
      },
      {
        path: "dashboard/helpdesk",
        name: "HelpDesk",
        props: true,
        component: () =>
          import(/* webpackChunkName: "about" */ "../views/HelpDesk.vue"),
      },
    ],
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/Dashboard.vue"),
    // component: MultiSteps
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

router.beforeEach((to, from, next) => {
  if (to.matched.some((record) => record.meta.requiresAuth)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (!store.state.isConnected) {
      next({ name: "Home" });
    } else {
      next();
    }
  } else {
    console.log("skip");
    next(); // does not require auth, make sure to always call next()!
  }
});

export default router;
