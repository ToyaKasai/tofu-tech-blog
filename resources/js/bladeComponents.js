/**
 * bladeで使用するコンポーネント
 */

/** components */
import GlobalHeader from './components/common/GlobalHeader.vue'; // ヘッダー
import GlobalFooter from './components/common/GlobalFooter.vue'; // フッター

/** pages */
import TopPage from './components/pages/TopPage.vue'; // トップページ
import ViewPage from './components/pages/ViewPage.vue'; // 閲覧ページ
import BlogFormPage from './components/pages/BlogFormPage.vue'; // 新規登録ページ
import SettingPage from './components/pages/SettingPage.vue'; // 新規登録ページ

const bladeComponents = {
  GlobalHeader,
  GlobalFooter,
  TopPage,
  ViewPage,
  BlogFormPage,
  SettingPage,
};

export default bladeComponents;
