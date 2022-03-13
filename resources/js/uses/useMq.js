import { onBeforeMount, onBeforeUnmount, onMounted, ref } from 'vue';

const useMq = () => {
  const mq = ref('pc');

  const BREAK_POINTS = {
    SP: 599,
    TABLET: 1024,
  };

  const calcMediaQuery = () => {
    mq.value =
      window.innerWidth <= BREAK_POINTS.SP
        ? 'sp'
        : window.innerWidth <= BREAK_POINTS.TABLET
        ? 'tablet'
        : 'pc';
  };

  onBeforeMount(() => {
    calcMediaQuery();
  });

  onMounted(() => {
    window.addEventListener('resize', calcMediaQuery);
  });

  onBeforeUnmount(() => {
    window.removeEventListener('resize', calcMediaQuery);
  });

  return {
    mq,
  };
};

export default useMq;
