import g from"./GradientText-6905c588.js";import{F as C}from"./FrontendLayout-c5406d9d.js";import w from"./BaseButton-7ef97b1b.js";import{O as k,j as i,o as r,c as B,w as m,a as e,b as l,e as c,h as S,m as _,P as u,d as p,t as f,g as h,p as V,k as F}from"./app-6c5b59c0.js";import{_ as I}from"./_plugin-vue_export-helper-c27b6911.js";import"./Nav-bb22fbcc.js";import"./logo-3c9d4bd3.js";import"./Footer-86e2b630.js";const N={props:{errors:Object},data(){return{form:{email:"",message:""}}},components:{GradientText:g,BaseButton:w,FrontendLayout:C},methods:{submit(){k.post("/contact",this.form)}}},d=o=>(V("data-v-37a9b3d6"),o=o(),F(),o),L={class:"section"},M={class:"title"},O={class:"form-container"},T=d(()=>e("div",{class:"form-desc"}," Contact our help desk if you have any enquiries or issues with this school. You will receive a reply in your email in a few hours. ",-1)),U={class:"form-item"},j=d(()=>e("label",{for:"email"},"Your email",-1)),D=["textContent"],Y={class:"form-item"},q=d(()=>e("label",{for:"message"},"Message",-1)),E=["textContent"],G={class:"form-item"};function P(o,t,s,z,a,v){const b=i("gradient-text"),x=i("base-button"),y=i("FrontendLayout");return r(),B(y,null,{default:m(()=>[e("main",null,[e("div",L,[e("div",M,[l(b,{htype:"h1"},{default:m(()=>[c("Contact Us")]),_:1})]),e("div",O,[T,e("form",{onSubmit:t[2]||(t[2]=S(n=>v.submit(),["prevent"]))},[e("div",U,[j,_(e("input",{"onUpdate:modelValue":t[0]||(t[0]=n=>a.form.email=n),type:"email",id:"email",name:"email"},null,512),[[u,a.form.email]]),s.errors.email?(r(),p("div",{key:0,textContent:f(s.errors.email),class:"mt-1 font-bold text-sm text-red-500"},null,8,D)):h("",!0)]),e("div",Y,[q,_(e("textarea",{"onUpdate:modelValue":t[1]||(t[1]=n=>a.form.message=n),name:"message",id:"message",rows:"5"},null,512),[[u,a.form.message]]),s.errors.message?(r(),p("div",{key:0,textContent:f(s.errors.message),class:"mt-1 font-bold text-sm text-red-500"},null,8,E)):h("",!0)]),e("div",G,[l(x,{type:"submit",name:"submit"},{default:m(()=>[c("Submit")]),_:1})])],32)])])])]),_:1})}const Z=I(N,[["render",P],["__scopeId","data-v-37a9b3d6"]]);export{Z as default};
