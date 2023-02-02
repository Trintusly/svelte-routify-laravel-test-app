

export default {
  "meta": {},
  "id": "_default",
  "_regex": {},
  "_paramKeys": {},
  "file": {
    "path": "src/routes/_module.svelte",
    "dir": "src/routes",
    "base": "_module.svelte",
    "ext": ".svelte",
    "name": "_module"
  },
  "asyncModule": () => import('../src/routes/_module.svelte'),
  "rootName": "default",
  "routifyDir": import.meta.url,
  "children": [
    {
      "meta": {
        "dynamic": true
      },
      "id": "_default__error__svelte",
      "_regex": {},
      "_paramKeys": {},
      "name": "[error]",
      "file": {
        "path": "src/routes/[error].svelte",
        "dir": "src/routes",
        "base": "[error].svelte",
        "ext": ".svelte",
        "name": "[error]"
      },
      "asyncModule": () => import('../src/routes/[error].svelte'),
      "children": []
    },
    {
      "meta": {},
      "id": "_default_auth",
      "_regex": {},
      "_paramKeys": {},
      "name": "auth",
      "module": false,
      "file": {
        "path": "src/routes/auth",
        "dir": "src/routes",
        "base": "auth",
        "ext": "",
        "name": "auth"
      },
      "children": [
        {
          "meta": {},
          "id": "_default_auth_login_svelte",
          "_regex": {},
          "_paramKeys": {},
          "name": "login",
          "file": {
            "path": "src/routes/auth/login.svelte",
            "dir": "src/routes/auth",
            "base": "login.svelte",
            "ext": ".svelte",
            "name": "login"
          },
          "asyncModule": () => import('../src/routes/auth/login.svelte'),
          "children": []
        },
        {
          "meta": {},
          "id": "_default_auth_register_svelte",
          "_regex": {},
          "_paramKeys": {},
          "name": "register",
          "file": {
            "path": "src/routes/auth/register.svelte",
            "dir": "src/routes/auth",
            "base": "register.svelte",
            "ext": ".svelte",
            "name": "register"
          },
          "asyncModule": () => import('../src/routes/auth/register.svelte'),
          "children": []
        }
      ]
    },
    {
      "meta": {
        "middleware": "guest"
      },
      "id": "_default_index_svelte",
      "_regex": {},
      "_paramKeys": {},
      "name": "index",
      "file": {
        "path": "src/routes/index.svelte",
        "dir": "src/routes",
        "base": "index.svelte",
        "ext": ".svelte",
        "name": "index"
      },
      "asyncModule": () => import('../src/routes/index.svelte'),
      "children": []
    },
    {
      "meta": {},
      "id": "_default_user",
      "_regex": {},
      "_paramKeys": {},
      "name": "user",
      "module": false,
      "file": {
        "path": "src/routes/user",
        "dir": "src/routes",
        "base": "user",
        "ext": "",
        "name": "user"
      },
      "children": [
        {
          "meta": {
            "dynamic": true
          },
          "id": "_default_user__username_",
          "_regex": {},
          "_paramKeys": {},
          "name": "[username]",
          "file": {
            "path": "src/routes/user/[username]/_module.svelte",
            "dir": "src/routes/user/[username]",
            "base": "_module.svelte",
            "ext": ".svelte",
            "name": "_module"
          },
          "asyncModule": () => import('../src/routes/user/[username]/_module.svelte'),
          "children": [
            {
              "meta": {},
              "id": "_default_user__username__index_svelte",
              "_regex": {},
              "_paramKeys": {},
              "name": "index",
              "file": {
                "path": "src/routes/user/[username]/index.svelte",
                "dir": "src/routes/user/[username]",
                "base": "index.svelte",
                "ext": ".svelte",
                "name": "index"
              },
              "asyncModule": () => import('../src/routes/user/[username]/index.svelte'),
              "children": []
            }
          ]
        },
        {
          "meta": {
            "middleware": "auth"
          },
          "id": "_default_user_dashboard_svelte",
          "_regex": {},
          "_paramKeys": {},
          "name": "dashboard",
          "file": {
            "path": "src/routes/user/dashboard.svelte",
            "dir": "src/routes/user",
            "base": "dashboard.svelte",
            "ext": ".svelte",
            "name": "dashboard"
          },
          "asyncModule": () => import('../src/routes/user/dashboard.svelte'),
          "children": []
        },
        {
          "meta": {},
          "id": "_default_user_settings_svelte",
          "_regex": {},
          "_paramKeys": {},
          "name": "settings",
          "file": {
            "path": "src/routes/user/settings.svelte",
            "dir": "src/routes/user",
            "base": "settings.svelte",
            "ext": ".svelte",
            "name": "settings"
          },
          "asyncModule": () => import('../src/routes/user/settings.svelte'),
          "children": []
        }
      ]
    },
    {
      "meta": {
        "dynamic": true,
        "dynamicSpread": true
      },
      "_regex": {},
      "_paramKeys": {},
      "name": "[...404]",
      "file": {
        "path": ".routify/components/[...404].svelte",
        "dir": ".routify/components",
        "base": "[...404].svelte",
        "ext": ".svelte",
        "name": "[...404]"
      },
      "asyncModule": () => import('./components/[...404].svelte'),
      "children": []
    }
  ]
}

import '@roxi/routify/lib/buildtime/plugins/devHelper/runtime.js'