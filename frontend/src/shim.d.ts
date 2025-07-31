// custom type declarations because typescript could not detect

declare module '*.vue' {
  import type { DefineComponent } from 'vue';
  const component: DefineComponent<{}, {}, any>;
  export default component;
}

declare module 'v-lazy-image' {
  import type { DefineComponent } from 'vue';
  const component: DefineComponent<any, any, any>;
  export default component;
}
