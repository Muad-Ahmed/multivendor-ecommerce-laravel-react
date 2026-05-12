export default function MetricCard({ label, value, tone = 'cyan', helper }) {
    const tones = {
        cyan: 'bg-cyan-100 text-cyan-700 dark:bg-cyan-400/10 dark:text-cyan-200',
        lime: 'bg-lime-100 text-lime-700 dark:bg-lime-400/10 dark:text-lime-200',
        rose: 'bg-rose-100 text-rose-700 dark:bg-rose-400/10 dark:text-rose-200',
        violet: 'bg-violet-100 text-violet-700 dark:bg-violet-400/10 dark:text-violet-200',
    };

    return (
        <article className="metric-tile">
            <div className="flex items-start justify-between gap-4">
                <div>
                    <p className="text-sm font-semibold text-slate-500 dark:text-slate-400">{label}</p>
                    <p className="mt-3 text-3xl font-black text-slate-950 dark:text-white">{value}</p>
                </div>
                <span className={`rounded-md px-2.5 py-1 text-xs font-black ${tones[tone]}`}>
                    Live
                </span>
            </div>
            {helper && <p className="mt-4 text-sm leading-6 text-slate-500 dark:text-slate-400">{helper}</p>}
        </article>
    );
}
