import{p as n,u as b,a as w,e,q as h,b as l,w as m,s as d,f as g,o as V,R as y,i as u}from"./index-1lfBLovf.js";import{_ as x}from"./AButton-RC2ACXzy.js";import{_ as c}from"./AInput-mtK0UuVk.js";import{_ as p}from"./APassword-Cffx3J_P.js";import{u as k}from"./auth-bmhl9-6l.js";import"./createVueComponent-I1wlHjMO.js";const S={class:"page page-center"},C={class:"container container-tight py-4"},N=e("div",{class:"text-center mb-4"},[e("a",{href:".",class:"navbar-brand navbar-brand-autodark"},[e("img",{src:"https://preview.tabler.io/static/logo.svg",width:"110",height:"32",alt:"Tabler",class:"navbar-brand-image"})])],-1),P={class:"card card-md"},R={class:"card-body"},U=e("h2",{class:"h2 text-center mb-4"},"Create new account",-1),B={class:"form-footer"},E={class:"text-center text-secondary mt-3"},z={__name:"RegisterView",setup($){const o=n({name:"",email:"",password:"",password_confirmation:""}),i=n(!1),a=n({}),v=b(),f=k(),_=async()=>{i.value=!0,a.value={},await u.get("/sanctum/csrf-cookie"),u.post("register",o.value).then(r=>{f.user=r.data.data,v.push({name:"login"})}).catch(r=>{r.response.status===422&&(a.value=r.response.data.errors)}).finally(()=>{i.value=!1})};return(r,s)=>(V(),w("div",S,[e("div",C,[N,e("div",P,[e("div",R,[U,e("form",{onSubmit:h(_,["prevent"])},[l(c,{class:"mb-2",type:"text",label:"Name",autocomplete:"off",placeholder:"Enter name",invalid:"name"in a.value,errors:a.value.name,modelValue:o.value.name,"onUpdate:modelValue":s[0]||(s[0]=t=>o.value.name=t)},null,8,["invalid","errors","modelValue"]),l(c,{class:"mb-2",type:"email",label:"Email address",autocomplete:"off",placeholder:"your@email.com",invalid:"email"in a.value,errors:a.value.email,modelValue:o.value.email,"onUpdate:modelValue":s[1]||(s[1]=t=>o.value.email=t)},null,8,["invalid","errors","modelValue"]),l(p,{class:"mb-2",label:"Password",placeholder:"Password",invalid:"password"in a.value,errors:a.value.password,modelValue:o.value.password,"onUpdate:modelValue":s[2]||(s[2]=t=>o.value.password=t)},null,8,["invalid","errors","modelValue"]),l(p,{class:"mb-2",label:"Password Confirmation",placeholder:"Password Confirmation",invalid:"password_confirmation"in a.value,errors:a.value.password_confirmation,modelValue:o.value.password_confirmation,"onUpdate:modelValue":s[3]||(s[3]=t=>o.value.password_confirmation=t)},null,8,["invalid","errors","modelValue"]),e("div",B,[l(x,{type:"submit",variant:"primary",loading:i.value,block:""},{default:m(()=>[d(" Sign up ")]),_:1},8,["loading"])])],32)])])]),e("div",E,[d(" Already have an account? "),l(g(y),{to:{name:"login"}},{default:m(()=>[d(" Sign in ")]),_:1})])]))}};export{z as default};
