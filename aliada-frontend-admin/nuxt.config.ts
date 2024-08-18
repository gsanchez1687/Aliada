export default defineNuxtConfig({
  runtimeConfig: {
    public: {
      baseURL: process.env.BACKEND_URL || "http://localhost:8000",
      GOOGLE_MAPS_API_KEY: process.env.GOOGLE_MAPS_API_KEY,
      FRONTEND_URL: process.env.FRONTEND_URL,
    },
  },
  colorMode: {
    preference: 'light'
  },
  ssr: false,
  devtools: { enabled: true },
  app: {
    head: {
      link: [
        { rel: "icon", type: "image/png", href: "/favicon.png" },
        {
          rel: "stylesheet",
          href: "https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i",
        },
        {
          rel: "stylesheet",
          href: "https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i&display=swap",
        },
        {
          rel: "stylesheet",
          href: "https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i",
        },
      ],
    },
  },
  css: ["@/assets/scss/app.scss"],
  script: [
    {
      src: "/bootstrap.bundle.min.js",
    },
  ],
  alias: {
    pinia: "/node_modules/@pinia/nuxt/node_modules/pinia/dist/pinia.mjs",
  },

  build: {
    transpile: ["@vuepic/vue-datepicker"],
  },
  modules: ["nuxt-icon", "@pinia/nuxt", "nuxt-auth-sanctum", "@nuxt/ui"],
  pinia: {
    autoImports: ["defineStore", ["defineStore", "definePiniaStore"]],
  },

  plugins: [
    {
      src: "@/plugins/usebootstrap.client.ts",
      mode: "client",
    },
    {
      src: "@/plugins/plugins.ts",
      mode: "client",
    },
    {
      src: "@/plugins/ssrplugins.ts",
    },
    {
      src: "~/plugins/auth.ts",
    },
  ],

  tailwindcss: {
    config: {
      theme: {
        extend: {
          colors: {
            "cornflower-blue": {
              DEFAULT: "#8B5CF6",
              50: "#FFFFFF",
              100: "#F9F7FF",
              200: "#DED0FC",
              300: "#C2A9FA",
              400: "#A783F8",
              500: "#8B5CF6",
              600: "#6527F3",
              700: "#4A0CD6",
              800: "#3709A1",
              900: "#25066C",
              950: "#1C0451",
            },
          },
        },
      },
    },
  },

  sanctum: {
    baseUrl: process.env.BACKEND_URL, // Laravel API
    redirectIfAuthenticated: false,
    userStateKey: "sanctum.user.identity",
    endpoints: {
      csrf: "/sanctum/csrf-cookie",
      login: "/login",
      logout: "/logout",
      user: "/api/user",
    },
    csrf: {
      cookie: "XSRF-TOKEN",
      header: "X-XSRF-TOKEN",
    },
    redirect: {
      keepRequestedRoute: false, // Keep requested route in the URL for later redirect
      onLogin: "/", // Redirect to this page after successful login
      onLogout: "/login", // Redirect to this page after successful logout
      onAuthOnly: "/login", // Redirect to this page if user is not authenticated
      onGuestOnly: "/", // Redirect to this page if user is authenticated
    },
  },
});
